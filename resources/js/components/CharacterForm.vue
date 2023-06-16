<script setup>

    import DeleteButton from "./Form/DeleteButton.vue";
    import Errors from "./Form/Errors.vue";
    import Jobs from "./Jobs.vue";

    const props = defineProps({
        //Standard params
        servers: Array,
        jobs: {
            type: Array,
            default: []
        },
        //Form Values
        newMode: Boolean,
        name: String,
        characterid: String,
        serverid: String,
        activeJobs: {
            type: Array,
            default: []
        },
        //Error state
        errors: {
            type: Array,
            default: []
        },
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const postAction = props.newMode === 'create' ? '/characters' : '/characters/' + props.characterid;

    function filterJobType(jobType){
        return props.jobs.filter(job => job.role === jobType);
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