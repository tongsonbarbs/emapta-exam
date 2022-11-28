<template>
  <div class="modal modal-lg fade" tabindex="-1" :id="id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="h5">
            <slot name="header"></slot>
          </div>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body py-4 px-5">
          <slot name="main"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: String,
  },
};
</script>
