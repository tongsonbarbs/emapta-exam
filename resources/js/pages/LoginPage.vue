<template>
  <div class="d-flex vh-100">
    <div class="card m-auto">
      <div class="card-body p-5">
        <Login />
      </div>
    </div>
  </div>
</template>

<script>
import Login from "../components/Login.vue";

export default {
  components: {
    Login,
  },
};
</script>

<style scoped>
.card {
  width: 30%;
}
.form-group {
  margin-bottom: 1em;
}
</style>