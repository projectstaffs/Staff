<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна мови:</h3>
        </div>
        <form @submit.prevent="changeLanguage">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть мову українською мовою:</label>
                    <input v-model="Store.language.title.ua" type="text" class="form-control" required
                        placeholder="мова українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть мову англійською мовою:</label>
                    <input v-model="Store.language.title.en" type="text" class="form-control" required
                        placeholder="мова англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити мову</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-language',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Languages" })
        },
        changeLanguage() {
            this.Store.CHANGE_LANGUAGE(this.Store.language);
            this.$router.push({ name: "Languages" })
        }
    },
}
</script>