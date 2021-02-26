<template>
  <!-- Page Header -->
  <header
    class="masthead"
    :style="{ backgroundImage: 'url('+$store.getters.getImg+')' }"
  >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1 >{{ $store.getters.getTitle }}</h1>
            <span class="subheading">{{ $store.getters.getDescription }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  data: function () {
    return {
    //  img: "img/home-bg.jpg",
  //    title: "Blog",
    //  description: "Un espacio para expresar tus ideas",
    };
  },
  mounted() {

  },
};
</script>
