<template>
  <div class="d-flex vh-100">
    <div class="card m-auto">
      <div class="card-body p-5">
        <SignUp />
      </div>
    </div>
  </div>
</template>

<script>
import SignUp from "../components/SignUp.vue";

export default {
  components: {
    SignUp,
  },
};
</script>

<style scoped>
.card {
  width: 45%;
}
.form-group {
  margin-bottom: 1em;
}
</style>