<template>
    <div class="wrapper">
        <!-- Sidebar -->
        <!-- <TheSidebar /> -->
        <!-- Header + Content -->
        <div class="main-panel">
            <!-- Header -->
            <!-- <TheHeader /> -->
            <!-- Content -->
            <slot />
        </div>
    </div>
</template>
<script>
import TheHeader from '../components/TheHeader.vue';
import TheSidebar from '../components/TheSidebar.vue'
export default {
    components: { TheHeader, TheSidebar }
}
</script>