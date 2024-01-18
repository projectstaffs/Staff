<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна погодинної оплати:</h3>
        </div>
        <form @submit.prevent="changeHourlypayment">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть погодинну оплату українською мовою:</label>
                    <input v-model="Store.hourlypayment.title.ua" type="text" class="form-control" required
                        placeholder="погодинна оплата українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть погодинну оплату англійською мовою:</label>
                    <input v-model="Store.hourlypayment.title.en" type="text" class="form-control" required
                        placeholder="погодинна оплата англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити погодинну оплату</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-hourlypayment',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Hourlypayment" })
        },
        changeHourlypayment() {
            this.Store.CHANGE_HOURLYPAYMENT(this.Store.hourlypayment);
            this.$router.push({ name: "Hourlypayment" })
        }
    },
}
</script>