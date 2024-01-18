<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна вподобань для домробітниці:</h3>
        </div>
        <form @submit.prevent="changeHousekeeperpreference">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вподобання для домробітниці українською мовою:</label>
                    <input v-model="Store.housekeeperpreference.title.ua" type="text" class="form-control" required
                        placeholder="вподобання для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вподобання для домробітниці англійською мовою:</label>
                    <input v-model="Store.housekeeperpreference.title.en" type="text" class="form-control" required
                        placeholder="вподобання для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити вподобання для домробітниці</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-housekeeperpreference',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Housekeeperpreference" })
        },
        changeHousekeeperpreference() {
            this.Store.CHANGE_HOUSEKEEPERPREFERENCE(this.Store.housekeeperpreference);
            this.$router.push({ name: "Housekeeperpreference" })
        }
    },
}
</script>