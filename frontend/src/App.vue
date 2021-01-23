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
            :form="form"
            :validationErrors="validationErrors"
            v-on:creatVehicle="createVehicleHandler($event)"
            v-on:resetForm="resetFormHandler($event)"></VehicleForm>
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
        vehicles: [],
        validationErrors: {},
         form: {
           name: '',
           engine_displacement: '',
           engine_power: '',
           price: '',
           location: '',
           unit_measure: null
        }
    }
  },
  methods: {
    // Submit Form
    createVehicleHandler(ev){
        var formData = new FormData();

        // setup form data
        let {name, engine_displacement, engine_power, price, location, unit_measure} = ev;
        formData.append('name', name);
        formData.append('engine_displacement', engine_displacement);
        formData.append('engine_power', engine_power);
        formData.append('price', price);
        formData.append('location', location);
        formData.append('unit_measure', unit_measure);

        let $this = this;
        axios.post(`http://localhost/vehicle_app/api/index.php?route=add`, formData)
        .then(function (res) {
          if(res.data.success){
            $this.vehicles = [...$this.vehicles, res.data.data];
            $this.validationErrors = {};
            $this.resetFormHandler();
          }else{
            $this.validationErrors = {...res.data.validation_errors};
            console.log($this.validationErrors);
          }
          }).catch(function (error) {
            console.log(error);
        });
    },

    // Reset Form
    resetFormHandler(){
      // Reset our form values
      this.form.name = '';
      this.form.engine_displacement = '';
      this.form.engine_power = '';
      this.form.unit_measure = null;
      this.form.price = '';
      this.form.location = '';
    }
  },
  mounted(){
    axios.get('http://localhost/vehicle_app/api/index.php?route=list')
    .then(response => { this.vehicles = [...response.data]; })
  }
}

</script>

<style scoped>

</style>
