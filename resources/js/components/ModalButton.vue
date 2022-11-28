<template>
  <button
    type="button"
    class="btn"
    data-bs-toggle="modal"
    :data-bs-target="'#' + target"
  >
    <slot></slot>
  </button>
</template>
<script>
export default {
  props: {
    target: String,
  },
};
</script>