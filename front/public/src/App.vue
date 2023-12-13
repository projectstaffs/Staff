<template>
    <div class="content">
        <Header></Header>
        <component :is="layout" class="content_inner">
            <router-view />
        </component>
        <Footer></Footer>
        <Window></Window>
    </div>
</template>

<script>
import Header from './pages/layouts/Header.vue';
import Footer from './pages/layouts/Footer.vue';
import Window from './pages/layouts/Window.vue';
import User from './pages/layouts/User.vue';
import Cabinet from './pages/layouts/Cabinet.vue';

export default {
    name: "App",
    methods: {
        allScripts() {
            var body = document.querySelector('body');

            var closestAttr = function (item, attr) {
                var node = item;
                while (node) {
                    var attrValue = node.getAttribute(attr);
                    if (attrValue) {
                        return attrValue;
                    }
                    node = node.parentElement;
                }
                return null;
            };
            var closestItemByClass = function (item, className) {
                var node = item;
                while (node) {
                    if (node.classList.contains(className)) {
                        return node;
                    }
                    node = node.parentElement;
                }
                return null;
            };
            var showWindow = function (target) {
                target.classList.add('is_active');
            }
            var closeWindow = function (target) {
                target.classList.remove('is_active');
            }
            var toggleScroll = function () {
                body.classList.toggle('no_scroll');
            }

            var lang = localStorage.lang;
            if (lang === null) { lang = 'ua'; }
            var languages = document.querySelectorAll('.header_langs_item');
            var lang_block = document.querySelector('.header_langs');
            var page_block = document.querySelector('.header_end_items');
            for (var i = 0; i < languages.length; i++) {
                var current = languages[i].getAttribute('data-lang');
                if (current === lang) { showWindow(languages[i]); }
            }

            body.addEventListener('click', function (e) {
                // Переключение страниц
                if (e.target.classList.contains('inactive')) {
                    var previousActive = page_block.querySelector('.header_btn.is_active');
                    if (previousActive) { closeWindow(previousActive); }
                }
                if (e.target.classList.contains('header_btn')) {
                    if (e.target.classList.contains('is_active')) { return; }
                    var previousActive = page_block.querySelector('.header_btn.is_active');
                    if (previousActive) { closeWindow(previousActive); }
                    showWindow(e.target);
                }
                if (e.target.classList.contains('footer_bottom_item')) {
                    var previousActive = page_block.querySelector('.header_btn.is_active');
                    if (previousActive) { closeWindow(previousActive); }
                    var current = e.target.getAttribute('data-color');
                    if (current) {
                        var newActive = document.getElementById(current);
                        showWindow(newActive);
                    }
                }
                // Переключение языка
                if (e.target.classList.contains('header_langs_item')) {
                    if (e.target.classList.contains('is_active')) { return; }
                    var previousActive = lang_block.querySelector('.header_langs_item.is_active');
                    closeWindow(previousActive);
                    showWindow(e.target);
                }
                // Закрытие окна по кнопкам либо пустому месту
                if (e.target.classList.contains('window_btn') || e.target.classList.contains('window_inner') || e.target.classList.contains('close_btn')) {
                    var window = closestItemByClass(e.target, 'window');
                    if (window) {
                        closeWindow(window);
                        toggleScroll();
                    }
                }

                // Открытие окна о разработке
                var windowClass = closestAttr(e.target, 'data-window');
                if (windowClass !== null) {
                    e.preventDefault();
                    var window = document.querySelector('.' + windowClass);
                    if (window) {
                        showWindow(window);
                        toggleScroll();
                    }
                }
            });

            body.addEventListener('keydown', function (e) {
                if (e.keyCode !== 27) { return; }
                var window = document.querySelector('.window.is_active');
                if (window) {
                    closeWindow(window);
                    toggleScroll();
                }
            });
        }
    },
    computed: {
        layout() {
            return (this.$route.meta.layout || 'User')
        }
    },
    components: { User, Cabinet, Header, Footer, Window },
    mounted() {
        this.allScripts();
    },
}
</script>