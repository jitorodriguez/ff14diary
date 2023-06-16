<script setup>

    import { ref } from 'vue';
    
    const characters = ref ([]);

    axios.defaults.headers.common = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }

    axios.get('/get-character-data').then(response => {
        characters.value = response.data.characters;
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
        <router-link to="/characters/create"> Add a new character</router-link>
    </div>
</template>