<template>
    <div v-if="totalPages > 1" class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                <li class="page-item">
                    <button @click="prevPage" :disabled="Views[namePage] === 1" class="page-link">Назад</button>
                </li>
                <li class="page-item active p_fix">
                    <a href="#" class="page-link">{{ Views[namePage] }}</a>
                </li>
                <li class="page-item">
                    <button @click="nextPage" :disabled="Views[namePage] === totalPages" class="page-link">Вперед</button>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { useViewsStore } from '../../stores/views';
export default {
    name: "Pagination",
    props: {
        totalPages: Number,
        namePage: String
    },
    setup() {
        const Views = useViewsStore();
        return { Views };
    },
    methods: {
        nextPage() {
            if (this.Views[this.namePage] < this.totalPages) { this.Views[this.namePage]++; }
        },
        prevPage() {
            if (this.Views[this.namePage] > 1) { this.Views[this.namePage]--; }
        },
    },
}
</script>