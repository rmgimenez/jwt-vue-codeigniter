import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    token: null,
  }),

  actions: {
    setToken(token) {
      this.token = token;
    },
    setUser(user) {
      this.user = user;
    },

    // seta as variáveis para null, com isso o usuario será deslogado
    logout() {
      this.user = null;
      this.token = null;
    },
  },

  getters: {
    getToken: (state) => {
      return state.token;
    },

    getUser: (state) => {
      return state.user;
    },

    // verifica se tem token
    isUserLoggedIn: (state) => {
      return !!state.token;
    },
  },
});
