<template>
  <div class="container">
    <router-view></router-view>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Acceso</div>

          <div class="card-body">
            <form method="POST" @submit="login">
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"
                  >Correo Electrónico</label
                >

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    autofocus
                    v-model="form.email"
                  />
                  <!-- {{ old('email') }} -->
                  <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> -->
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Contraseña</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="current-password"
                    v-model="form.password"
                  />

                  <!--@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      name="remember"
                      id="remember"
                    />
                    <!-- {{ old('remember') ? 'checked' : '' }} -->
                    <label class="form-check-label" for="remember">
                      Recordar
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
              </div>
            </form>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <!-- @if (Route::has('password.request')) -->
                <a class="btn btn-link" href="">
                  <!-- {{ route('password.request') }} -->
                  ¿Has olvidado la contraseña?
                </a>
                <router-link class="btn btn-link" :to="{ name: 'registro' }"
                  >Crear una cuenta</router-link
                >
                <!-- @endif -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from    'axios';
axios.defaults.withCredentials = true;

export default {
  mounted() {
    this.$store.commit("setTitle", "Acceso de usuarios");
    this.$store.commit(
      "setDescription",
      "Ingresa tu correo y contraseña para poder acceder a la plataforma"
    );
    this.$store.commit("setImg", "img/home-bg.jpg");

    axios.get("/api/post").then((response) =>
      //this.info = response
      console.log(response.data)
    );
  }, // mounted
  /**
   * Datos que contendrá el componente de Login
   */
  data: function () {
    return {
        form:{
            email: "",
            password: ""
        }
    };
  }, // data
  methods: {
    async login(e) {
      e.preventDefault();
      await this.$store.dispatch('login',this.form);
      // redirect
    },
  }, // methods
};
</script>
