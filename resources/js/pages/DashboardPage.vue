<template>
  <div class="row vh-100 vw-100">
    <div class="col-2">
      <SideNav />
    </div>
    <div class="col px-4">
      <AdminNav :title="title" />
      <hr class="mb-5" />
      <router-view
        @change-title="
          (val) => {
            title = val;
          }
        "
      />
    </div>
  </div>
</template>
<script>
import SideNav from "../components/SideNav.vue";
import AdminNav from "../components/AdminNav.vue";
import { ref } from "vue";

export default {
  components: {
    SideNav,
    AdminNav,
  },
  setup() {
    const title = ref("Dashboard");
    return {
      title,
    };
  },
};
</script>