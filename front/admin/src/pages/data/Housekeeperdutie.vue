<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання обов'язків для домробітниці:</h3>
        </div>
        <form @submit.prevent="createHousekeeperdutie">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть обов'язок для домробітниці українською мовою:</label>
                    <input v-model="housekeeperdutie.ua" type="text" class="form-control" required
                        placeholder="обов'язок для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть обов'язок для домробітниці англійською мовою:</label>
                    <input v-model="housekeeperdutie.en" type="text" class="form-control" required
                        placeholder="обов'язок для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати обов'язок для домробітниці</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про обов'язки для домробітниці:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.housekeeperduties" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_housekeeperdutie(post.id, post.title)" class="btn btn-info btn-sm"
                                href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_housekeeperdutie(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Housekeeperdutie',
    data() {
        return {
            housekeeperdutie: {},
            fix_housekeeperdutie: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createHousekeeperdutie() {
            this.Store.CREATE_HOUSEKEEPERDUTIE(this.housekeeperdutie);
            this.housekeeperdutie.en = '';
            this.housekeeperdutie.ua = '';
        },
        change_housekeeperdutie(id, title) {
            this.fix_housekeeperdutie.id = id;
            this.fix_housekeeperdutie.title = title;
            this.Store.GET_HOUSEKEEPERDUTIE(this.fix_housekeeperdutie);
            this.$router.push({ name: "Change-housekeeperdutie" })
        },
        delete_housekeeperdutie(id) {
            this.Store.DELETE_HOUSEKEEPERDUTIE(id);
        }
    },
    mounted() {
        this.Store.GET_HOUSEKEEPERDUTIES();
    },
}
</script>
