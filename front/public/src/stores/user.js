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
        GET_ADMINID(){            
            api.get('api/auth/admin')
                .then((res) => {                 
                    localStorage.admin_id = res.data.id;                                      
                })
                .catch(error => { console.log(error); })
        },        
        CREATE_PHOTO(data){            
            api.post('api/auth/photo', data)
                .then((res) => {                                   
                    localStorage.user_image = res.data.preview_url;                    
                    router.push({name: "Account"});                 
                })
                .catch(error => { console.log(error); })
        },
        DELETE_PHOTO(data) {            
            api.post('api/auth/photo/' + data, {_method: 'DELETE'})
                .then((res) => { 
                    localStorage.user_image = '';                
                })
                .catch(error => { console.log(error); })
        },        
        LOGOUT_USER(){                                                 
            api.post('api/auth/logout')
                .then((res) => {                    
                    localStorage.removeItem('access_token');
                    localStorage.removeItem('user');                
                    localStorage.removeItem('user_image');
                    localStorage.removeItem('admin_id');
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
            axios.post('api/auth/login', data)
                .then((res) => {                
                    localStorage.access_token = res.data[0].original.access_token;
                    localStorage.user = JSON.stringify(res.data[1].original);               
                    localStorage.user_image = res.data[1].original.image;
                    localStorage.userID = res.data[1].original.id;

                    this.user = res.data[1].original;
                    router.push({name: "Account"});                    
                })
                .catch(error => { console.log(error); })
        },
        GET_USERS(){       
            axios.get('api/user/')
                .then((res) => {                              
                    this.users = res.data;                 
                })
                .catch(error => { console.log(error); })
        },
        UPDATE_USER(data){  
            axios.put('api/user/' + data.id, data)
                .then((res) => {        
                    localStorage.user = JSON.stringify(res.data.data);
                    this.user = res.data.data;
                    router.push({name: "Account"});                   
                })
                .catch(error => { console.log(error); })
        },
        CREATE_USER(data){                                     
            axios.post('api/user', data)
                .then((res) => {                
                    localStorage.access_token = res.data.access_token;
                    localStorage.user = JSON.stringify(res.data.user);                
                    this.user = res.data.user;
                    localStorage.userID = res.data.user.id;                    
                    router.push({name: "Account"});                   
                })
                .catch(error => { console.log(error); })
        },        
    },
})
