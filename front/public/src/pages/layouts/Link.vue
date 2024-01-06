<template>
    <div class="view_top">
        <button @click.prevent="back" class="btn btn_search">{{ $t('search.item4') }}</button>
        <div class="view_top_content">
            <button @click.prevent="baby" class="btn btn_search">{{ $t('search.item5') }}</button>
            <button @click.prevent="nurse" class="btn btn_search">{{ $t('search.item6') }}</button>
            <button @click.prevent="keeper" class="btn btn_search">{{ $t('search.item7') }}</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Link",
    methods: {
        back() { this.$router.push({ name: "Seekers" }) },
        baby() { this.$router.push({ name: "ClientBabyAll" }) },
        nurse() { this.$router.push({ name: "ClientNurseAll" }) },
        keeper() { this.$router.push({ name: "ClientKeeperAll" }) },
    },
}
</script>