<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна періода роботи:</h3>
        </div>
        <form @submit.prevent="changeWorkperiod">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть період роботи українською мовою:</label>
                    <input v-model="Store.workperiod.title.ua" type="text" class="form-control" required
                        placeholder="період роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть період роботи англійською мовою:</label>
                    <input v-model="Store.workperiod.title.en" type="text" class="form-control" required
                        placeholder="період роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити період роботи</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-workperiod',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Workperiod" })
        },
        changeWorkperiod() {
            this.Store.CHANGE_WORKPERIOD(this.Store.workperiod);
            this.$router.push({ name: "Workperiod" })
        }
    },
}
</script>