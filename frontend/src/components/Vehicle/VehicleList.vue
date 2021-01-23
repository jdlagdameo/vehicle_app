<template>
    <b-list-group>
        <VehicleListItem 
            :vehicle="vehicle" 
            v-for="vehicle in vehicles" 
            :key="vehicle.id">
        </VehicleListItem>
    </b-list-group>
</template>

<script>
    import VehicleListItem from './VehicleListItem';

    export default {
        name: "VehicleList",
        components: {
            VehicleListItem
        },
        props: ["vehicles"],
        data(){
            return {
      
            }
        }
    }
</script>

<style scoped>

</style>