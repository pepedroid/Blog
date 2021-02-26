<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.html">Un Mundo de Ideas</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a v-bind:href='/' class="nav-link">Inicio</a>
                    <router-link :to="{ name: 'home' }">Home</router-link>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lo que te pierdes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
