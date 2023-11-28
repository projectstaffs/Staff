import { defineStore } from 'pinia';
import api from "../assets/api";

export const useReviewStore = defineStore('review', {
    state: () => {
        return {             
            reviews: {},
            success: ''
        }
    },

    actions: {
        GET_REVIEWS(){   
            api.get('http://localhost/api/auth/review')
                .then(res => {                                    
                    this.reviews = res.data;
                })
                .catch(error => { console.log(error); })
        },
        CREATE_REVIEW(data){            
            api.post('http://localhost/api/auth/review', data)
                .then((res) => {
                    this.success = 'Ваш отзыв успешно отправлен!';
                })
                .catch(error => { console.log(error); })
        },
        DELETE_REVIEW(data) {                       
            api.post('http://localhost/api/auth/review/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_REVIEWS();
                })
                .catch(error => { console.log(error); })
        },
    }
})