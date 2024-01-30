<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна обов'язків для домробітниці:</h3>
        </div>
        <form @submit.prevent="changeHousekeeperdutie">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть обов'язок для домробітниці українською мовою:</label>
                    <input v-model="Store.housekeeperdutie.title.ua" type="text" class="form-control" required
                        placeholder="обов'язок для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть обов'язок для домробітниці англійською мовою:</label>
                    <input v-model="Store.housekeeperdutie.title.en" type="text" class="form-control" required
                        placeholder="обов'язок для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити обов'язок для домробітниці</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-housekeeperdutie',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Housekeeperdutie" })
        },
        changeHousekeeperdutie() {
            this.Store.CHANGE_HOUSEKEEPERDUTIE(this.Store.housekeeperdutie);
            this.$router.push({ name: "Housekeeperdutie" })
        }
    },
}
</script>