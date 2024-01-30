<template>
    <button @click.prevent="back()" class="btn btn-block btn-info btn-sm data_btn">Назад</button>
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Зміна міста проживання:</h3>
        </div>
        <form @submit.prevent="changeCity">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть місто проживання українською мовою:</label>
                    <input v-model="Store.city.title.ua" type="text" class="form-control" required
                        placeholder="місто проживання українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть місто проживання англійською мовою:</label>
                    <input v-model="Store.city.title.en" type="text" class="form-control" required
                        placeholder="місто проживання англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Змінити місто проживання</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'Change-City',
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        back() {
            this.$router.push({ name: "City" })
        },
        changeCity() {
            this.Store.CHANGE_CITY(this.Store.city);
            this.$router.push({ name: "City" })
        }
    },
}
</script>