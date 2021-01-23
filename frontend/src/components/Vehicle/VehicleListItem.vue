<template>
    <b-list-group-item>
        Name: {{ vehicle.name }} <br>
        Engine Displacement: <br>{{ `
            ${vehicle.engine_displacement_cubic_inches} L / 
            ${vehicle.engine_displacement_cubic_centimeters} cm3 / 
            ${vehicle.engine_displacement_cubic_inches} in3`  
        }} <br>
        Price: {{ vehicle.price }} <br>
        Engine Power: {{ vehicle.engine_power }} hp<br>
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