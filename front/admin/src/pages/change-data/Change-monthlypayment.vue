<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна щомісячної оплати:</h3>
        </div>
        <form @submit.prevent="changeMonthlypayment">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть щомісячну оплату українською мовою:</label>
                    <input v-model="Store.monthlypayment.title.ua" type="text" class="form-control" required
                        placeholder="щомісячна оплата українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть щомісячну оплату англійською мовою:</label>
                    <input v-model="Store.monthlypayment.title.en" type="text" class="form-control" required
                        placeholder="щомісячна оплата англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити щомісячну оплату</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-monthlypayment',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Monthlypayment" })
        },
        changeMonthlypayment() {
            this.Store.CHANGE_MONTHLYPAYMENT(this.Store.monthlypayment);
            this.$router.push({ name: "Monthlypayment" })
        }
    },
}
</script>