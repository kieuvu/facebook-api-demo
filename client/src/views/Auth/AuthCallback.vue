<template>
  <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
    <div>
      <b-spinner type="grow"></b-spinner>
    </div>
    <div>
      <span>Wait a minute ...</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthCallback",
  async created() {
    const code = this.$route.query.code;
    await this.$store.dispatch("authorize", { code: code });
  },
};
</script>
