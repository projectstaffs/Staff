<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання погодинної оплати:</h3>
        </div>
        <form @submit.prevent="createHourlypayment">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть погодинну оплату українською мовою:</label>
                    <input v-model="hourlypayment.ua" type="text" class="form-control" required
                        placeholder="погодинна оплата українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть погодинну оплату англійською мовою:</label>
                    <input v-model="hourlypayment.en" type="text" class="form-control" required
                        placeholder="погодинна оплата англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати погодинну оплату</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про погодинну оплату:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.hourlypayments" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_hourlypayment(post.id, post.title)" class="btn btn-info btn-sm"
                                href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_hourlypayment(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Hourlypayment',
    data() {
        return {
            hourlypayment: {},
            fix_hourlypayment: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createHourlypayment() {
            this.Store.CREATE_HOURLYPAYMENT(this.hourlypayment);
            this.hourlypayment.en = '';
            this.hourlypayment.ua = '';
        },
        change_hourlypayment(id, title) {
            this.fix_hourlypayment.id = id;
            this.fix_hourlypayment.title = title;
            this.Store.GET_HOURLYPAYMENT(this.fix_hourlypayment);
            this.$router.push({ name: "Change-hourlypayment" })
        },
        delete_hourlypayment(id) {
            this.Store.DELETE_HOURLYPAYMENT(id);
        }
    },
    mounted() {
        this.Store.GET_HOURLYPAYMENTS();
    },
}
</script>
