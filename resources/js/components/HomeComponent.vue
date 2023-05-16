<template>
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-8">

                 <!-- Notice Center Component -->
                <div class="card">
                    <div class="card-header">Notice Center </div>
                        
                    <div class="card-body" style="background: antiquewhite">
                        Welcome {{name}}!
                        <div v-if="!hasCharacter">
                            <p>No characters found, <a href="/characters/create">register a character</a>?</p>
                        </div>
                    </div>
                </div>
                <!-- End Notice Center Component -->

                <br>

                <!-- Entries List Component -->
                <div>
                    <div class="col-md-12" style="display: flex; justify-content: left; position:relative; margin-bottom: 10px">
                        <h3>Your Entries</h3>
                        <a v-if="hasCharacter" href="/entries/create" style="position:absolute; right: 0px;"><button class="btn btn-primary">Add</button></a>
                    </div>

                    <!-- Entry View Component -->
                    <div v-for="entry in entries" class="card">
                        <div class="card-header">{{entry.title}}</div>
                        <div class="card-body">
                            <!-- Add character name from entry -->
                            <p>
                                Start: {{entry.start}}
                                <!-- Add time length from entry -->
                            </p>
                            <p><pre>{{entry.body}}</pre></p>
                            <a style="float:right" :href="'entries/' + entry.id +'/edit'">Edit</a>
                        </div>
                    </div>
                    <!-- End Entry View Component -->

                    <p v-if="!entries.length && !hasCharacter">Create character before creating entries.</p>
                    <p v-if="!entries.length && hasCharacter">No entries found.</p>

                </div>
                <!-- End Entries List Component -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        name: String,
        hasCharacter: {
            type: Boolean,
            default: false
        },
        entries: Array
    }
}
</script>