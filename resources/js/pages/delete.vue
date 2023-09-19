<template>
    <h1>
        Destroying...
    </h1>
</template>
<script>
import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'
import { API_URL } from '../constants'
export default {
    setup() {
        const route = useRoute()
        const router = useRouter()
        const userId = route.params.id
        const deleteUserData = async () => {
            try {
                const response = await axios.delete(API_URL + `/users/destroy/${userId}`)
                if (response) {
                    router.push({
                        name: 'index',
                        state: { success: "Xóa người dùng thành công" }
                    })
                }

            } catch (error) {
                console.log(error)
            }
        }
        deleteUserData()
        return {}
    }
}
</script>