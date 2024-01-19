import {defineStore} from "pinia";
import {io} from "socket.io-client";
import { useMessageStore } from './message';
import { useUserStore } from './user';

export const useSocketStore = defineStore('socket', {
    state: () => ({
        isConnect: false, // Флаг, который говорит, есть ли соединение
        socket: null, // Сам объект для соединения       
    }),
    actions: {
        connect() {
            if (this.isConnect) { return; }    
            this.socket = io('/')
            this.isConnect = true
            const User = useUserStore();
            // Реакция на сообщение с сервера
            this.socket.on('sendMessage', (data) => {
                if(data == localStorage.userID) {
                    User.GET_USER_SOCKET();
                }
            })

            this.socket.on('sendBlock', (data) => {
                if(data == localStorage.userID) {
                    User.BLOCK_USER_SOCKET();                    
                }
            })
        }
    }
})