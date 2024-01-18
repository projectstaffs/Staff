<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання мов:</h3>
        </div>
        <form @submit.prevent="createLanguage">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть мову українською мовою:</label>
                    <input v-model="language.ua" type="text" class="form-control" required
                        placeholder="мова українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть мову англійською мовою:</label>
                    <input v-model="language.en" type="text" class="form-control" required
                        placeholder="мова група англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати мову</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про мови:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.languages" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_language(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_language(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Languages',
    data() {
        return {
            language: {},
            fix_language: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createLanguage() {
            this.Store.CREATE_LANGUAGE(this.language);
            this.language.en = '';
            this.language.ua = '';
        },
        change_language(id, title) {
            this.fix_language.id = id;
            this.fix_language.title = title;
            this.Store.GET_LANGUAGE(this.fix_language);
            this.$router.push({ name: "Change-language" })
        },
        delete_language(id) {
            this.Store.DELETE_LANGUAGE(id);
        }
    },
    mounted() {
        this.Store.GET_LANGUAGES();
    },
}
</script>
