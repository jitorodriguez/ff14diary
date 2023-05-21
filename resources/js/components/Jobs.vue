<script setup>

    const props = defineProps({
        title: String,
        jobList: Array,
        activeJobs: Array,
        //Replace w/ tailwind
        bootWidth: String,
    });

    function hasJob(jobID){
        return props.activeJobs.filter(job => job.id === jobID).length > 0;
    }

</script>

<template>
    <div style="padding: 10px">
        <h5>{{title}}</h5>
        <div v-for="job in jobList" class="card" style="float:left; flex-direction: inherit; padding: 0px 10px;">
            <input type="checkbox" :id="job.shortname" :name="job.shortname" :checked="hasJob(job.id)">
            <label style="padding-left: 5px;" :for="job.shortname">{{job.name}}</label>
        </div>
    </div>
</template>