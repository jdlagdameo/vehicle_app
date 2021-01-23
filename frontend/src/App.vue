<template>
  <div>
    <NavbarComponent></NavbarComponent>
    <b-container class="mt-5">
      <h3>Vehicles</h3>
      <hr />
      <b-row>
        <b-col>
           <VehicleList :vehicles="vehicles"></VehicleList>
        </b-col>
        <b-col>
          <VehicleForm
            v-on:creatVehicle="createVehicleHandler($event)"></VehicleForm>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>


import VehicleList from './components/Vehicle/VehicleList';
import VehicleForm from './components/Vehicle/VehicleForm';
import NavbarComponent from './components/NavbarComponent';

import axios from 'axios'

export default {
  name: 'App',
  components: {
    VehicleList, VehicleForm, NavbarComponent
  },
  data(){
    return {
        isLoading: false, 
        vehicles: []
    }
  },
  methods: {
    createVehicleHandler(ev){
        var formData = new FormData();
        let {name, engine_displacement, price, location} = ev;

        formData.append('name', name);
        formData.append('engine_displacement', engine_displacement);
        formData.append('price', price);
        formData.append('location', location);

        let $this = this;
        axios.post(`http://localhost/vehicle_app/api/index.php?route=add`, formData)
        .then(function (res) {
          if(res.data.success){
            $this.vehicles = [...$this.vehicles, res.data.data];
          }
          }).catch(function (error) {
            console.log(error);
        });
    }
  },
        mounted(){
           axios
            .get('http://localhost/vehicle_app/api/index.php?route=list')
            .then(response => {
              this.vehicles = [...response.data];
            })
        }
}
</script>

<style scoped>

</style>
