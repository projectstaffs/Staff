<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна діагнозу:</h3>
        </div>
        <form @submit.prevent="changeDiagnose">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть діагноз українською мовою:</label>
                    <input v-model="Store.diagnose.title.ua" type="text" class="form-control" required
                        placeholder="діагноз українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть діагноз англійською мовою:</label>
                    <input v-model="Store.diagnose.title.en" type="text" class="form-control" required
                        placeholder="діагноз англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити діагноз</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-diagnose',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "Diagnose" })
        },
        changeDiagnose() {
            this.Store.CHANGE_DIAGNOSE(this.Store.diagnose);
            this.$router.push({ name: "Diagnose" })
        }
    },
}
</script>