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
        DELETE_REVIEW(data) {                       
            api.post('api/auth/review/' + data, {_method: 'DELETE'})
                .then((res) => {
                    this.GET_REVIEWS();
                })
                .catch(error => { console.log(error); })
        },
        GET_REVIEWS(){   
            api.get('api/auth/review')
                .then(res => {                                    
                    this.reviews = res.data;
                    this.reviews.forEach((element) => {                               
                        element.name = JSON.parse(element.name); 
                        element.surname = JSON.parse(element.surname);
                        element.city = JSON.parse(element.city);
                        element.content = JSON.parse(element.content);                                                               
                    })
                })
                .catch(error => { console.log(error); })
        },
        CREATE_REVIEW(data){            
            api.post('api/auth/review', data)
                .then((res) => {
                    this.success = 'Ваш отзыв успешно отправлен!';
                })
                .catch(error => { console.log(error); })
        },        

        TEST_REVIEW(data){            
            api.post('api/changelang', data)
                .then((res) => {
                    //this.success = 'Ваш отзыв успешно отправлен!';
                })
                .catch(error => { console.log(error); })
        },
    }
})