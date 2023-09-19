<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Create Account</h4>
                        <form method="#" action="#" @submit.prevent="onSubmit">
                            <div class="form-group label-floating is-empty">
                                <label for="email">Email address</label>
                                <div class="text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
                                <input type="email" class="form-control" v-model="users.email" :class="{
                                    'select-danger': errors.email
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="username">Username</label>
                                <div class="text-danger" v-if="errors.username">{{ errors.username[0] }}</div>
                                <input type="text" class="form-control" v-model="users.username" :class="{
                                    'select-danger': errors.username
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="password">Password</label>
                                <div class="text-danger" v-if="errors.password">{{ errors.password[0] }}</div>
                                <input type="password" class="form-control" v-model="users.password" :class="{
                                    'select-danger': errors.password
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="password_confirmation">Password Confirm</label>
                                <div class="text-danger" v-if="errors.password_confirmation">{{
                                    errors.password_confirmation[0] }}</div>
                                <input type="password" class="form-control" v-model="users.password_confirmation" :class="{
                                    'select-danger': errors.password_confirmation
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="name">Name</label>
                                <div class="text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
                                <input type="text" class="form-control" v-model="users.name" :class="{
                                    'select-danger': errors.name
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <label for="phone_number">Phone Number</label>
                                <div class="text-danger" v-if="errors.phone_number">{{ errors.phone_number[0] }}</div>
                                <input type="text" class="form-control" v-model="users.phone_number" :class="{
                                    'select-danger': errors.phone_number
                                }">
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group">
                                <label for="role">Choose Role</label>
                                <select name="" id="" class="form-control" v-model="users.user_role_id">
                                    <option v-for="(role) in roles" :key="role.id" :value="role.id">
                                        {{ role.name }}
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
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
import { useRouter } from 'vue-router';
import { getUserRole } from '../assets/composables/getUserRole';
import { API_URL } from '../constants';
export default {
    setup() {
        const router = useRouter()
        const { roles } = getUserRole()
        const users = reactive({
            username: "",
            password: "",
            password_confirmation: "",
            email: "",
            phone_number: "",
            name: "",
            user_role_id: 1,
        })
        const errors = ref({})
        const onSubmit = async () => {
            //
            try {
                const createUserResponse = await axios.post(API_URL + '/users/create', users)
                if (createUserResponse) {
                    router.push({
                        name: 'index',
                        state: { success: "Thêm thành công" }
                    })
                }

            } catch (error) {
                console.log(error)
                errors.value = error.response.data.errors
            }
        }

        return { roles, onSubmit, users, errors }


    }
}
</script>

<style scoped>
.select-danger {
    border: 1px solid red;
}
</style>