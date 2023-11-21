import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [   
        {
            name: 'Login',
            path: '/', 
            meta: {layout: 'User'},           
            component: () =>import('../pages/Login.vue')                       
        },  
        {
            name: 'Reviews',
            path: '/reviews', 
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/message/Reviews.vue')                       
        },   
        {
            name: 'Add-message',
            path: '/add-message', 
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/message/Add-message.vue')                       
        },
        {
            name: 'Msg-sent',
            path: '/msg-sent', 
            meta: {layout: 'Menu'},            
            component: () =>import('../pages/message/Msg-sent.vue')
        },
        {
            name: 'Msg-received',
            path: '/msg-received',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/message/Msg-received.vue')
        },
        {
            name: 'Messages',
            path: '/message',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/message/Messages.vue')
        },    
        {
            name: 'Users',
            path: '/users',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/Users.vue')
        },        
        {
            name: 'Languages',
            path: '/languages',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/data/Languages.vue')
        },
        {
            name: 'Change-language',
            path: '/change-language', 
            meta: {layout: 'Menu'},            
            component: () =>import('../pages/change-data/Change-language.vue')
        },
        {
            name: 'Children',
            path: '/children',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/data/Children.vue')
        },
        {
            name: 'Change-children',
            path: '/change-children', 
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-children.vue')
        },
        {
            name: 'Agegroup',
            path: '/agegroup',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Agegroup.vue')
        },
        {
            name: 'Change-agegroup',
            path: '/change-agegroup',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-agegroup.vue')
        },
        {
            name: 'Alcohol',
            path: '/alcohol',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Alcohol.vue')
        },
        {
            name: 'Change-alcohol',
            path: '/change-alcohol',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-alcohol.vue')
        },
        {
            name: 'Babysittingdutie',
            path: '/babysittingdutie',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/data/Babysittingdutie.vue')
        },
        {
            name: 'Change-babysittingdutie',
            path: '/change-babysittingdutie',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-babysittingdutie.vue')
        },
        {
            name: 'City',
            path: '/city',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/City.vue')
        },
        {
            name: 'Change-city',
            path: '/change-city',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/change-data/Change-city.vue')
        },
        {
            name: 'Country',
            path: '/country',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/Country.vue')
        },
        {
            name: 'Change-country',
            path: '/change-country',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-country.vue')
        },
        {
            name: 'Criminal',
            path: '/criminal',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/data/Criminal.vue')
        },
        {
            name: 'Change-criminal',
            path: '/change-criminal',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-criminal.vue')
        },
        {
            name: 'Diagnose',
            path: '/diagnose',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Diagnose.vue')
        },
        {
            name: 'Change-diagnose',
            path: '/change-diagnose',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-diagnose.vue')
        },
        {
            name: 'Education',
            path: '/education',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/Education.vue')
        },
        {
            name: 'Change-education',
            path: '/change-education',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-education.vue')
        },
        {
            name: 'Employment',
            path: '/employment',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/Employment.vue')
        },
        {
            name: 'Change-employment',
            path: '/change-employment',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-employment.vue')
        },
        {
            name: 'Experience',
            path: '/experience',         
            meta: {layout: 'Menu'},    
            component: () =>import('../pages/data/Experience.vue')
        },
        {
            name: 'Change-experience',
            path: '/change-experience',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/change-data/Change-experience.vue')
        },
        {
            name: 'Hourlypayment',
            path: '/hourlypayment',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/Hourlypayment.vue')
        },
        {
            name: 'Change-hourlypayment',
            path: '/change-hourlypayment',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-hourlypayment.vue')
        },
        {
            name: 'Housekeeperdutie',
            path: '/housekeeperdutie',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Housekeeperdutie.vue')
        },
        {
            name: 'Change-housekeeperdutie',
            path: '/change-housekeeperdutie',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-housekeeperdutie.vue')
        },
        {
            name: 'Housekeeperpreference',
            path: '/housekeeperpreference',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Housekeeperpreference.vue')
        },
        {
            name: 'Change-housekeeperpreference',
            path: '/change-housekeeperpreference',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/change-data/Change-housekeeperpreference.vue')
        },
        {
            name: 'Housekeepertypeofwork',
            path: '/housekeepertypeofwork',      
            meta: {layout: 'Menu'},       
            component: () =>import('../pages/data/Housekeepertypeofwork.vue')
        },
        {
            name: 'Change-housekeepertypeofwork',
            path: '/change-housekeepertypeofwork',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-housekeepertypeofwork.vue')
        },
        {
            name: 'Joboption',
            path: '/joboption',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Joboption.vue')
        },
        {
            name: 'Change-joboption',
            path: '/change-joboption',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/change-data/Change-joboption.vue')
        },
        {
            name: 'Monthlypayment',
            path: '/monthlypayment',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/data/Monthlypayment.vue')
        },
        {
            name: 'Change-monthlypayment',
            path: '/change-monthlypayment',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-monthlypayment.vue')
        },
        {
            name: 'Moving',
            path: '/moving',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Moving.vue')
        },
        {
            name: 'Change-moving',
            path: '/change-moving',      
            meta: {layout: 'Menu'},       
            component: () =>import('../pages/change-data/Change-moving.vue')
        },    
        {
            name: 'Nursedutie',
            path: '/nursedutie',        
            meta: {layout: 'Menu'},     
            component: () =>import('../pages/data/Nursedutie.vue')
        },
        {
            name: 'Change-nursedutie',
            path: '/change-nursedutie',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-nursedutie.vue')
        },
        {
            name: 'Nursetypeofwork',
            path: '/nursetypeofwork',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/data/Nursetypeofwork.vue')
        },
        {
            name: 'Change-nursetypeofwork',
            path: '/change-nursetypeofwork',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/change-data/Change-nursetypeofwork.vue')
        },
        {
            name: 'Nursingskill',
            path: '/nursingskill',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/data/Nursingskill.vue')
        },
        {
            name: 'Change-nursingskill',
            path: '/change-nursingskill',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-nursingskill.vue')
        },
        {
            name: 'Recommendation',
            path: '/recommendation',      
            meta: {layout: 'Menu'},       
            component: () =>import('../pages/data/Recommendation.vue')
        },
        {
            name: 'Change-recommendation',
            path: '/change-recommendation', 
            meta: {layout: 'Menu'},            
            component: () =>import('../pages/change-data/Change-recommendation.vue')
        },
        {
            name: 'Religion',
            path: '/religion',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Religion.vue')
        },
        {
            name: 'Change-religion',
            path: '/change-religion',        
            meta: {layout: 'Menu'},     
            component: () =>import('../pages/change-data/Change-religion.vue')
        },
        {
            name: 'Schedule',
            path: '/schedule',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Schedule.vue')
        },
        {
            name: 'Change-schedule',
            path: '/change-schedule',       
            meta: {layout: 'Menu'},      
            component: () =>import('../pages/change-data/Change-schedule.vue')
        },
        {
            name: 'Smoking',
            path: '/smoking',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Smoking.vue')
        },
        {
            name: 'Change-smoking',
            path: '/change-smoking',        
            meta: {layout: 'Menu'},     
            component: () =>import('../pages/change-data/Change-smoking.vue')
        },
        {
            name: 'Status',
            path: '/status',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Status.vue')
        },
        {
            name: 'Change-status',
            path: '/change-status',         
            meta: {layout: 'Menu'},    
            component: () =>import('../pages/change-data/Change-status.vue')
        },
        {
            name: 'Typeofwork',
            path: '/typeofwork',             
            meta: {layout: 'Menu'},
            component: () =>import('../pages/data/Typeofwork.vue')
        },
        {
            name: 'Change-typeofwork',
            path: '/change-typeofwork',     
            meta: {layout: 'Menu'},        
            component: () =>import('../pages/change-data/Change-typeofwork.vue')
        },
        {
            name: 'Worklocation',
            path: '/worklocation',    
            meta: {layout: 'Menu'},         
            component: () =>import('../pages/data/Worklocation.vue')
        },
        {
            name: 'Change-worklocation',
            path: '/change-worklocation',   
            meta: {layout: 'Menu'},          
            component: () =>import('../pages/change-data/Change-worklocation.vue')
        },
        {
            name: 'Workperiod',
            path: '/workperiod',         
            meta: {layout: 'Menu'},    
            component: () =>import('../pages/data/Workperiod.vue')
        },
        {
            name: 'Change-workperiod',
            path: '/change-workperiod',  
            meta: {layout: 'Menu'},           
            component: () =>import('../pages/change-data/Change-workperiod.vue')
        },
        ,
    {
        name: '404',
        path: '/:pathMatch(.*)',
        meta: {layout: 'User'},           
        component: () =>import('../pages/Login.vue')
    }      
    ]
})

router.beforeEach((to, from, next) => { 
       
    if(!localStorage.access_token) {
        if(to.name === 'Login'){
            return next()
        } else { return next({ name: 'Login' }) }
    } else {
        let userInfo = JSON.parse(localStorage.user);
        if(userInfo.role !== 'Администратор') {
            if(to.name === 'Login'){
                return next()
            } else { return next({ name: 'Login' }) }
        } else {
            if(to.name === 'Login'){
                return next({ name: 'Messages' })
            } else {
                next();
            }
        }
    }    

    /*if(to.name === 'Login' && localStorage.access_token && userInfo.role == 'Администратор'){
        return next({
            name: 'Messages'
        })
    } 

    next();*/
});

export default router
