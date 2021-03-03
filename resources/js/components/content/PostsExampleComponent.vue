<template>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <div class="post-preview" v-for="post in posts">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{post.title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{post.subTitle}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{post.user.name}}</a>
                        on {{  post.created_at | formatDate}}</p>

                    <hr>
                </div>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            posts:[],
        }

    },
    mounted() {
        console.log("Aqui mostraremos los posts publicos de la página");
        this.$store.commit("setTitle","¡Posts Públicos!")
        this.$store.commit("setDescription","Observa todo lo que te pierdes por no crear una cuenta")
        this.$store.commit("setImg","img/about-bg.jpg")

        // Obtenemos los post públicos de la página
        axios.get("api/public/post").then(res =>{
            this.posts = res.data.data;
            console.log(this.posts);
        });
    },// mounted
    methods : {
        logOut(){
            // Matamos la sesión
            this.$store.dispatch('logOut');
        }// logOut
    }// methods
};
</script>
