<script setup>
    import { ref } from 'vue';

    import NoticeCenterComponent from "./NoticeCenterComponent.vue";
    import EntriesComponent from "./EntriesComponent.vue";

    const loaded = ref(false);

    const name = ref("");
    const hasCharacter = ref(null);
    const entries = ref([]);

    axios.defaults.headers.common = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }

    axios.get('/get-home-data').then(response => {
        name.value = response.data.name;
        hasCharacter.value = response.data.hasCharacters;
        entries.value = response.data.entries;

        loaded.value = true;
    });

</script>

<template>
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-8">

                <!-- Loading Indicator -->
                <div v-if="!loaded">Loading...</div>
                
                <div v-else>
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
    </div>
</template>