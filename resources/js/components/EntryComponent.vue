<script setup>

    defineProps({
        id: String,
        title: String,
        startDateTime: String,
        body: String
    });

</script>

<template>

    <div class="card-header">{{title}}</div>
    <div class="card-body">
        <!-- Add character name from entry -->
        <p>
            Start: {{startDateTime}}
            <!-- Add time length from entry -->
        </p>
        <p><pre>{{body}}</pre></p>
        <router-link :to="'entries/' + id +'/edit'" style="float:right; pointer-events: none; color: darkgrey;" >Edit</router-link>
    </div>
    
</template>