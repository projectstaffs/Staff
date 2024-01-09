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
            path: '/about',
            name: 'About', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/About.vue')
        },
        {
            path: '/contacts',
            name: 'Contacts', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/Contacts.vue')
        },
        {
            path: '/privacy',
            name: 'Privacy', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/Privacy.vue')
        },
        {
            path: '/contract',
            name: 'Contract', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/Contract.vue')
        },
        {
            path: '/servicepackages',
            name: 'ServicePackages', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/client/ServicePackages.vue')
        },
        {
            path: '/service',
            name: 'Service', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/client/Service.vue')
        },
        {
            path: '/study',
            name: 'Study', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/worker/Study.vue')
        },
        {
            path: '/popup',
            name: 'Popup', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/Popup.vue')
        },
        {
            path: '/popupmail',
            name: 'PopupMail', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/PopupMail.vue')
        },
        {
            path: '/training',
            name: 'Training', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/worker/Training.vue')
        },
        {
            path: '/seekers',
            name: 'Seekers', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/worker/Seekers.vue')
        },
        {
            path: '/сonditions',
            name: 'Сonditions', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/worker/Сonditions.vue')
        },
        {
            path: '/interview',
            name: 'Interview', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/worker/Interview.vue')
        },
        {
            path: '/information',
            name: 'Information', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/Information.vue')
        },
        {
            path: '/homestaff',
            name: 'HomeStaff', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/client/HomeStaff.vue')
        },
        {
            path: '/businessstaff',
            name: 'BusinessStaff', 
            meta: {layout: 'User'},     
            component: () => import('../pages/staff/client/BusinessStaff.vue')
        },
        {
            name: 'ClientBabyAll',
            path: '/c_baby',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientBabyAll.vue')
        },
        {
            name: 'ClientBabyItem',
            path: '/c_babyitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientBabyItem.vue')
        },
        {
            name: 'ClientNurseAll',
            path: '/c_nurse',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientNurseAll.vue')
        },
        {
            name: 'ClientNurseItem',
            path: '/c_nurseitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientNurseItem.vue')
        },
        {
            name: 'ClientKeeperAll',
            path: '/c_keeper',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientKeeperAll.vue')
        },
        {
            name: 'ClientKeeperItem',
            path: '/c_keeperitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/client/ClientKeeperItem.vue')
        },
        {
            name: 'BabyAll',
            path: '/w_baby',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/BabyAll.vue')
        },
        {
            name: 'BabyItem',
            path: '/w_babyitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/BabyItem.vue')
        },
        {
            name: 'NurseAll',
            path: '/w_nurse',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/NurseAll.vue')
        },
        {
            name: 'NurseItem',
            path: '/w_nurseitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/NurseItem.vue')
        },
        {
            name: 'KeeperAll',
            path: '/w_keeper',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/KeeperAll.vue')
        },
        {
            name: 'KeeperItem',
            path: '/w_keeperitem',
            meta: {layout: 'User'},            
            component: () =>import('../pages/views/worker/KeeperItem.vue')
        },
        {
            name: 'Login',
            path: '/login',
            meta: {layout: 'User'},            
            component: () =>import('../pages/user/Login.vue')
        },
        {
            name: 'Forgot',
            path: '/forgot',
            meta: {layout: 'User'},            
            component: () =>import('../pages/user/Forgot.vue')
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
            name: 'Babysitting',
            path: '/babysitting',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/Babysitting.vue')
        },
        {
            name: 'CreateBabysitting',
            path: '/createbabysitting',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/CreateBabysitting.vue')
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
            name: 'CreateKeeper',
            path: '/createkeeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/CreateKeeper.vue')
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
            name: 'CreateNurse',
            path: '/createnurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/forms/CreateNurse.vue')
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
            name: 'CreateClientBaby',
            path: '/createclientbaby',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/CreateClientBaby.vue')
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
            name: 'CreateClientNurse',
            path: '/createclientnurse',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/CreateClientNurse.vue')
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
            name: 'CreateClientKeeper',
            path: '/createclientkeeper',
            meta: {layout: 'Cabinet'},
            component: () =>import('../pages/cabinet/client/CreateClientKeeper.vue')
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
    if((to.name === 'Forgot' || to.name === 'Login' || to.name === 'Register'|| to.name === 'Register-menu' || to.name === 'Register-employer') && localStorage.access_token){
        return next({
            name: 'Home'
        })
    } 

    if(!localStorage.access_token){
        if(to.name === 'Forgot' || to.name === 'Login' || to.name === 'Register' || to.name === 'Register-employer' || 
            to.name === 'Home' || to.name === 'About' || to.name === 'Contacts' || to.name === 'Privacy' || to.name === 'Contract' || to.name === 'Service' || 
            to.name === 'ServicePackages' || to.name === 'Popup' || to.name === 'PopupMail' || to.name === 'Seekers' || 
            to.name === 'Сonditions' || to.name === 'Interview' || to.name === 'Information' || to.name === 'HomeStaff' || to.name === 'BusinessStaff'){
            return next()
        } else {
            return next({
                name: 'Login'
            })
        }
    } 
     
    if((localStorage.access_token) && ((localStorage.userConfirmed === '0') || (localStorage.userConfirmed === 'false'))) {
        if(to.name === 'Forgot' || to.name === 'Login' || to.name === 'Register' || to.name === 'Register-employer' || 
            to.name === 'Home' || to.name === 'About' || to.name === 'Contacts' || to.name === 'Privacy' || to.name === 'Contract' || to.name === 'Service' || 
            to.name === 'ServicePackages' || to.name === 'Popup' || to.name === 'PopupMail' || to.name === 'Seekers' || 
            to.name === 'Сonditions' || to.name === 'Interview' || to.name === 'Information' || to.name === 'HomeStaff' || to.name === 'BusinessStaff'){
            return next()
        } else {
            return next({
                name: 'PopupMail'
            })
        }
    }

    next();
});

export default router

/* 
{
    name: 'EditClient',
    path: '/editclient',
    meta: {layout: 'Cabinet'},
    component: () =>import('../pages/cabinet/EditClient.vue')
},
{
    name: 'Register-menu',
    path: '/register_menu', 
    meta: {layout: 'User'},           
    component: () =>import('../pages/user/Register-menu.vue')
},
{
    name: 'Mailbox',
    path: '/mailbox',
    meta: {layout: 'Cabinet'},
    component: () =>import('../pages/cabinet/Mailbox.vue')
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
    name: 'Vacancies', // Отзывы
    path: '/vacancies',
    meta: {layout: 'Cabinet'},
    component: () =>import('../pages/cabinet/Vacancies.vue')
},
{
    name: 'Credentials', // Рекомендации
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
*/