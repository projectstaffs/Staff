<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна виду роботи для доглядальниці:</h3>
        </div>
        <form @submit.prevent="changeNursetypeofwork">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вид роботи українською мовою:</label>
                    <input v-model="Store.nursetypeofwork.title.ua" type="text" class="form-control" required
                        placeholder="вид роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вид роботи англійською мовою:</label>
                    <input v-model="Store.nursetypeofwork.title.en" type="text" class="form-control" required
                        placeholder="вид роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити вид роботи</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-nursetypeofwork',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Nursetypeofwork" })
        },
        changeNursetypeofwork() {
            this.Store.CHANGE_NURSETYPEOFWORK(this.Store.nursetypeofwork);
            this.$router.push({ name: "Nursetypeofwork" })
        }
    },
}
</script>