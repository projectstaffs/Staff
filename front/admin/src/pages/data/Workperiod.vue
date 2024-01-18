<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання періода роботи:</h3>
        </div>
        <form @submit.prevent="createWorkperiod">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть період роботи українською мовою:</label>
                    <input v-model="workperiod.ua" type="text" class="form-control" required
                        placeholder="період роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть період роботи англійською мовою:</label>
                    <input v-model="workperiod.en" type="text" class="form-control" required
                        placeholder="період роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати період роботи</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про періоди роботи:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.workperiods" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_workperiod(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_workperiod(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Workperiod',
    data() {
        return {
            workperiod: {},
            fix_workperiod: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createWorkperiod() {
            this.Store.CREATE_WORKPERIOD(this.workperiod);
            this.workperiod.en = '';
            this.workperiod.ua = '';
        },
        change_workperiod(id, title) {
            this.fix_workperiod.id = id;
            this.fix_workperiod.title = title;
            this.Store.GET_WORKPERIOD(this.fix_workperiod);
            this.$router.push({ name: "Change-workperiod" })
        },
        delete_workperiod(id) {
            this.Store.DELETE_WORKPERIOD(id);
        }
    },
    mounted() {
        this.Store.GET_WORKPERIODS();
    },
}
</script>
