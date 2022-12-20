<template>
  <div class="home text-center">
    <h1 class="text-danger">Homepage</h1>
    <div v-if="loggingUser">
      <p>{{ loggingUser.payload.user.name }}</p>
      <p>{{ loggingUser.payload.user.id }}</p>
      <p>{{ loggingUser.payload.user.email }}</p>
      <p>{{ loggingUser.payload.user.token }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomeView",
  components: {},

  computed: {
    loggingUser() {
      return this.$store.state.loggingUser;
    },
  },
};
</script>
