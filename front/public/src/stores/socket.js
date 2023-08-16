import {defineStore} from "pinia";
import {io} from "socket.io-client";

export const useSocketStore = defineStore('socket', {
    state: () => ({
        isConnect: false, // Флаг, который говорит, есть ли соединение
        socket: null, // Сам объект для соединения 
        message: 'some'       
    }),
    actions: {
        connect() {
            if (this.isConnect) { return; }    
            this.socket = io('/')
            this.isConnect = true

            // Реакция на сообщение с сервера
            this.socket.on('test', (data) => {
                //toast.success('Connect to: ' + data)
                this.message = data;
            })
        }
    }
})