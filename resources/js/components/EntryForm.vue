<script setup>

    import DeleteButton from "./Form/DeleteButton.vue";
    import Errors from "./Form/Errors.vue";

    const props = defineProps({
        //Standard params
        characters: Array,
        //Form Values
        entryid: String,
        title: String,
        characterid: String,
        start: String,
        end: String,
        body: String,
        newMode: Boolean,
        //Error state
        errors: Array
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const postAction = props.newMode ? '/entries' : '/entries/' + props.entryid;

</script>


<template>
    <div class="container">
        <form method="post" :action="postAction">

            <input type="hidden" name="_token" :value="csrfToken">
            <input v-if="!newMode" type="hidden" name="_method" value="PUT">

            <!-- Title section -->
            <h3>Title</h3>
            <input type="text" id="title" name="title" :value="title" class="form-control" placeholder="Title of entry">
            <!-- End of Title section -->

            <br>
            
            <!-- Character section -->
            <h3>Character</h3>
            <select id="character_id" name="character_id" class="form-control">
                    <option v-for="character in characters" :value="character.id"  :selected="characterid == character.id" >{{character.name}}</option>
            </select>
            <!-- End of Character section -->

            <br>

            <!--Session Time section -->
            <h3>Session Time</h3>
            <div class="col-lg-6 col-md-6" style="float:left">
                <label for="start">Start</label>
                <input id="start" name="start" :value="start" type="datetime-local">
            </div>
            <div class="col-lg-6 col-md-6" style="float:left">
                <label for="end">End</label>
                <input id="end" name="end" :value="end" type="datetime-local">       
            </div>
            <!--  End of Session Time -->

            <br><br>

            <!--Entry Body section -->
            <h3>Body</h3>
            <textarea name="body" id="body" class="form-control" placeholder="Describe your play session" cols="30" rows="10">{{ body }}</textarea>
            <!-- End of Entry Body section -->

            <br>

            <!-- Upload / Save Buttons Section -->
            <button disabled="disabled" class="btn btn-secondary">Import ACT logs (Unavailable)</button>
            <button type="submit" class="btn btn-primary" style="float:right">
                Save
            </button>
            <!-- End of Upload / Save Buttons Section -->

        </form>

        <br>

        <!-- Error Section -->
        <DeleteButton v-if="!newMode" :post-action="postAction" :csrf-token="csrfToken" />
        <Errors :errors="errors"/>
        <!-- End of Error Section -->

    </div>
</template>