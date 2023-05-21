<script setup>

    import {ref} from "vue";

    const props = defineProps({
        //Standard params
        servers: Array,
        tanks: Array,
        healers: Array,
        dpses: Array,
        //Form Values
        newMode: Boolean,
        name: String,
        characterid: String,
        serverid: String,
        jobs: {
            type: Array,
            default: []
        },
        //Error state
        errors: Array,
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const postAction = props.newMode ? '/characters' : '/characters/' + props.characterid;

    function hasJob(jobID){
        if(props.newMode)
            return false;

        return props.jobs.filter(job => job.id === jobID).length > 0;
    }

</script>

<template>
    <div class="container">
        <form method="post" :action="postAction">

            <input type="hidden" name="_token" :value="csrfToken">
            <input v-if="!newMode" type="hidden" name="_method" value="PUT">
        
            <!-- Character section -->
            <h3>Character Name</h3>
            <input type="text" name="name" :value="name" class="form-control" placeholder="Enter Characters Name">
            <!-- End of Character section -->

            <br>

            <!-- Server section -->
            <h3>Server</h3>
            <select name="serverid" id="serverid" class="form-control">
                    <option v-for="server in servers" :value=server.id :selected="serverid == server.id">{{server.region}} - {{server.datacenter}} - {{server.name}}</option>
            </select>
             <!-- End of Server section -->

            <br>

            <!-- Jobs section -->
            <h3>Jobs</h3>
            <div class="row">
                 <!-- Job section (Column) -->
                <div class="col-lg-6 col-md-6">
                    <h5>Tanks</h5>
                    <div v-for="tank in tanks" class='col-lg-12 col-md-12'>
                        <input type="checkbox" :id="tank.shortname" :name="tank.shortname" :checked="hasJob(tank.id)">
                        <label :for="tank.shortname">{{tank.name}}</label>
                    </div>
                </div>
                <!-- End of Job section (Column) -->

                 <!-- Job section (Column) -->
                <div class="col-lg-6 col-md-6">
                    <h5>Healers</h5>
                    <div v-for="healer in healers" class='col-lg-12 col-md-12'>
                        <input type="checkbox" :id="healer.shortname" :name="healer.shortname" :checked="hasJob(healer.id)">
                        <label :for="healer.shortname">{{healer.name}}</label>
                    </div>
                </div>
                <!-- End of Job section (Column) -->
            </div>
        
             <!-- Job section (Full) -->
            <div class="row" style="padding-top:10px">
                <div class="col-lg-12 col-md-12">
                    <h5>DPS</h5>
                        <div v-for="dps in dpses" style="float:left;">
                            <input type="checkbox" :id="dps.shortname" :name="dps.shortname" :checked="hasJob(dps.id)">
                            <label style="padding-left: 5px; padding-right: 20px;" :for="dps.shortname">{{dps.name}}</label>
                        </div>
                </div>
            </div>
            <!-- End of Job section (Full) -->            
            <!-- End of Jobs section -->

            <br>
             <!-- Submit section -->
            <button type="submit" class="btn btn-primary">
                Save
            </button>
            <!-- End of Submit section -->

        </form>

        <br>

        <form v-if="!newMode" method="post" :action="postAction">
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" name="Delete" value="Delete" class="btn btn-danger">
        </form>

        <!-- Error Section -->
        <ul v-if="errors.length" class="alert alert-dnager">
            <li v-for="error in errors">{{ error }}</li>
        </ul>
        <!-- End of Error Section -->
    </div>

</template>