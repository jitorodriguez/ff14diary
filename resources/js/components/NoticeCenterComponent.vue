<script setup>

    defineProps({
        title: {
            type: String,
            default: "Notice Center"
        },
        name: String,
        promptCharacter: Boolean
    });

</script>

<template>
    <!-- Notice Center Component -->
    <div class="card">
        <div class="card-header">{{title}}</div>    
        <div class="card-body" style="background: antiquewhite">
            Welcome {{name}}!
            <div v-if="promptCharacter">
                <p>No characters found, <a href="/characters/create">register a character</a>?</p>
            </div>
        </div>
    </div>
    <!-- End Notice Center Component -->
</template>