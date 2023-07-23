<script setup>

    import { ref } from 'vue';

    import DeleteButton from "./Form/DeleteButton.vue";
    import Errors from "./Form/Errors.vue";
    import Jobs from "./Jobs.vue";

    const props = defineProps({
        //Form Values
        newMode: {
            type: String,
            default: ""
        },
        characterid: {
            type: String,
            default: ""
        },
        //Error state
        errors: {
            type: Array,
            default: []
        },
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const postAction = props.newMode === 'create' ? '/characters' : '/characters/' + props.characterid;

    //Refs for general server data in form
    const servers = ref([]);
    const jobs = ref([]);

    //Refs for specific for form input values
    const name = ref("");
    const serverid = ref("");
    const activeJobs = ref([]);

    //Load in form data, combine create/edit to single endpoint
    axios.get('/get-character-form-data/' + props.characterid + props.newMode).then(response => {

        console.log(response.data);

        if(response.data.hasOwnProperty("name"))
            name.value = response.data.name;

        if(response.data.hasOwnProperty("serverid"))
            serverid.value = response.data.serverid;

        if(response.data.hasOwnProperty("servers"))
            servers.value = response.data.servers;

        if(response.data.hasOwnProperty("jobs"))
            jobs.value = response.data.jobs;

        if(response.data.hasOwnProperty("activejobs"))
            activeJobs.value = response.data.activejobs;
    });

    function filterJobType(jobType){
        return jobs.value.filter(job => job.role === jobType);
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
            <div class="row">
                <h3>Jobs</h3>
                <Jobs class="col-lg-6 col-md-6" title="Tanks" boot-width="6" :job-list="filterJobType('Tank')" :active-jobs="activeJobs" />
                <Jobs class="col-lg-6 col-md-6" title="Healers" boot-width="6" :job-list="filterJobType('Healer')" :active-jobs="activeJobs" />
                <Jobs class="col-lg-12 col-md-12" title="DPS" boot-width="12" :job-list="filterJobType('DPS')" :active-jobs="activeJobs" />
            </div>     
            <!-- End of Jobs section -->

            <br>
            
            <button type="submit" class="btn btn-primary"> Save </button>

        </form>

        <br>

        <DeleteButton v-if="!newMode" :post-action="postAction" :csrf-token="csrfToken" />
        <Errors :errors="errors"/>
    </div>

</template>