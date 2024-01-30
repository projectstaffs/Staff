<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання досвіду роботи:</h3>
        </div>
        <form @submit.prevent="createExperience">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть досвід роботи українською мовою:</label>
                    <input v-model="experience.ua" type="text" class="form-control" required
                        placeholder="досвід роботи українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть досвід роботи англійською мовою:</label>
                    <input v-model="experience.en" type="text" class="form-control" required
                        placeholder="досвід роботи англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати досвід роботи</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про досвід роботи:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.experiences" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_experience(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_experience(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Experience',
    data() {
        return {
            experience: {},
            fix_experience: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createExperience() {
            this.Store.CREATE_EXPERIENCE(this.experience);
            this.experience.en = '';
            this.experience.ua = '';
        },
        change_experience(id, title) {
            this.fix_experience.id = id;
            this.fix_experience.title = title;
            this.Store.GET_EXPERIENCE(this.fix_experience);
            this.$router.push({ name: "Change-experience" })
        },
        delete_experience(id) {
            this.Store.DELETE_EXPERIENCE(id);
        }
    },
    mounted() {
        this.Store.GET_EXPERIENCES();
    },
}
</script>
