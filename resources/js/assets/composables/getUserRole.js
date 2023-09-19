import { ref } from "vue";
const roles = ref([]);
export function getUserRole() {
  async function getRole() {
    try {
      const response = await axios.get(
        "http://gear-shopping.test/api/users/create"
      );
      roles.value = response.data;
    } catch (error) {
      console.log(error);
    }
  }
  getRole();
  return { roles };
}
