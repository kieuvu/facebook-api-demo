<template>
  <div class="home text-center">
    <h1 class="text-danger">Homepage</h1>
    <div v-if="loggingUser">
      <p>{{ loggingUser.payload.user.name }}</p>
      <p>{{ loggingUser.payload.user.id }}</p>
      <p>{{ loggingUser.payload.user.email }}</p>
      <p>{{ loggingUser.payload.user.token }}</p>
      <notifications />
    </div>
  </div>
</template>

<script>
import Pusher from "pusher-js"; // import Pusher

export default {
  name: "HomeView",
  components: {},

  created() {
    this.subscribe();
  },

  methods: {
    fireToast(title, message) {
      this.$notify({
        title: title,
        text: message,
      });
    },

    subscribe() {
      let pusher = new Pusher("6e47f016a27f2f512d2d", { cluster: "ap1" });
      pusher.subscribe("facebook-event");
      pusher.bind("facebook-event", (data) => {
        this.fireToast(data.data.entry[0].id, "Updated Anything");
      });
    },
  },

  computed: {
    loggingUser() {
      return this.$store.state.loggingUser;
    },
  },
};
</script>
