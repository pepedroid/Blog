<template v-if="this.$store.state.auth">
    kjasdkjskjajkjk
</template>

<template v-if="posts">
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
import axios from "axios";

export default {
    data(){
        return{
            posts:[],
        }
    },//data
  mounted() {
    //this.$store.state.title="Blog"
    this.$store.commit('setTitle',"Blog")
    this.$store.commit("setDescription","Un espacio para expresar tus ideas")
    this.$store.commit("setImg", "img/home-bg.jpg")
      // Validamos si existe una sesión activa
      if (this.$store.state.auth){
          axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("blog_token")
          axios.get("/api/post").then(response =>{
              if (response.data){
                this.posts = response.data.data;
                console.log(this.posts)
            }
          });
      }

  },
};
</script>
