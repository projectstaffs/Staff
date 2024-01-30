<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання міста проживання:</h3>
        </div>
        <form @submit.prevent="createCity">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть місто проживання українською мовою:</label>
                    <input v-model="city.ua" type="text" class="form-control" required
                        placeholder="місто проживання українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть місто проживання англійською мовою:</label>
                    <input v-model="city.en" type="text" class="form-control" required
                        placeholder="місто проживання англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати місто проживання</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про міста:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.citys" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_city(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_city(post.id)" class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash"></i>
                                Видалити
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { useDataStore } from '../../stores/variables'
export default {
    name: 'City',
    data() {
        return {
            city: {},
            fix_city: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createCity() {
            this.Store.CREATE_CITY(this.city);
            this.city.ua = '';
            this.city.en = '';
        },
        change_city(id, title) {
            this.fix_city.id = id;
            this.fix_city.title = title;
            this.Store.GET_CITY(this.fix_city);
            this.$router.push({ name: "Change-city" })
        },
        delete_city(id) {
            this.Store.DELETE_CITY(id);
        },
    },
    mounted() {
        this.Store.GET_CITYS();
    },
}
</script>
