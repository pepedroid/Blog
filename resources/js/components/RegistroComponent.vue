<template>
  <div class="container">
    <router-view></router-view>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">Registro de usuario</div>
          <div class="card-body">
            <p v-if="errors.length">
              <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
              <ul>
               <li class="alert alert-danger" v-for="error in errors">{{ error }}</li>
              </ul>
            </p>
            <form id="frmRegisterUser" @submit="register" method="POST">
              <div class="form-group row">
                <label
                  for="first_name"
                  class="col-md-4 col-form-label text-md-right"
                >
                  Nombre(s)
                </label>
                <div class="col-md-6">
                  <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    min="3"
                    max="60"
                    class="form-control"
                    required
                    autofocus
                    v-model="user.firstName"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="secondNa,e"
                  class="col-md-4 col-form-label text-md-right"
                >
                  Apellido Paterno
                </label>
                <div class="col-md-6">
                  <input
                    id="secondName"
                    name="secondName"
                    type="text"
                    min="3"
                    max="25"
                    class="form-control"
                    required
                    autofocus
                    v-model="user.secondName"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="lastName"
                  class="col-md-4 col-form-label text-md-right"
                >
                  Apellido Materno
                </label>
                <div class="col-md-6">
                  <input
                    id="lastName"
                    name="lastName"
                    type="text"
                    min="3"
                    max="25"
                    class="form-control @error('last_name') is-invalid @enderror"
                    autofocus
                    v-model="user.lastName"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="genre"
                  class="col-md-4 col-form-label text-md-right"
                >
                  Genero
                </label>
                <div class="col-md-6">
                  <select
                    id="genre"
                    name="genre"
                    v-model="user.genre"
                    required
                    class="form-control @error('genre') is-invalid @enderror">
                    <option value="F">Femenino</option>
                    <option value="M">Masculino</option>
                  </select>
                </div>
              </div>

                <div class="form-group row">
                    <label
                        for="email"
                        class="col-md-4 col-form-label text-md-right"
                    >NickName</label
                    >
                    <div class="col-md-6">
                        <input
                            id="nickName" name="nickName" type="text" class="form-control"
                            required
                            v-model="user.nickName"
                        />
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        for="email"
                        class="col-md-4 col-form-label text-md-right"
                    >Correo Electrónico</label
                    >
                    <div class="col-md-6">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            required
                            v-model="user.email"
                        />
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
                    name="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                    v-model="user.password"
                  />
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
                    <label class="form-check-label" for="remember">
                      Recordar
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Entrar</button>

                  <a class="btn btn-link" href="">
                    ¿Has olvidado la contraseña?
                  </a>
                  <router-link class="btn btn-link" :to="{ name: 'registro' }"
                    >Crear una cuenta</router-link
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$store.commit("setTitle", "Registro de usuarios");
    this.$store.commit(
      "setDescription",
      "Ingresa tus datos para crear una cuenta y poder acceder a la plataforma"
    );
    this.$store.commit("setImg", "img/contact-bg.jpg");
  }, // mounted
  /**
   * Datos que contendrá el componente de Login
   */
  data: function () {
    return {
      errors: [],
      user: {
        name: "",
        email: "",
        nickName:"",
        password: "",
        firstName: "",
        secondName: "",
        lastName: "",
        genre: "",
        born_date: "",
      },
    };
  }, // data
 //   props : ['errors'],
  methods: {
    register: function (e) {
      e.preventDefault();
      this.errors = [];
      console.log(this.user)
      // Validación de formularios :v
      axios.post("/api/auth/signup", this.user).then((res) => {
          if (res.data){
              if (res.status == 201){
                  alert(res.data.message)
                  this.$router.push({ name: 'acceso' });

              }
          }
        console.warn("Impreción de respuesta api");
          console.log(res)
        console.log(res.body)
        console.log(res.message)
       // const notaServidor = res.data;
       // this.notas.push(notaServidor);
      }).catch(error => {
          if (error.response.status == 422){// validación de errores en form
              if (error.response.data.errors.nickName)
                  this.errors.push(error.response.data.errors.nickName);
              if (error.response.data.errors.email)
                  this.errors.push(error.response.data.errors.email);
              if (error.response.data.errors.password)
                  this.errors.push(error.response.data.errors.password);
              if (error.response.data.errors.firstName)
                  this.errors.push(error.response.data.errors.firstName);
              if (error.response.data.errors.secondName)
                  this.errors.push(error.response.data.errors.secondName);
              if (error.response.data.errors.genre)
                  this.errors.push(error.response.data.errors.genre);
          }// response status
      })
      ;
    },
  }, // methods
};
</script>
