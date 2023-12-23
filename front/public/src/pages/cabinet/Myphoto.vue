<template>
    <div class="edit_title">{{ $t('cabinet.no_img') }}</div>
    <form @submit.prevent="createPhoto">
        <div class="photo">
            <div class="photo_inner">
                <img class="photo_dropzone_img" src="../../assets/img/phone/photo_icon.svg" alt="">
                <div ref="dropzone" class="photo_dropzone"></div>
            </div>
            <div class="photo_text">{{ $t('cabinet.img_text') }}</div>
        </div>
        <div class="photo_error">
            <div v-if="image_error" class="login_middle">{{ image_error[locale] }}</div>
        </div>
        <button class="btn" type="submit"> {{ $t('cabinet.img_save') }} </button>
    </form>
</template>

<script>
import { useI18n } from 'vue-i18n';
import { useUserStore } from '../../stores/user';
import Dropzone from 'dropzone';
export default {
    name: "Myphoto",
    data() {
        return {
            dropzone: {},
            image_error: {},
            img_error1: { en: "The photo size should not exceed 3 MB.", ua: "Розмір фото не повинен перевищувати 3 мб." },
            img_error2: { en: "Upload your photo.", ua: "Завантажте фото." },
            img_error3: { en: "Upload only one photo.", ua: "Завантажте лише одне фото." },
        }
    },
    setup() {
        const { t, locale } = useI18n({ useScope: 'global' });
        const User = useUserStore();
        return { t, locale, User };
    },
    methods: {
        createPhoto() {
            const data = new FormData()
            const files = this.dropzone.getAcceptedFiles()
            if (files.length === 1) {
                this.image_error = '';
                files.forEach(file => {
                    if (file.size < 3000000) {
                        data.append('images[]', file);
                        this.dropzone.removeFile(file);
                    } else { this.image_error = this.img_error1; }
                })
                if (!this.image_error) {
                    data.append('user_id', localStorage.userID);
                    if (localStorage.user_image) { this.User.DELETE_PHOTO(localStorage.userID); }
                    this.User.CREATE_PHOTO(data);
                }
            } else if (files.length === 0) {
                this.image_error = this.img_error2;
            } else {
                this.image_error = this.img_error3;
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
    display: flex;
    justify-content: center;
}

.photo_inner {
    width: 300px;
    height: 300px;
    cursor: pointer;
    border-radius: 10px;
    background: #5C4538;
    position: relative;
    margin-right: 5px;
}

.photo_text {
    display: flex;
    align-items: center;
    width: 300px;
    margin-left: 5px;
    color: rgba(30, 21, 16, 0.50);
    font-weight: 300;
    line-height: 150%;
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

.dz-success-mark,
.dz-error-mark {
    display: none;
}

.photo_error {
    min-height: 40px;
    display: flex;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>