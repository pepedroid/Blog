<template>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.html">Un Mundo de Ideas</a>
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
                    <template v-if="$store.state.auth">

                        <li class="nav-item">
                            <a class="nav-link" href="#" @click="logOut">SALIR</a>
<!--                            <router-link :to="{ name: 'acceso' }">SALIR</router-link>-->
                        </li>

                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <router-link :to="{ name: 'acceso' }">Entrar</router-link>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
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
            this.$store.dispatch('logOut');
        }// logOut
    }// methods
};
</script>
