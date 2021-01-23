<template>
    <div>
    <p v-if="vehicles.length == 0">No vehicle/s registered.</p>
    <b-list-group v-else>
        <VehicleListItem :vehicle="vehicle" v-for="vehicle in vehicles" :key="vehicle.id"></VehicleListItem>
    </b-list-group>
    </div>
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