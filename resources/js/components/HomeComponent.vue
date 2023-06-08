<script setup>
    import { ref } from 'vue';

    import NoticeCenterComponent from "./NoticeCenterComponent.vue";
    import EntriesComponent from "./EntriesComponent.vue";

    const name = ref("");
    const hasCharacter = ref(null);
    const entries = ref([]);

    axios.defaults.headers.common = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }

    axios.get('/get-home-data').then(response => {
        console.log(response.data);
        name.value = response.data.name;
        hasCharacter.value = response.data.hasCharacter;
        entries.value = response.data.entries;
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