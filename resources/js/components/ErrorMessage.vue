<template>
  <div v-if="message" class="alert alert-danger">
    {{ message }}
  </div>
</template>
<script>
export default {
  props: {
    message: String,
  },
};
</script>
