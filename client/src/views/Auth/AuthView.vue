<template>
  <div class="vh-100 d-flex align-items-center justify-content-center">
    <button @click="redirect()" class="login__button login__button-facebook">
      Login with Facebook
    </button>
  </div>
</template>

<script>
export default {
  name: "AuthView",
  components: {},
  data() {
    return {};
  },
  methods: {
    redirect: async function () {
      const redirectUrl = await this.$store.dispatch("getRedirectUrl");
      window.location.href = redirectUrl;
    },
  },
};
</script>

<style>
.login__button {
  padding: 10px 20px;
  border: none;
}

.login__button:hover {
  filter: saturate(50%);
}

.login__button-facebook {
  background: #3b5998;
  color: white;
}
</style>
