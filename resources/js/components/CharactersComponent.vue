<script setup>
    defineProps({
        characters: {
            type: Array,
            default: []
        }
    });

</script>

<template>
    <div class="container">
        <h3>Characters Listing</h3>
        <ul v-if="characters.length">
            <li v-for="character in characters">
                <a :href="'characters/' + character.id + '/edit'" >{{character.name}}</a>
            </li>
        </ul>
        <a href="characters/create">Add a new character</a>
    </div>
</template>