import Vue from 'vue';
import Vuex from 'vuex';

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
      const response = await Vue.axios.get("http://localhost:8000/api/facebook/auth/redirect");
      return response.data.payload.url;
    },

    authorize: async function (_, payload) {
      const response = await Vue.axios.post(`http://localhost:8000/api/facebook/auth/callback?code=${payload.code}`);

      const user = response.data;

      if (!user) {
        return false;
      }

      localStorage.setItem("loggingUser", JSON.stringify(user.payload));
      return true;
    },

    logout: function () {
      localStorage.clear();
    }
  },

  modules: {
  }
});
