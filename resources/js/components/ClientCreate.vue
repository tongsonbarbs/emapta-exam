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
      <label for="contact">Contact</label>
      <input
        type="text"
        class="form-control"
        id="contact"
        v-model="form.contact"
      />
    </div>
    <div class="row">
      <span class="mb-3">Interests</span>
      <div
        class="form-group col-3"
        v-for="interest in interests"
        :key="interest.id"
      >
        <input
          class="form-check-input me-2"
          type="checkbox"
          v-model="form.interests"
          :id="'interest' + interest.id"
          :value="interest.id"
        />
        <label class="form-check-label" :for="'interest' + interest.id">{{
          interest.name
        }}</label>
      </div>
    </div>
    <div class="d-grid gap-2 mt-5">
      <button class="btn btn-primary rounded-pill" @click="submit">
        Create
      </button>
    </div>
  </form>
</template>

<script>
import { useClients } from "../functions/UseClients";

export default {
  props: { interests: Object },
  setup(props, { emit }) {
    const { errorMessage, form, client, createClient } = useClients();
    async function submit() {
      await createClient();

      if (client.value) {
        emit("clientCreated", client.value);
      }
    }

    return {
      errorMessage,
      form,
      submit,
    };
  },
};
</script>