<template>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <template v-if="!$store.state.auth">
            <div class="container">
                <router-link class="navbar-brand"  :to="{ name: 'home' }"> Un Mundo de Ideas</router-link>
                <button
                    class="navbar-toggler navbar-toggler-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <!-- <a v-bind:href='home' class="nav-link">Inicio</a> -->
                            <router-link :to="{ name: 'home' }">Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'about' }">Acerca de</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link  :to="{name: 'posts'}">Lo que te Pierdes</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'acceso' }">Entrar</router-link>
                        </li>

                    </ul>
                </div>
            </div>
        </template>
        <template v-else>

            <div class="container">
                <router-link class="navbar-brand"  :to="{name:'home'}"> ¡Hola! {{this.$store.getters.getUser.name}}</router-link>
                <button
                    class="navbar-toggler navbar-toggler-right"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <!-- <a v-bind:href='home' class="nav-link">Inicio</a> -->
                            <router-link :to="{ name: 'post' }">Inicio</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'Casa' }">Biografía</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link  :to="{name: 'posts'}">Mi Perfil</router-link>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" @click="logOut">SALIR</a>
                            </li>

                    </ul>
                </div>
            </div>

        </template>
    </nav>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },// mounted
    methods : {
        logOut(){
            // Matamos la sesión
            this.$store.dispatch('logOut')
        }// logOut
    }// methods
};
</script>
