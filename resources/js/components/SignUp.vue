<template>
  <form @submit.prevent>
    <ErrorMessage :message="errorMessage" />
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input
            type="text"
            class="form-control"
            id="firstname"
            v-model="form.firstName"
          />
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input
            type="text"
            class="form-control"
            id="lastname"
            v-model="form.lastName"
          />
        </div>
      </div>
    </div>
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
    <div class="form-group">
      <label for="passwordconfirm">Confirm Password</label>
      <input
        type="password"
        class="form-control"
        id="passwordconfirm"
        v-model="form.confirmPassword"
      />
    </div>
    <div class="form-group">
      <label for="contact">Contact</label>
      <input
        type="text"
        class="form-control"
        id="contact"
        v-model="form.contact"
      />
    </div>
    <div class="d-grid gap-2 mt-5">
      <button class="btn btn-primary rounded-pill" @click="signup">
        Sign Up
      </button>
    </div>
    <div class="d-flex justify-content-between small mt-2">
      <span class="text-secondary"
        >Already have an account?
        <router-link :to="{ name: 'Login' }">Login</router-link>
      </span>
    </div>
  </form>
</template>

<script>
import { useAuth } from "../functions/UseAuth";

export default {
  setup() {
    const { signupForm: form, signup, errorMessage } = useAuth();

    return {
      errorMessage,
      form,
      signup,
    };
  },
};
</script>