<template>
  <div class="row mb-3">
    <div class="col-10 h5">Clients</div>
    <div class="col-2 d-flex justify-content-end">
      <ModalButton class="btn-primary" target="createClientModal"
        >Create Client</ModalButton
      >
    </div>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="client in clients" :key="client.id">
        <td>{{ client.first_name }}</td>
        <td>{{ client.last_name }}</td>
        <td>{{ client.contact_no }}</td>
        <td>{{ client.email }}</td>
        <td>
          <ModalButton
            class="btn-sm btn-secondary"
            target="editClientModal"
            @click="clientId = client.id"
            >Edit</ModalButton
          >
          <button class="btn btn-sm btn-danger" @click="confirmDelete(client)">
            Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>
  <Modal id="createClientModal">
    <template #header>Create Client</template>
    <template #main>
      <ClientCreate @client-created="clientCreated" :interests="interests" />
    </template>
  </Modal>
  <Modal id="editClientModal">
    <template #header>Edit Client</template>
    <template #main>
      <ClientEdit
        @client-updated="clientUpdated"
        :interests="interests"
        :client-id="clientId"
      />
    </template>
  </Modal>
</template>
<script>
import { ref, onMounted } from "vue";
import { useClients } from "../functions/UseClients";
import { useInterests } from "../functions/UseInterests";
import ClientCreate from "./ClientCreate.vue";
import ClientEdit from "./ClientEdit.vue";
import Modal from "./Modal.vue";
import ModalButton from "./ModalButton.vue";

export default {
  components: {
    ClientCreate,
    ClientEdit,
    Modal,
    ModalButton,
  },
  emits: ["changeTitle"],
  setup(props, { emit }) {
    const { clients, getClients, deleteClient } = useClients();
    const { interests, getInterests } = useInterests();
    const clientId = ref(null);

    onMounted(async function () {
      emit("changeTitle", "Dashboard");
      await getClients();
      await getInterests();
    });

    function clientCreated(client) {
      clients.value.push(client);
      hideModal("#createClientModal");
    }

    function clientUpdated(client) {
      const i = clients.value.findIndex((x) => x.id === client.id);
      clients.value[i] = client;
      hideModal("#editClientModal");
    }

    function confirmDelete(client) {
      if (confirm("Are you sure you want to delete this client?")) {
        deleteClient(client.id);

        clients.value = clients.value.filter((x) => x.id !== client.id);
      }
    }

    function hideModal(elId) {
      bootstrap.Modal.getInstance(document.querySelector(elId)).hide();
    }

    return {
      clientId,
      clients,
      interests,
      clientCreated,
      clientUpdated,
      confirmDelete,
    };
  },
};
</script>
<style scoped>
button {
  margin: 0 0.3rem;
  min-width: 100px;
}
</style>
