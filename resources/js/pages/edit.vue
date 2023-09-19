<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Update Account</h4>
                        <form method="#" action="#" @submit.prevent="onSubmit">
                            <div class="form-group label-floating is-empty">
                                <label for="email">Email address</label>
                                <div class="text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
                                <input type="email" class="form-control" :class="{
                                    'select-danger': errors.email
                                }" v-model="userData.email">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" disabled :placeholder="username">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="name">Name</label>
                                <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
                                <input type="text" class="form-control" :class="{
                                    'select-danger': errors.name
                                }" v-model="userData.name">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="phone_number">Phone Number</label>
                                <div class="text-danger" v-if="errors.phone_number">{{ errors.phone_number[0] }}</div>
                                <input type="text" class="form-control" :class="{
                                    'select-danger': errors.phone_number
                                }" v-model="userData.phone_number">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group">
                                <label for="role">Choose Role</label>
                                <select name="" id="" class="form-control" v-model="userData.user_role_id">
                                    <option v-for="(role) in roles" :key="role.id" :value="role.id">
                                        {{ role.name }}
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Change</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { reactive, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router';
import { getUserRole } from '../assets/composables/getUserRole';
import { API_URL } from '../constants';
export default {
    setup() {
        const route = useRoute()
        const userId = ref(route.params.id)
        const router = useRouter()
        const username = ref('')
        const { roles } = getUserRole()

        const userData = reactive({
            username: "",
            email: "",
            phone_number: "",
            name: "",
            user_role_id: null,
        })
        const errors = ref({})
        const getUserData = async () => {
            try {
                const response = await axios.get(API_URL + `/users/edit/${userId.value}`)
                if (response) {
                    userData['username'] = response.data.name
                    userData['email'] = response.data.email
                    userData['phone_number'] = response.data.phone_number
                    userData['name'] = response.data.name
                    userData['user_role_id'] = response.data.user_role_id
                    username.value = response.data.username
                }

            } catch (error) {
                console.log(error)
            }
        }
        const onSubmit = async () => {

            try {
                const updateRespose = await axios.put(API_URL + `/users/${userId.value}`, userData)
                if (updateRespose) {
                    router.push({
                        name: 'index',
                        state: { success: "Sửa thông tin thành công" }
                    })
                }

            } catch (error) {
                console.log(error)
                errors.value = error.response.data.errors
            }
        }
        getUserData()

        return { onSubmit, userData, errors, userData, username, roles }


    }
}
</script>

<style scoped>
.select-danger {
    border: 1px solid red;
}
</style>