<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання обов'язків для доглядальниці:</h3>
        </div>
        <form @submit.prevent="createNursedutie">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть обов'язок для доглядальниці українською мовою:</label>
                    <input v-model="nursedutie.ua" type="text" class="form-control" required
                        placeholder="обов'язок для доглядальниці українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть обов'язок для доглядальниці англійською мовою:</label>
                    <input v-model="nursedutie.en" type="text" class="form-control" required
                        placeholder="обов'язок для доглядальниці англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати обов'язок для доглядальниці</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про обов'язки для доглядальниці:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.nurseduties" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_nursedutie(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_nursedutie(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Nursedutie',
    data() {
        return {
            nursedutie: {},
            fix_nursedutie: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createNursedutie() {
            this.Store.CREATE_NURSEDUTIE(this.nursedutie);
            this.nursedutie.en = '';
            this.nursedutie.ua = '';
        },
        change_nursedutie(id, title) {
            this.fix_nursedutie.id = id;
            this.fix_nursedutie.title = title;
            this.Store.GET_NURSEDUTIE(this.fix_nursedutie);
            this.$router.push({ name: "Change-nursedutie" })
        },
        delete_nursedutie(id) {
            this.Store.DELETE_NURSEDUTIE(id);
        }
    },
    mounted() {
        this.Store.GET_NURSEDUTIES();
    },
}
</script>
