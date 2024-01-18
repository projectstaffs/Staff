<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання вікових груп:</h3>
        </div>
        <form @submit.prevent="createAgegroup">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть вікову групу українською мовою:</label>
                    <input v-model="agegroup.ua" type="text" class="form-control" required
                        placeholder="вікова група українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть вікову групу англійською мовою:</label>
                    <input v-model="agegroup.en" type="text" class="form-control" required
                        placeholder="вікова група англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати вікову групу</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про вікові групи:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.agegroups" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_agegroup(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_agegroup(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Agegroup',
    data() {
        return {
            agegroup: {},
            fix_agegroup: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createAgegroup() {
            this.Store.CREATE_AGEGROUP(this.agegroup);
            this.agegroup.en = '';
            this.agegroup.ua = '';
        },
        change_agegroup(id, title) {
            this.fix_agegroup.id = id;
            this.fix_agegroup.title = title;
            this.Store.GET_AGEGROUP(this.fix_agegroup);
            this.$router.push({ name: "Change-agegroup" })
        },
        delete_agegroup(id) {
            this.Store.DELETE_AGEGROUP(id);
        }
    },
    mounted() {
        this.Store.GET_AGEGROUPS();
    },
}
</script>
