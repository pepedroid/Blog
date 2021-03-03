import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// Imports components
import ExampleComponent from '../components/content/ExampleComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import AboutComponent from '../components/content/AboutComponent';
import RegistroComponent from '../components/RegistroComponent';
import PostsExampleComponent from "../components/content/PostsExampleComponent";


const router = new VueRouter({
    routes: [
        {
            path: '/',
            component : ExampleComponent,
            name : 'home',
            meta:{
           //     requiresAuth : true,
                title : 'Blog'
            }
        },// home
        {
            path: '/acercaDe',
            component : AboutComponent,
            name : 'about',
            meta:{
                auth : false,
                title : 'Acerca de'
            }
        },// acercaDe
        {
            path: '/posts',
            component : PostsExampleComponent,
            name : 'posts',
            meta:{
                auth : false,
                title : 'Posts Públicos'
            }
        },// loQueTePierdes
        {
            path: '/acceso',
            component : LoginComponent,
            name : 'acceso',
            meta: {
                auth: false,
                title: 'Acceso'
            }
        },// acceso
        {
            path : '/registro',
            component : RegistroComponent,
            name : 'registro',
            meta : {
                auth : false,
                title : "Registro"
            }

        }// registro
    ]// routes
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('blog_token') == null) {
            next({
                path: '/acceso',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('user'))
            if(to.matched.some(record => record.meta.is_admin)) {
                if(user.is_admin == 1){
                    next()
                }
                else{
                    next({ name: 'userboard'})
                }
            }else {
                next()
            }
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if(localStorage.getItem('blog_token') == null){
            next()
        }
        else{
            next({ name: 'userboard'})
        }
    }else {
        next()
    }
})

export default router;
