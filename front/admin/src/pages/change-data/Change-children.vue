<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна кількості дітей для роботи:</h3>
        </div>
        <form @submit.prevent="changeChildren">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть кількість дітей українською мовою:</label>
                    <input v-model="Store.children.title.ua" type="text" class="form-control" required
                        placeholder="кількість дітей українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть кількість дітей англійською мовою:</label>
                    <input v-model="Store.children.title.en" type="text" class="form-control" required
                        placeholder="кількість дітей англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити кількість дітей</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-children',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Children" })
        },
        changeChildren() {
            //console.log(this.Store.children);
            this.Store.CHANGE_CHILDREN(this.Store.children);
            this.$router.push({ name: "Children" })
        }
    },
}
</script>