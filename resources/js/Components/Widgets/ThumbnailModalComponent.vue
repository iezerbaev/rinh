<template>
    <t-modal ref="modal" header="Title of the modal" @closed="onModalCloseHandler">
        <input
            class="hidden"
            ref="imageFileThumbnail"
            type="file"
            name="image"
            accept="image/*"
            @change="open"
        />
        <div class="content">
            <section v-if="image === null">
                <p>Нажмите кнопку выбрать и выберите фотографию.</p>
                <jet-input-error :message="form.error('thumbnail')" class="mt-2"/>
            </section>
            <section class="cropper-area" :class="{'hidden': image === null}">
                <div class="img-cropper">
                    <vue-cropper ref="cropper"
                                 :aspect-ratio="1 / 1"
                                 :src="image"
                                 preview=".preview"
                                 :view-mode="3"
                    />
                </div>
            </section>
            <section class="flex flex-row justify-center preview-area mt-2" v-if="image !== null">
                <div class="preview w-40 h-32 rounded-full overflow-hidden"/>
                <div class="preview w-32 h-24 rounded-full overflow-hidden"/>
                <div class="preview w-20 h-20 rounded-full overflow-hidden"/>
            </section>
        </div>
        <template v-slot:footer>
            <div class="flex justify-end">
                <jet-secondary-button class="mt-2 mr-2" @click.native.prevent="showFileChooser">
                    Выбрать
                </jet-secondary-button>
                <jet-secondary-button class="mt-2 mr-2" @click.native.prevent="$refs.modal.hide()">
                    Закрыть
                </jet-secondary-button>
                <jet-button class="mt-2 mr-2" @click.native.prevent="upload">
                    Сохранить
                </jet-button>
            </div>
        </template>
    </t-modal>
</template>

<script>
import JetButton from '../../Jetstream/Button';
import JetFormSection from '../../Jetstream/FormSection';
import JetInput from '../../Jetstream/Input';
import JetInputError from '../../Jetstream/InputError';
import JetLabel from '../../Jetstream/Label';
import JetActionMessage from '../../Jetstream/ActionMessage';
import JetSecondaryButton from '../../Jetstream/SecondaryButton';
import VueCropper from 'vue-cropperjs';
import 'cropperjs/dist/cropper.css';

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        VueCropper
    },
    props: ['innerRef'],
    name: "ThumbnailModalComponent",
    data() {
        return {
            form: this.$inertia.form({
                thumbnail: null
            }),
            image: null,
        };
    },
    methods: {
        showFileChooser() {
            this.$refs.imageFileThumbnail.click();
        },
        open(e) {
            const file = e.target.files[0];
            if (file.type.indexOf('image/') === -1) {
                alert('Пожалуйста выберите файл.');
                return;
            }
            if (typeof FileReader === 'function') {
                const reader = new FileReader();
                reader.onload = (event) => {
                    this.image = event.target.result;
                    this.$refs.cropper.replace(event.target.result);
                };
                reader.readAsDataURL(file);
                this.isOpened = true;
            } else {
                alert('Ваш браузер устарел.');
            }
        },
        upload(e) {
            this.$refs.cropper.getCroppedCanvas({width: 250, height: 250}).toBlob(async blob => {
                let data = new FormData();
                data.append("thumbnail", blob, "thumbnail.jpg");
                try {
                    const client = axios.create({
                        baseURL: "https://rinh.com/profile/api/v1",
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        },
                        withCredentials: true
                    });
                    let response = await client.post("/thumbnail", data, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    });
                    this.image = response.data.url;
                    console.info('thumbnail uploaded');
                } catch (e) {
                    console.error(e);
                }
                this.$refs.cropper.destroy();
                this.image = null;
            });
        },
        setThumbnail(url) {
            document.querySelector('.thumbnail').src = url;
        },
        onModalCloseHandler(e) {
            this.image = null;
            if (this.$refs.cropper !== undefined) {
                this.$refs.cropper.destroy();
            }
        }
    }
}
</script>

<style scoped>

</style>
