<script setup>

defineProps({
        errors: Array
    })

</script>

<template>
    <ul v-if="errors.length" class="alert alert-dnager">
        <li v-for="error in errors">{{ error }}</li>
    </ul>
</template>