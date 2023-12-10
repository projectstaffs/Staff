<template>
    <div>
        ddfdff
    </div>
</template>

<script>
import { useI18n } from 'vue-i18n';
export default {
    name: "Contacts",
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        return { t, locale };
    },
}
</script>

<style></style>