<script setup>

    import EntryComponent from  './EntryComponent.vue';

    defineProps({
        entries: {
            type: Array,
            default: []
        },
        title: {
            type: String,
            default: "Your Entries"
        },
        canCreateEntries: Boolean
    });

</script>

<template>
    <div>
        <div class="col-md-12" style="display: flex; justify-content: left; position:relative; margin-bottom: 10px">
            <h3>{{title}}</h3>
            <router-link v-if="canCreateEntries" :to="'entries/create'" style="position:absolute; right: 0px; pointer-events:none;" ><button :disabled="canCreateEntries" class="btn btn-primary">Add</button></router-link>
        </div>

        
        <div v-for="entry in entries" class="card">
            <EntryComponent :id=entry.id :title=entry.title :start-date-time="entry.start" :body="entry.body" />
        </div>
        
        <p v-if="!entries.length && !canCreateEntries">Create character before creating entries.</p>
        <p v-if="!entries.length && canCreateEntries">No entries found.</p>
    </div>
</template>