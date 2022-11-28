import { ref } from "vue"

export function useInterests() {
    const interests = ref([])

    async function getInterests() {
        const { data: response } = await axios.get('/api/interests')

        interests.value = response
    }

    return {
        interests,
        getInterests
    }
}