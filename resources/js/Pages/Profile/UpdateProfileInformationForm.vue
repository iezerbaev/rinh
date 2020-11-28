<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Профиль
        </template>
        <template #description>
            Обновите информацию на вашем аккаунте.
        </template>
        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       ref="photo"
                       @change="updatePhotoPreview">
                <jet-label for="photo" value="Фото"/>
                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.thumbnail" alt="Фото профиля"
                         class="rounded-full h-20 w-20 object-cover">
                </div>
                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

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

                <jet-secondary-button type="button"
                                      variant="secondary-outline"
                                      @click.native.prevent="$refs.modal.show()">
                    Изменить
                </jet-secondary-button>
                <jet-secondary-button type="button" class="mt-2"
                                      @click.native.prevent="deletePhoto"
                                      v-if="user.thumbnail">
                    Удалить фото
                </jet-secondary-button>
                <jet-input-error :message="form.error('photo')" class="mt-2"/>
            </div>
            <!-- First name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="firstname" value="Имя"/>
                <jet-input id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname"
                           autocomplete="firstname"/>
                <jet-input-error :message="form.error('firstname')" class="mt-2"/>
            </div>
            <!-- Last name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="lastname" value="Фамилия"/>
                <jet-input id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname"
                           autocomplete="lastname"/>
                <jet-input-error :message="form.error('lastname')" class="mt-2"/>
            </div>
            <!-- Patronymic -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="patronymic" value="Отчество"/>
                <jet-input id="patronymic" type="text" class="mt-1 block w-full" v-model="form.patronymic"
                           autocomplete="patronymic"/>
                <jet-input-error :message="form.error('patronymic')" class="mt-2"/>
            </div>
            <!-- Phone number -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Номер телефона"/>
                <jet-input id="phone" type="tel" class="mt-1 block w-full" v-model="form.phone"
                           autocomplete="phone"/>
                <jet-input-error :message="form.error('phone')" class="mt-2"/>
            </div>
            <!-- Phone number -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="birthday_at" value="Дата Рождения"/>
                <jet-input id="birthday_at" type="date" class="mt-1 block w-full" v-model="form.birthday_at"
                           autocomplete="birthday_at"/>
                <jet-input-error :message="form.error('birthday_at')" class="mt-2"/>
            </div>
            <!-- Language -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="language" value="Язык"/>
                <t-select name="language" id="language" placeholder="Выберите опцию"
                          :options="languageData"
                          classes="rounded-md shadow-sm mt-1 block w-full"
                          v-model="form.language"
                />
                <jet-input-error :message="form.error('language')" class="mt-2"/>
            </div>
            <!-- Gender Select  -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="gender" value="Пол"/>
                <t-select placeholder="Выберите опцию"
                          :options="genderData"
                          classes="rounded-md shadow-sm mt-1 block w-full"
                          v-model="form.gender"
                />
                <jet-input-error :message="form.error('gender')" class="mt-2"/>
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Сохранен.
            </jet-action-message>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Сохранить
            </jet-button>
        </template>

    </jet-form-section>
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

    props: ['user'],

    data() {
        return {
            form: this.$inertia.form(
                {
                    '_method': 'PUT',
                    username: this.user.username,
                    email: this.user.email,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    patronymic: this.user.patronymic,
                    phone: this.user.phone,
                    language: this.user.language,
                    gender: this.user.gender,
                    status: this.user.status,
                    type: this.user.type,
                    birthday_at: this.user.birthday_at,
                },
                {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }
            ),
            photoPreview: null,
            isThumbnailModal: false,
            image: null,
            cropImg: null
        }
    },
    computed: {
        genderData() {
            return [
                {value: 'male', text: 'Мужской'},
                {value: 'female', text: 'Женский'}
            ];
        },
        languageData() {
            return [
                {value: 'ru', text: 'Русский'},
                {value: 'en', text: 'English'},
            ];
        }
    },
    methods: {
        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0]
            }
            this.form.post(route('user-profile-information.update'), {
                preserveScroll: true
            });
        },
        selectNewPhoto() {
            this.$refs.photo.click();
        },
        updatePhotoPreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);
        },
        deletePhoto() {
            this.$inertia.delete(route('current-user-photo.destroy'), {
                preserveScroll: true,
            }).then(() => {
                this.photoPreview = null
            });
        },
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
    },
}
</script>
