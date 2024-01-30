<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання виду роботи для домробітниці:</h3>
        </div>
        <form @submit.prevent="createHousekeepertypeofwork">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вид роботи для домробітниці українською мовою:</label>
                    <input v-model="housekeepertypeofwork.ua" type="text" class="form-control" required
                        placeholder="вид роботи для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вид роботи для домробітниці англійською мовою:</label>
                    <input v-model="housekeepertypeofwork.en" type="text" class="form-control" required
                        placeholder="вид роботи для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати вид роботи для домробітниці</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про види роботи для домробітниці:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.housekeepertypeofworks" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_housekeepertypeofwork(post.id, post.title)"
                                class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_housekeepertypeofwork(post.id)" class="btn btn-danger btn-sm"
                                href="#">
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
    name: 'Housekeepertypeofwork',
    data() {
        return {
            housekeepertypeofwork: {},
            fix_housekeepertypeofwork: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createHousekeepertypeofwork() {
            this.Store.CREATE_HOUSEKEEPERTYPEOFWORK(this.housekeepertypeofwork);
            this.housekeepertypeofwork.en = '';
            this.housekeepertypeofwork.ua = '';
        },
        change_housekeepertypeofwork(id, title) {
            this.fix_housekeepertypeofwork.id = id;
            this.fix_housekeepertypeofwork.title = title;
            this.Store.GET_HOUSEKEEPERTYPEOFWORK(this.fix_housekeepertypeofwork);
            this.$router.push({ name: "Change-housekeepertypeofwork" })
        },
        delete_housekeepertypeofwork(id) {
            this.Store.DELETE_HOUSEKEEPERTYPEOFWORK(id);
        }
    },
    mounted() {
        this.Store.GET_HOUSEKEEPERTYPEOFWORKS();
    },
}
</script>
