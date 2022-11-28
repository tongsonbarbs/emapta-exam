<template>
  <form @submit.prevent>
    <ErrorMessage :message="errorMessage" />
    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        v-model="form.email"
      />
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="password"
        class="form-control"
        id="password"
        v-model="form.password"
      />
    </div>
    <div class="d-grid gap-2 mt-5">
      <button class="btn btn-primary rounded-pill" @click="login">Login</button>
    </div>
    <div class="d-flex justify-content-between small mt-2">
      <span class="text-secondary"
        >Create an account
        <router-link :to="{ name: 'Signup' }">here</router-link></span
      >
      <span><a href="#">Forgot password?</a></span>
    </div>
  </form>
</template>

<script>
import { useAuth } from "../functions/UseAuth";

export default {
  setup() {
    const { loginForm: form, login, errorMessage } = useAuth();

    return {
      errorMessage,
      form,
      login,
    };
  },
};
</script>