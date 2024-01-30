<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання діагнозу:</h3>
        </div>
        <form @submit.prevent="createDiagnose">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть діагноз українською мовою:</label>
                    <input v-model="diagnose.ua" type="text" class="form-control" required
                        placeholder="діагноз українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть діагноз англійською мовою:</label>
                    <input v-model="diagnose.en" type="text" class="form-control" required
                        placeholder="діагноз англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати діагноз</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про діагнози:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.diagnoses" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_diagnose(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_diagnose(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Diagnose',
    data() {
        return {
            diagnose: {},
            fix_diagnose: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createDiagnose() {
            this.Store.CREATE_DIAGNOSE(this.diagnose);
            this.diagnose.en = '';
            this.diagnose.ua = '';
        },
        change_diagnose(id, title) {
            this.fix_diagnose.id = id;
            this.fix_diagnose.title = title;
            this.Store.GET_DIAGNOSE(this.fix_diagnose);
            this.$router.push({ name: "Change-diagnose" })
        },
        delete_diagnose(id) {
            this.Store.DELETE_DIAGNOSE(id);
        }
    },
    mounted() {
        this.Store.GET_DIAGNOSES();
    },
}
</script>
