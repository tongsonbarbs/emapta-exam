import axios from 'axios'
import { reactive, ref } from 'vue'

export function useClients() {
    const errorMessage = ref('')
    const clients = ref([])
    const client = ref()
    const initialForm = {
        id: null,
        firstName: "",
        lastName: "",
        contact: "",
        email: "",
        interests: [],
    }
    const form = reactive({ ...initialForm })

    async function getClients() {
        const { data: response } = await axios.get('/api/clients')

        clients.value = response
    }

    async function getClient(id) {
        errorMessage.value = ""
        const { data: response } = await axios.get(`/api/clients/${id}`)

        form.id = response.id
        form.firstName = response.first_name
        form.lastName = response.last_name
        form.email = response.email
        form.contact = response.contact_no
        form.interests = response.interests.map(x => x.interest_id)
    }

    async function createClient() {
        try {
            const { data: response } = await axios.post('/api/clients', {
                first_name: form.firstName,
                last_name: form.lastName,
                email: form.email,
                contact_no: form.contact,
                interests: form.interests
            })

            client.value = response
            reset()
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
            client.value = null
        }
    }

    async function updateClient() {
        try {
            const { data: response } = await axios.put(`/api/clients/${form.id}`, {
                first_name: form.firstName,
                last_name: form.lastName,
                email: form.email,
                contact_no: form.contact,
                interests: form.interests
            })

            client.value = response
            reset()
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
            client.value = null
        }
    }

    async function deleteClient(id) {
        try {
            await axios.delete(`/api/clients/${id}`)
        }
        catch (ex) {
            errorMessage.value = ex.response.data.message;
        }
    }

    function reset() {
        Object.assign(form, initialForm);
        errorMessage.value = "";
    }

    return {
        errorMessage,
        clients,
        client,
        form,
        getClients,
        getClient,
        createClient,
        updateClient,
        deleteClient,
    }
}