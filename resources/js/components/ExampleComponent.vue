<template>

</template>

<script>
export default {
  mounted() {
    //this.$store.state.title="Blog"
    this.$store.commit('setTitle',"Blog")
    this.$store.commit("setDescription","Un espacio para expresar tus ideas")
    this.$store.commit("setImg", "img/home-bg.jpg")
    
  },
};
</script>
