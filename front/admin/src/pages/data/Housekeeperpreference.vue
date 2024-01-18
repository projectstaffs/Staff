<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання вподобань для домробітниці:</h3>
        </div>
        <form @submit.prevent="createHousekeeperpreference">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вподобання для домробітниці українською мовою:</label>
                    <input v-model="housekeeperpreference.ua" type="text" class="form-control" required
                        placeholder="вподобання для домробітниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вподобання для домробітниці англійською мовою:</label>
                    <input v-model="housekeeperpreference.en" type="text" class="form-control" required
                        placeholder="вподобання для домробітниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати вподобання для домробітниці</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про вподобання для домробітниці:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.housekeeperpreferences" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_housekeeperpreference(post.id, post.title)"
                                class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_housekeeperpreference(post.id)" class="btn btn-danger btn-sm"
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
    name: 'Housekeeperpreference',
    data() {
        return {
            housekeeperpreference: {},
            fix_housekeeperpreference: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createHousekeeperpreference() {
            this.Store.CREATE_HOUSEKEEPERPREFERENCE(this.housekeeperpreference);
            this.housekeeperpreference.en = '';
            this.housekeeperpreference.ua = '';
        },
        change_housekeeperpreference(id, title) {
            this.fix_housekeeperpreference.id = id;
            this.fix_housekeeperpreference.title = title;
            this.Store.GET_HOUSEKEEPERPREFERENCE(this.fix_housekeeperpreference);
            this.$router.push({ name: "Change-housekeeperpreference" })
        },
        delete_housekeeperpreference(id) {
            this.Store.DELETE_HOUSEKEEPERPREFERENCE(id);
        }
    },
    mounted() {
        this.Store.GET_HOUSEKEEPERPREFERENCES();
    },
}
</script>
