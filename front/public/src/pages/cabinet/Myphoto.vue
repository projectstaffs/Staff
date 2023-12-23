<template>
    <form @submit.prevent="createPhoto">
        <div class="edit_title">{{ $t('cabinet.no_img') }}</div>
        <div class="photo">
            <img class="photo_dropzone_img" src="../../assets/img/phone/photo_icon.svg" alt="">
            <div ref="dropzone" class="photo_dropzone"></div>
        </div>

        <button class="btn" type="submit"> {{ $t('cabinet.img_save') }} </button>
    </form>

    <div class="register_error">{{ image_error }}</div>
</template>

<script>
import { useUserStore } from '../../stores/user';
import Dropzone from 'dropzone';
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
        createPhoto() {
            const data = new FormData()
            const files = this.dropzone.getAcceptedFiles()
            if (files.length === 1) {
                this.image_error = '';
                files.forEach(file => {
                    if (file.size < 2000000) {
                        data.append('images[]', file);
                        this.dropzone.removeFile(file);
                    } else { this.image_error = 'Размер изображения не должен привышать 2мб.'; }
                })
                if (this.image_error === '') {
                    data.append('user_id', localStorage.userID);
                    if (localStorage.user_image) { this.User.DELETE_PHOTO(localStorage.userID); }
                    this.User.CREATE_PHOTO(data);
                }
            } else if (files.length === 0) {
                this.image_error = 'Добавьте фото.';
            } else {
                this.image_error = 'Добавьте только одно фото.';
            }
        },
    },
    mounted() {
        //this.User.GET_TOKEN();
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
.photo {
    width: 400px;
    height: 400px;
    cursor: pointer;
    border-radius: 10px;
    margin: 0px auto 24px;
    background: #5C4538;
    position: relative;
}

.photo_dropzone_img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.photo_dropzone {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
</style>