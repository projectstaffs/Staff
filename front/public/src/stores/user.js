import { defineStore } from 'pinia';
import axios from 'axios';
import api from "../assets/api";
import router from "../router";

export const useUserStore = defineStore('user', {    
    state: () => {
        return {                        
            user: {},
            users: {}, 
            token: '',
            photo: '',
            login_error: '',
            forgot_error: '',
            register_error: null,                    
        }
    },
    actions: {  
        GET_TOKEN(){
            this.token = localStorage.access_token;
        }, 
        GET_PHOTO(){
            this.photo = localStorage.user_image;
        },     
        GET_ADMINID(){            
            api.get('api/auth/admin')
                .then((res) => {                
                    localStorage.admin_id = res.data;                                      
                })
                .catch(error => { console.log(error); })
        },        
        CREATE_PHOTO(data){            
            api.post('api/auth/photo', data)
                .then((res) => {   
                    //console.log(res); 
                    this.photo = res.data.url;                               
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
                    localStorage.removeItem('userConfirmed');
                    localStorage.removeItem('userID');
                    localStorage.removeItem('lang');
                    localStorage.removeItem('clientBabyitem'); localStorage.removeItem('clientBabyitemUser'); 
                    localStorage.removeItem('clientNurseitem'); localStorage.removeItem('clientNurseitemUser');
                    localStorage.removeItem('clientKeeperitem'); localStorage.removeItem('clientKeeperitemUser');
                    localStorage.removeItem('workerBabyitem'); localStorage.removeItem('workerBabyitemUser');
                    localStorage.removeItem('workerNurseitem'); localStorage.removeItem('workerNurseitemUser');
                    localStorage.removeItem('workerKeeperitem'); localStorage.removeItem('workerKeeperitemUser');                  
                    
                    this.user = {}; 
                    this.token = '';                   
                    router.push({name: "Login"});                    
                })
                .catch(error => { console.log(error); })
        },
        GET_USER(){                                     
            this.user = JSON.parse(localStorage.user);
        },
        GET_USER_SOCKET(){                                     
            this.user = JSON.parse(localStorage.user);
            this.user.confirmed = 1;
            localStorage.user = JSON.stringify(this.user);
            localStorage.userConfirmed = 1;
            window.location.reload(true);
        },
        FORGOT_PASSWORD(data){ 
            if(localStorage.lang && (localStorage.lang == 'en')) {
                data.lang = 'en'; 
            } else { data.lang = 'ua'; }                                     
            axios.post('api/forgot_password', data)
                .then((res) => { 
                    this.forgot_error = '';
                    router.push({name: "Login"});                                       
                })
                .catch(error => { 
                    //console.log(error);
                    this.forgot_error = error.response.data.error;  
                })
        },
        LOGIN_USER(data){                                                 
            axios.post('api/auth/login', data)
                .then((res) => { 
                    this.login_error = '';               
                    localStorage.access_token = res.data[0].original.access_token;
                    localStorage.user = JSON.stringify(res.data[1].original);               
                    localStorage.user_image = res.data[1].original.image;
                    localStorage.userConfirmed = res.data[1].original.confirmed;
                    localStorage.userID = res.data[1].original.id;

                    this.token = res.data[0].original.access_token;
                    this.user = res.data[1].original;                    
                    router.push({name: "Home"});                    
                })
                .catch(error => { 
                    this.login_error = error.response.data.error;
                    //console.log(error.response.data.error); 
                })
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
                    this.register_error = null;    
                    localStorage.user = JSON.stringify(res.data.data);
                    this.user = res.data.data;
                    router.push({name: "Account"});                   
                })
                .catch(error => { 
                    if(error) {
                        this.register_error = error.response.data.errors;
                        for (const key in this.register_error) {
                            this.register_error[key][0] = JSON.parse(this.register_error[key][0]);
                        }
                    } 
                })
        },
        CREATE_USER(data){
            if(localStorage.lang && (localStorage.lang == 'en')) {
                data.lang = 'en'; 
            } else { data.lang = 'ua'; }                                  
            axios.post('api/user', data)
                .then((res) => { 
                    this.register_error = null;               
                    localStorage.access_token = res.data.access_token;
                    localStorage.user = JSON.stringify(res.data.user);
                    localStorage.userID = res.data.user.id;
                    localStorage.userConfirmed = res.data.user.confirmed;

                    this.token = res.data.access_token;
                    this.user = res.data.user;                    
                    router.push({name: "PopupMail"});                   
                })
                .catch(error => {
                    if(error) {
                        this.register_error = error.response.data.errors;
                        for (const key in this.register_error) {
                            this.register_error[key][0] = JSON.parse(this.register_error[key][0]);
                        }
                    }                      
                })
        },        
    },
})
