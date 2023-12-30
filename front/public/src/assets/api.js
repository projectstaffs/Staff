import axios from "axios";
import router from "../router";
import { useUserStore } from '../stores/user';

const api = axios.create();

api.interceptors.request.use(function(config){
    if(localStorage.access_token){
        config.headers.authorization = `Bearer ${localStorage.access_token}`;
    }
    return config;
},function(error){})

api.interceptors.response.use({}, error => {
    if(error.response.data.message === 'Token has expired'){
        return axios.post('api/auth/refresh', {}, {
            headers: {
                'authorization' : `Bearer ${localStorage.access_token}`
            }
        }).then(res => {
            console.log('Токен успешно восстановлен.')
            localStorage.access_token = res.data.access_token;
            error.config.headers.authorization = `Bearer ${res.data.access_token}`;

            return api.request(error.config);
        })
    }

    if(error.response.status === 500) {
        console.log(error.response);
        throw error;
    }

    if(error.response.status === 422) {
        //const User = useUserStore();
        //User.global_error = error.response.data.errors;
        throw error;
    }

    if(error.response.status === 401){
        router.push({name: 'Login'})
    }
})

export default api