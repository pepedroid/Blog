import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// Imports components
import ExampleComponent from '../components/ExampleComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';
import AboutComponent from '../components/content/AboutComponent';
import RegistroComponent from '../components/RegistroComponent';


const router = new VueRouter({
    routes: [
        {
            path: '/',
            component : ExampleComponent,
            name : 'home',
            meta:{
                auth : false,
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

export default router;
