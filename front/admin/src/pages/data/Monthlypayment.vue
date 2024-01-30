<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Додавання щомісячної оплати:</h3>
        </div>
        <form @submit.prevent="createMonthlypayment">
            <div class="card-body">
                <div class="form-group">
                    <label>Введіть щомісячну оплату українською мовою:</label>
                    <input v-model="monthlypayment.ua" type="text" class="form-control" required
                        placeholder="щомісячна оплата українською мовою">
                </div>
                <div class="form-group">
                    <label>Введіть щомісячну оплату англійською мовою:</label>
                    <input v-model="monthlypayment.en" type="text" class="form-control" required
                        placeholder="щомісячна оплата англійською мовою">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Додати щомісячну оплату</button>
            </div>
        </form>
    </div>

    <h1 class="data_title my-4">Вся інформація про вікові групи:</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <tbody>
                    <tr v-for="post in Store.monthlypayments" :key="post.id">
                        <td>
                            <small> Українська мова </small><br>
                            <a> {{ post.title.ua }} </a> <br>
                            <small> Англійська мова </small><br>
                            <a> {{ post.title.en }} </a>
                        </td>
                        <td class="project-actions text-right">
                            <a @click.prevent="change_monthlypayment(post.id, post.title)" class="btn btn-info btn-sm"
                                href="#">
                                <i class="fas fa-pencil-alt"></i>
                                Змінити
                            </a>
                            <a @click.prevent="delete_monthlypayment(post.id)" class="btn btn-danger btn-sm" href="#">
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
    name: 'Monthlypayment',
    data() {
        return {
            monthlypayment: {},
            fix_monthlypayment: {},
        }
    },
    setup() {
        const Store = useDataStore();
        return { Store };
    },
    methods: {
        createMonthlypayment() {
            this.Store.CREATE_MONTHLYPAYMENT(this.monthlypayment);
            this.monthlypayment.title = '';
        },
        change_monthlypayment(id, title) {
            this.fix_monthlypayment.id = id;
            this.fix_monthlypayment.title = title;
            this.Store.GET_MONTHLYPAYMENT(this.fix_monthlypayment);
            this.$router.push({ name: "Change-monthlypayment" })
        },
        delete_monthlypayment(id) {
            this.Store.DELETE_MONTHLYPAYMENT(id);
        }
    },
    mounted() {
        this.Store.GET_MONTHLYPAYMENTS();
    },
}
</script>
