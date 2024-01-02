<template>
    <div class="personal_errors">
        <div v-if="errors" class="login_middle">
            <ul v-for="item in errors" :key="item">
                <li>{{ item[locale] }}</li>
            </ul>
        </div>
        <div v-if="formErrors" class="login_middle">
            <ul v-for="item in formErrors" :key="item">
                <li>{{ item[0][locale] }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Error",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
    props: {
        errors: Object,
        formErrors: Object
    }
}
</script>