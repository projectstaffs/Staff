<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання освіти:</h3>
        </div>
        <form @submit.prevent="createEducation">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть освіту українською мовою:</label>
                    <input v-model="education.ua" type="text" class="form-control" required
                        placeholder="освіта українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть освіту англійською мовою:</label>
                    <input v-model="education.en" type="text" class="form-control" required
                        placeholder="освіта англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати освіту</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про освіту:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.educations" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_education(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_education(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Education',
    data() {
        return {
            education: {},
            fix_education: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createEducation() {
            this.Store.CREATE_EDUCATION(this.education);
            this.education.en = '';
            this.education.ua = '';
        },
        change_education(id, title) {
            this.fix_education.id = id;
            this.fix_education.title = title;
            this.Store.GET_EDUCATION(this.fix_education);
            this.$router.push({ name: "Change-education" })
        },
        delete_education(id) {
            this.Store.DELETE_EDUCATION(id);
        }
    },
    mounted() {
        this.Store.GET_EDUCATIONS();
    },
}
</script>
