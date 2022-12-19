<template>
  <div class="vh-100 d-flex align-items-center justify-content-center">
    <button class="login__button login__button-facebook">Login with Facebook</button>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  components: {},
  data() {
    return {};
  },
  methods: {},
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
