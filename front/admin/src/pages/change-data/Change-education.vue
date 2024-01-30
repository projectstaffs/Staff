<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна освіти:</h3>
        </div>
        <form @submit.prevent="changeEducation">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть освіту українською мовою:</label>
                    <input v-model="Store.education.title.ua" type="text" class="form-control" required
                        placeholder="освіта українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть освіту англійською мовою:</label>
                    <input v-model="Store.education.title.en" type="text" class="form-control" required
                        placeholder="освіта англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити освіту</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-education',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Education" })
        },
        changeEducation() {
            this.Store.CHANGE_EDUCATION(this.Store.education);
            this.$router.push({ name: "Education" })
        }
    },
}
</script>