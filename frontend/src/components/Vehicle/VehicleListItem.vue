<template>
    <b-list-group-item>
        Name: {{ vehicle.name }} <br>
        Engine Displacement: {{ vehicle.engine_displacement }} <br>
        Price: {{ vehicle.price }} <br>
        Location: {{ vehicle.location }} <br>
    </b-list-group-item>
</template>

<script>
    export default {
        name: "VehicleListItem",
        components: {
          
        },
        props: ["vehicle"],
        created(){
           
        }
    }
</script>

<style scoped>

</style>