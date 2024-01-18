<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна обов'язків для няні:</h3>
        </div>
        <form @submit.prevent="changeBabysittingdutie">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть обов'язок для няні українською мовою:</label>
                    <input v-model="Store.babysittingdutie.title.ua" type="text" class="form-control" required
                        placeholder="обов'язок для няні українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть обов'язок для няні англійською мовою:</label>
                    <input v-model="Store.babysittingdutie.title.en" type="text" class="form-control" required
                        placeholder="обов'язок для няні англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити обов'язок для няні</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-babysittingdutie',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Babysittingdutie" })
        },
        changeBabysittingdutie() {
            this.Store.CHANGE_BABYSITTINGDUTIE(this.Store.babysittingdutie);
            this.$router.push({ name: "Babysittingdutie" })
        }
    },
}
</script>