<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          {{ $store.getters.getText }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
    };
  },
  mounted() {
    
    this.$store.commit("setTitle","¡Vamos! Conoce un poco sobre mí")
    this.$store.commit("setDescription","¿Quién soy yo?")
    this.$store.commit("setImg","img/about-bg.jpg")
    this.$store.commit("setText","Mi nombre es Guadalupe Valerio y soy ingeniero en Tecnologías de la Información y Comunicación (¿Qué nombre tan largo, no?)\
                Este portal surgió de la necesidad de aprender Laravel e implementar otras tenologás actuales.\
                Te invito a crear una cuenta para que conoczcas todo lo que puedes hacer en esta paltaforma.\
                Mucho éxito. lml")
    
  },
  created: function() {
  },
};
</script>
