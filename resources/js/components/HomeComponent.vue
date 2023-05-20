<script setup>

    import NoticeCenterComponent from "./NoticeCenterComponent.vue";
    import EntriesComponent from "./EntriesComponent.vue";

    defineProps({
        name: String,
        hasCharacter: {
            type: Boolean,
            default: false
        },
        entries: Array
    });

</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-8">

                 <!-- Notice Center Component -->
                <NoticeCenterComponent :name=name :prompt-character=!hasCharacter />
                <!-- End Notice Center Component -->

                <br>

                <!-- Entries List Component -->
                <EntriesComponent :entries="entries" :can-create-entries=hasCharacter />
                <!-- End Entries List Component -->
            </div>
        </div>
    </div>
</template>