<script setup>

    defineProps({
        postAction: String
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

</script>

<template>
    <form method="post" :action="postAction">
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="Delete" value="Delete" class="btn btn-danger">
        </form>
</template>