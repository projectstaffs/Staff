<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна виду роботи для домробітниці:</h3>
        </div>
        <form @submit.prevent="changeHousekeepertypeofwork">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вид роботи для домробітниці українською мовою:</label>
                    <input v-model="Store.housekeepertypeofwork.title.ua" type="text" class="form-control" required
                        placeholder="вид роботи для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вид роботи для домробітниці англійською мовою:</label>
                    <input v-model="Store.housekeepertypeofwork.title.en" type="text" class="form-control" required
                        placeholder="вид роботи для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити вид роботи для домробітниці</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-housekeepertypeofwork',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Housekeepertypeofwork" })
        },
        changeHousekeepertypeofwork() {
            this.Store.CHANGE_HOUSEKEEPERTYPEOFWORK(this.Store.housekeepertypeofwork);
            this.$router.push({ name: "Housekeepertypeofwork" })
        }
    },
}
</script>