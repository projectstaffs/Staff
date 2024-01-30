<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання виду роботи для доглядальниці:</h3>
        </div>
        <form @submit.prevent="createNursetypeofwork">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вид роботи українською мовою:</label>
                    <input v-model="nursetypeofwork.ua" type="text" class="form-control" required
                        placeholder="вид роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вид роботи англійською мовою:</label>
                    <input v-model="nursetypeofwork.en" type="text" class="form-control" required
                        placeholder="вид роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати вид роботи</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про види роботи для доглядальниці:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.nursetypeofworks" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_nursetypeofwork(post.id, post.title)" class="btn btn-info btn-sm"
                                href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_nursetypeofwork(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Nursetypeofwork',
    data() {
        return {
            nursetypeofwork: {},
            fix_nursetypeofwork: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createNursetypeofwork() {
            this.Store.CREATE_NURSETYPEOFWORK(this.nursetypeofwork);
            this.nursetypeofwork.en = '';
            this.nursetypeofwork.ua = '';
        },
        change_nursetypeofwork(id, title) {
            this.fix_nursetypeofwork.id = id;
            this.fix_nursetypeofwork.title = title;
            this.Store.GET_NURSETYPEOFWORK(this.fix_nursetypeofwork);
            this.$router.push({ name: "Change-nursetypeofwork" })
        },
        delete_nursetypeofwork(id) {
            this.Store.DELETE_NURSETYPEOFWORK(id);
        }
    },
    mounted() {
        this.Store.GET_NURSETYPEOFWORKS();
    },
}
</script>
