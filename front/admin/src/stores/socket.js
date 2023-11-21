import {defineStore} from "pinia";
import {io} from "socket.io-client";
import { useMessageStore } from './message';

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

            // Реакция на сообщение с сервера
            this.socket.on('sendMessage', (data) => {
                //toast.success('Connect to: ' + data)
                if(data == localStorage.userID) {
                    const Message = useMessageStore();
                    Message.GET_COUNTMESSAGE(localStorage.userID);
                    Message.GET_MSG_INSOCKET(localStorage.userID);
                }
            })
        }
    }
})