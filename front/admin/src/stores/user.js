import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";
import router from "../router";

export const useUserStore = defineStore('user', {    
    state: () => {
        return {         
            user: {},
            users: {},                     
        }
    },
    actions: {        
        CREATE_PHOTO(data){            
            api.post('http://localhost/api/auth/photo', data)
                .then((res) => {                                   
                    localStorage.user_image = res.data.preview_url;                    
                    router.push({name: "Account"});                 
                })
                .catch(error => { console.log(error); })
        },
        DELETE_PHOTO(data) {            
            api.post('http://localhost/api/auth/photo/' + data, {_method: 'DELETE'})
                .then((res) => { 
                    localStorage.user_image = '';                
                })
                .catch(error => { console.log(error); })
        },       
        
        LOGOUT_USER(){                                                 
            api.post('http://localhost/api/auth/logout')
                .then((res) => {                    
                    localStorage.removeItem('access_token');
                    localStorage.removeItem('user');                
                    localStorage.removeItem('user_image');
                    localStorage.removeItem('user_id');  
                    localStorage.removeItem('userID');                  
                    
                    this.user = {};                   
                    router.push({name: "Login"});                    
                })
                .catch(error => { console.log(error); })
        },
        GET_USER(){                                     
            this.user = JSON.parse(localStorage.user);
        },
        LOGIN_USER(data){                                                 
            axios.post('http://localhost/api/auth/login', data)
                .then((res) => {                
                    localStorage.access_token = res.data[0].original.access_token;
                    localStorage.user = JSON.stringify(res.data[1].original);               
                    localStorage.user_image = res.data[1].original.image;
                    localStorage.userID = res.data[1].original.id;                    
                    
                    this.user = res.data[1].original;
                    router.push({name: "Messages"});                    
                })
                .catch(error => { console.log(error); })
        },
        GET_USERS(){       
            axios.get('http://localhost/api/user/')
                .then((res) => {                              
                    this.users = res.data;                 
                })
                .catch(error => { console.log(error); })
        },                
    },
})
