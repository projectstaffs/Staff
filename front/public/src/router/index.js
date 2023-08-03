import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [       
        {
            path: '/',
            name: 'Home', 
            meta: {layout: 'User'},     
            component: () => import('../pages/user/Home.vue')
        },        
        {
            name: 'Login',
            path: '/login',
            meta: {layout: 'User'},            
            component: () =>import('../pages/user/Login.vue')
        },
        {
            name: 'Register-menu',
            path: '/register_menu', 
            meta: {layout: 'User'},           
            component: () =>import('../pages/user/Register-menu.vue')
        },
        {
            name: 'Register',
            path: '/register', 
            meta: {layout: 'User'},           
            component: () =>import('../pages/user/Register.vue')
        },
        {
            name: 'Register-employer',
            path: '/register_employer', 
            meta: {layout: 'User'},           
            component: () =>import('../pages/user/Register-employer.vue')
        },

        {
            name: 'Account',
            path: '/account',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Account.vue')
        },
        {
            name: 'Mailbox',
            path: '/mailbox',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Mailbox.vue')
        },
        {
            name: 'Myphoto',
            path: '/myphoto',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Myphoto.vue')
        },
        {
            name: 'Edit',
            path: '/edit',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Edit.vue')
        },
        {
            name: 'Vacancies',
            path: '/vacancies',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Vacancies.vue')
        },
        {
            name: 'Credentials',
            path: '/credentials',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Credentials.vue')
        },
        {
            name: 'Change-credential',
            path: '/change-credential',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Change-credential.vue')
        },
        {
            name: 'Sent',
            path: '/sent',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Sent.vue')
        },
        {
            name: 'Incoming',
            path: '/incoming',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/Incoming.vue')
        },
        {
            name: 'Babysitting',
            path: '/babysitting',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Babysitting.vue')
        },
        {
            name: 'Change-babysitting',
            path: '/change-babysitting',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Change-babysitting.vue')
        },
        {
            name: 'Housekeeper',
            path: '/housekeeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Housekeeper.vue')
        },
        {
            name: 'Change-housekeeper',
            path: '/change-housekeeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Change-housekeeper.vue')
        },
        {
            name: 'Nurse',
            path: '/nurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Nurse.vue')
        },
        {
            name: 'Change-nurse',
            path: '/change-nurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Change-nurse.vue')
        },
        {
            name: 'Client_baby',
            path: '/client_baby',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Client_baby.vue')
        },
        {
            name: 'Change-client_baby',
            path: '/change-client_baby',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Change-client_baby.vue')
        },
        {
            name: 'Client_nurse',
            path: '/client_nurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Client_nurse.vue')
        },
        {
            name: 'Change-client_nurse',
            path: '/change-client_nurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Change-client_nurse.vue')
        },
        {
            name: 'Client_keeper',
            path: '/client_keeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Client_keeper.vue')
        },
        {
            name: 'Change-client_keeper',
            path: '/change-client_keeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/Change-client_keeper.vue')
        },
        {
            name: '404',
            path: '/:pathMatch(.*)',
            meta: {layout: 'User'},     
            component: () => import('../pages/user/Home.vue')
        }
    ]
})

router.beforeEach((to, from, next) => {    
    if(!localStorage.access_token){
        if(to.name === 'Login' || to.name === 'Register' || to.name === 'Register-menu' || to.name === 'Register-employer' || to.name === 'Home'){
            return next()
        } else {
            return next({
                name: 'Login'
            })
        }
    }    

    if((to.name === 'Login' || to.name === 'Register'|| to.name === 'Register-menu' || to.name === 'Register-employer') && localStorage.access_token){
        return next({
            name: 'Home'
        })
    }    

    next();
});

export default router
