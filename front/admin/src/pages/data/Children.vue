<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання кількості дітей для роботи:</h3>
        </div>
        <form @submit.prevent="createChildren">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть кількість дітей українською мовою:</label>
                    <input v-model="children.ua" type="text" class="form-control" required
                        placeholder="кількість дітей українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть кількість дітей англійською мовою:</label>
                    <input v-model="children.en" type="text" class="form-control" required
                        placeholder="кількість дітей англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати кількість дітей</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про кількість дітей для роботи:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.childrens" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_children(post.id, post.title)" class="btn btn-info btn-sm" href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_children(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Children',
    data() {
        return {
            children: {},
            fix_children: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createChildren() {
            this.Store.CREATE_CHILDREN(this.children);
            this.children.ua = '';
            this.children.en = '';
        },
        change_children(id, title) {
            this.fix_children.id = id;
            this.fix_children.title = title;
            console.log(this.fix_children);
            //this.Store.GET_CHILDREN(this.fix_children);
            //this.$router.push({ name: "Change-children" })
        },
        delete_children(id) {
            this.Store.DELETE_CHILDREN(id);
        }
    },
    mounted() {
        this.Store.GET_CHILDRENS();
    },
}
</script>