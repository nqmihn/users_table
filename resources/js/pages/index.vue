<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="alert alert-success" role="alert" v-if="message">
                            {{ message }}
                        </div>
                        <div class="card-header">
                            <form action="" class="form-horizontal" @submit.prevent="onFilter">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <div class="col-3">
                                        <select name="" id="" class="form-control" v-model="filterRole">
                                            <option value="0">All</option>
                                            <option v-for="(role, index) in roles" :key="index" :value="role.id">{{
                                                role.name }}</option>

                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>
                        <div class="card-content">
                            <router-link :to="{ name: 'create', params: {} }">
                                <button class="btn btn-outline-primary">
                                    Add
                                </button>
                            </router-link>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Edit/Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user) in users">
                                            <td>{{ user.id }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.email }}</td>
                                            <td class="text-primary">{{ user.role }}</td>
                                            <td>

                                                <router-link v-if="user.id" :to="{ name: 'edit', params: { id: user.id } }">
                                                    <button class="btn btn-success m-2">Edit</button>
                                                </router-link>
                                                <router-link v-if="user.id"
                                                    :to="{ name: 'delete', params: { id: user.id } }">
                                                    <button class="btn btn-danger">Delete</button>
                                                </router-link>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <!-- <h1 v-else>Loading...</h1> -->
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" @click="goPreviousPage" href="javascript:void(0)">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item" v-for="(link, index) in links" :class="{ 'active': link.active }">
                                <a class="page-link" v-if="index > 0 && index < links.length - 1" href="javascript:void(0)"
                                    @click="goPage(link.url)">{{ link.label }}</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" @click="goNextPage">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { API_URL } from '../constants';
export default {
    setup() {
        const message = ref(null)
        const currentPage = ref(1)
        const users = ref([]);
        const totalPage = ref(0)
        const links = ref([])
        const roles = ref([])
        const filterRole = ref(0)
        const fetchUserData = async (url) => {
            try {
                const response = await axios.get(url)
                users.value = response.data.data
                totalPage.value = response.data.last_page
                links.value = response.data.links
                currentPage.value = response.data.current_page
                roles.value = response.data.data.userRoles
            } catch (error) {
                console.log(error)
            }
        }
        fetchUserData(API_URL + `/users?page=${currentPage.value}`)
        const goPage = async (url) => {

            fetchUserData(url + `&role=${filterRole.value}`)
        }
        const goPreviousPage = async () => {
            if (currentPage.value > 1) {
                fetchUserData(API_URL + `/users?page=${currentPage.value - 1}&role=${filterRole.value}`)
            }

        }
        const goNextPage = async () => {
            if (currentPage.value < totalPage.value) {
                fetchUserData(API_URL + `/users?page=${currentPage.value + 1}&role=${filterRole.value}`)
            }

        }
        const onFilter = async () => {
            fetchUserData(API_URL + `/users?page=1&role=${filterRole.value}`)
        }


        if (history.state.success) {
            message.value = history.state.success
            history.state.success = null
        }


        return { users, currentPage, goPage, totalPage, links, goNextPage, goPreviousPage, onFilter, roles, filterRole, message }


    }
}
</script>

