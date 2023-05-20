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
        <a style="float:right" :href="'entries/' + id +'/edit'">Edit</a>
    </div>
    
</template>