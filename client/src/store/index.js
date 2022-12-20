import Vue from 'vue';
import Vuex from 'vuex';
import router from '@/router';

Vue.use(Vuex);

const loggingUser = localStorage.getItem('loggingUser');

export default new Vuex.Store({
  state: {
    loggingUser: loggingUser ? JSON.parse(loggingUser) : null,
  },

  getters: {
    loggingUser(state) {
      return state.loggingUser;
    }
  },

  mutations: {
  },

  actions: {
    getRedirectUrl: async function () {
      const response = await Vue.axios.get("http://localhost:8000/api/auth/facebook/redirect");
      const redirectUrl = response.data.payload.url;
      window.location.href = redirectUrl;
    },

    authorize: async function (_, payload) {
      const response = await Vue.axios.post(`http://localhost:8000/api/auth/facebook/callback?code=${payload.code}`);
      const user = response.data;

      localStorage.setItem("loggingUser", JSON.stringify(user));

      router.push("/");
    }
  },

  modules: {
  }
});
