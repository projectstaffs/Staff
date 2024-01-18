<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання обов'язків для няні:</h3>
        </div>
        <form @submit.prevent="createBabysittingdutie">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть обов'язок для няні українською мовою:</label>
                    <input v-model="babysittingdutie.ua" type="text" class="form-control" required
                        placeholder="обов'язок для няні українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть обов'язок для няні англійською мовою:</label>
                    <input v-model="babysittingdutie.en" type="text" class="form-control" required
                        placeholder="обов'язок для няні англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати обов'язок для няні</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про обов'язки для няні:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.babysittingduties" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_babysittingdutie(post.id, post.title)" class="btn btn-info btn-sm"
                                href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_babysittingdutie(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Babysittingdutie',
    data() {
        return {
            babysittingdutie: {},
            fix_babysittingdutie: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createBabysittingdutie() {
            this.Store.CREATE_BABYSITTINGDUTIE(this.babysittingdutie);
            this.babysittingdutie.ua = '';
            this.babysittingdutie.en = '';
        },
        change_babysittingdutie(id, title) {
            this.fix_babysittingdutie.id = id;
            this.fix_babysittingdutie.title = title;
            this.Store.GET_BABYSITTINGDUTIE(this.fix_babysittingdutie);
            this.$router.push({ name: "Change-babysittingdutie" })
        },
        delete_babysittingdutie(id) {
            this.Store.DELETE_BABYSITTINGDUTIE(id);
        }
    },
    mounted() {
        this.Store.GET_BABYSITTINGDUTIES();
    },
}
</script>
