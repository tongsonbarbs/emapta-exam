<template>
  <div class="row py-4 text-secondary">
    <div class="col h3">{{ title }}</div>
    <div class="col-2 d-flex align-items-center justify-content-end">
      <div class="dropdown text-end">
        <span
          role="button"
          id="userDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          {{ `${authUser.first_name} ${authUser.last_name}` }}
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-chevron-down"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            /></svg
        ></span>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
          <li><a class="dropdown-item" @click="logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "@vue/runtime-core";
import { useAuth } from "../functions/UseAuth";

export default {
  props: {
    title: String,
  },
  setup() {
    const { authUser, getAuth, logout } = useAuth();

    onMounted(() => {
      getAuth();
    });

    return {
      authUser,
      logout,
    };
  },
};
</script>

<style scoped>
.dropdown-menu li {
  cursor: pointer;
}
</style>