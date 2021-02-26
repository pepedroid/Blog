import { expr } from 'jquery'
import Vue from'vue'
import Vuex from  'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
    state : {
        title : "",
        description : "",
        text : "",
        img : ""
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
        }

    },// mutations
    actions : {

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
        }


    }
})