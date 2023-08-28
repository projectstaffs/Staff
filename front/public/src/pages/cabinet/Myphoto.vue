<template>
    <form class="category_form" @submit.prevent="createPhoto">               
        <div ref="dropzone" class="category_dropzone">
            Добавьте изображение...
        </div>                                            
        <button class="category_form_btn" type="submit" > Сохранить изображение </button>        
    </form>
    
    <div class="register_error">{{ image_error }}</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import Dropzone from 'dropzone'
export default {
    name: "Myphoto",
    data() {
        return {
            dropzone: {},
            image_error: ''
        }
    },
    setup() {
        const User = useUserStore();
        return { User };
    },
    methods: {
        createPhoto(){                
            const data = new FormData()
            const files = this.dropzone.getAcceptedFiles()
            if(files.length === 1) {
                this.image_error = '';
                files.forEach(file => {
                    data.append('images[]', file);
                    this.dropzone.removeFile(file);                
                })
                data.append('user_id', localStorage.userID);
                if(localStorage.user_image) {
                    this.User.DELETE_PHOTO(localStorage.userID);                
                }                
                this.User.CREATE_PHOTO(data);                                               
            } else if(files.length === 0) {
                this.image_error = 'Добавьте фото.';
            } else {
                this.image_error = 'Добавьте только одно фото.';
            }                                                                        
        },
    },
    mounted() { 
        this.User.GET_TOKEN();       
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url: "/api/photo",
            autoProcessQueue: false,
            addRemoveLinks: true,
            //maxFiles: 1
        });
        this.image_error = '';         
    },
}
</script>

<style>
.category_dropzone {
    min-height: 50px;
    text-align: center;
    background-color: aquamarine;
    cursor: pointer;
    font-size: 20px;
    line-height: 2;
}    
</style>