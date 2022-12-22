<template>
  <div class="home p-5" style="width: 500px; overflow-wrap: break-word">
    <div class="d-flex justify-content-end">
      <button @click="logout()">Logout</button>
    </div>
    <h1 class="text-danger">Homepage</h1>
    <div v-if="loggingUser">
      <p><b>Username: </b>{{ loggingUser.payload.user.name }}</p>
      <p><b>Id: </b>{{ loggingUser.payload.user.id }}</p>
      <p><b>Email: </b>{{ loggingUser.payload.user.email }}</p>
      <p><b>Token: </b>{{ loggingUser.payload.user.token }}</p>
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
    logout() {
      this.$store.dispatch("logout");
      this.$router.push("/auth");
    },

    fireToast(message) {
      this.$notify({
        title: "Notification",
        text: message,
      });
    },

    subscribe() {
      let pusher = new Pusher("6e47f016a27f2f512d2d", { cluster: "ap1" });
      pusher.subscribe("facebook-event");
      pusher.bind("facebook-event", (data) => {
        const userId = data.data.entry[0].id;
        const eventAction = data.data.entry[0].changes[0].field;

        const message = {
          feed: function () {
            return `User ${this.userId} updated Something`;
          },
          photos: function () {
            return `User ${this.userId} uploaded a new photo`;
          },
          status: function () {
            return `User ${this.userId} uploaded a new post`;
          },
          friends: function () {
            return `User ${this.userId} has a new friend`;
          },
        };

        this.fireToast(message[eventAction].call({ userId }));
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
