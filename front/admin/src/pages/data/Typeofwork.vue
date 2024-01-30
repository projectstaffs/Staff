<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання виду роботи для няні:</h3>
        </div>
        <form @submit.prevent="createTypeofwork">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вид роботи українською мовою:</label>
                    <input v-model="typeofwork.ua" type="text" class="form-control" required
                        placeholder="вид роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вид роботи англійською мовою:</label>
                    <input v-model="typeofwork.en" type="text" class="form-control" required
                        placeholder="вид роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати вид роботи</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про види роботи для няні:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.typeofworks" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_typeofwork(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_typeofwork(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Typeofwork',
    data() {
        return {
            typeofwork: {},
            fix_typeofwork: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createTypeofwork() {
            this.Store.CREATE_TYPEOFWORK(this.typeofwork);
            this.typeofwork.title = '';
        },
        change_typeofwork(id, title) {
            this.fix_typeofwork.id = id;
            this.fix_typeofwork.title = title;
            this.Store.GET_TYPEOFWORK(this.fix_typeofwork);
            this.$router.push({ name: "Change-typeofwork" })
        },
        delete_typeofwork(id) {
            this.Store.DELETE_TYPEOFWORK(id);
        }
    },
    mounted() {
        this.Store.GET_TYPEOFWORKS();
    },
}
</script>
