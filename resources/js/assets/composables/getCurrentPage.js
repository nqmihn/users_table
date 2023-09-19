import { ref } from "vue";
import { useRoute } from "vue-router";

const currentPage = ref(1)
export function getCurrentPage(route) {
    if (route.query.page){
        currentPage.value = route.query.page
    }
    return {currentPage}
}
