<template>
    <select v-model="data.typeofwork" class="login_form_item auth_arrow">
        <option v-for="option in typework" :value="option.id">
            {{ option.title[locale] }}
        </option>
    </select>
    <select v-model="data.city" class="login_form_item auth_arrow">
        <option v-for="option in city" :value="option.id">
            {{ option.title[locale] }}
        </option>
    </select>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Search",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
    props: {
        data: Object,
        typework: Object,
        city: Object,
    }
}
</script>