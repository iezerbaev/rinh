<template>
    <jet-form-section @submitted="OnFormHandler">
        <template #title>
            Изменить E-Mail Адрес
        </template>
        <template #description>
            Введите ваш личный E-Mail адрес, на него придет письмо с ссылкой не подтверждение.
        </template>
        <template #form>
            <!-- Current Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="currentEmail" value="Текущий E-Mail Адрес"/>
                <jet-input id="currentEmail" type="email" class="mt-1 block w-full" v-model="form.currentEmail" disabled="true"/>
                <jet-input-error :message="form.error('currentEmail')" class="mt-2"/>
            </div>

            <!-- New Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="newEmail" value="Новый E-Mail Адрес"/>
                <jet-input id="newEmail" type="email" class="mt-1 block w-full" v-model="form.newEmail"/>
                <jet-input-error :message="form.error('newEmail')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="current_password" value="Текущий Пароль" />
                <jet-input id="current_password" type="password" class="mt-1 block w-full" v-model="form.current_password" ref="current_password" autocomplete="current-password" />
                <jet-input-error :message="form.error('current_password')" class="mt-2" />
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
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
    },
    props:['user'],
    data() {
        return {
            form: this.$inertia.form({
                '_method': 'PUT',
                currentEmail: this.user.email,
                newEmail: '',
            })
        }
    },
    name: "EmailChangeForm",
    methods: {
        OnFormHandler(event) {

        }
    }
}
</script>

<style scoped>

</style>
