import Vue from'vue'
import Vuex from  'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
    state : {
        title : "",
        description : "",
        text : "",
        img : "",
        user : JSON.parse(localStorage.getItem('user')) || null,
        auth :  localStorage.getItem('blog_token') || false
    }, // state
    mutations : {
        setTitle(state,title){
            state.title = title
        },
        setDescription(state,description){
            state.description = description
        },
        setText(state,text){
            state.text = text
        },
        setImg(state,img){
            state.img = img
        },
        SET_USER(state,user){
            state.user  = user
            const parsed = JSON.stringify(user);
            localStorage.setItem(
                'user', parsed);
            state.auth = Boolean(user);
        }// SET_USER
    },// mutations
    actions : {
        async login({dispatch}, credentials){
            await axios.get("/sanctum/csrf-cookie");
            await axios.post("/api/auth/login", credentials).then(res =>{
                localStorage.setItem(
                    'blog_token',
                    res.data.access_token
                );
                window.location.href = 'home';
            });
            return dispatch('getUser')

        },// login
        async logOut({commit}){
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("blog_token")
            axios.get('/api/auth/logout').then(res => {
                if (res.data.message == "session die") {
                    commit('SET_USER', null);
                    localStorage.removeItem('blog_token')
                    localStorage.removeItem('user')
                    delete axios.defaults.headers.common['Authorization']
                }// if
            });

        }, // logOut
        getUser({commit}) {
            axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("blog_token")
            axios.get('/api/auth/user').then(res => {
                commit('SET_USER', res.data.body);
                console.log(res.data)
            })
                .catch(() => {
                    commit('SET_USER',null);
                });
        }//getUser

    },//actions
    getters : {
        getTitle(state){
            return state.title
        },
        getDescription(state){
            return state.description
        },
        getText(state){
            return state.text
        },
        getImg(state){
            return state.img
        },
        getUser(state){
            return state.user;
        }


    }
})
