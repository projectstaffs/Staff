<template>
    <form class="category_form" @submit.prevent="createPhoto">               
        <div ref="dropzone" class="category_dropzone">
            Добавьте изображение...
        </div>                                            
        <button class="category_form_btn" type="submit" > Сохранить изображение </button>        
    </form>        
</template>
<script>
import {mapActions, mapState} from 'vuex';
import Dropzone from 'dropzone'
export default {
    name: "Myphoto",
    data() {
        return {
            dropzone: {},
        }
    },
    methods: {
        ...mapActions([
            'GET_USER', 'CREATE_PHOTO', 'GET_TOKEN', 'GET_PHOTO', 'DELETE_PHOTO'
        ]),
        createPhoto(){                
            const data = new FormData()
            const files = this.dropzone.getAcceptedFiles()
            if(files.length > 0) {
                files.forEach(file => {
                    data.append('images[]', file);
                    //this.dropzone.removeFile(file);                
                })
                data.append('user_id', this.user.id);
                if(this.photo) {
                    this.DELETE_PHOTO(this.user.id);                
                }                
                this.CREATE_PHOTO(data);                                               
            } else {
                console.log('Добавьте фото');
            }                                                                        
        },
    },
    mounted() {  
        this.GET_TOKEN(); this.GET_USER(); this.GET_PHOTO();       
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url: "/api/photo",
            autoProcessQueue: false,
            addRemoveLinks: true,
            maxFiles: 1
        })         
    },
    computed: {
        ...mapState([
            'user', 'photo' 
        ])
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