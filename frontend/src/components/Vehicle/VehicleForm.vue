<template>
    <div>
       <b-form @submit="onSubmit" @reset="onReset">
            <!-- Vehicle Name-->
            <b-form-group id="frmgrp_name" label="Name" label-for="name">
                <b-form-input id="name" type="text" v-model="form.name" placeholder="Enter Vehicle Name" required></b-form-input>
            </b-form-group>

            <!-- Engine Displacement -->
            <b-form-group id="frmgrp_engine_displacement" label="Engine Displacement" label-for="engine_displacement">
                <b-form-input id="engine_displacement" type="text" v-model="form.engine_displacement" placeholder="Enter Engine Displacement" required></b-form-input>
            </b-form-group>
           
            <!-- Price -->
            <b-form-group id="frmgrp_price" label="Price" label-for="price">
                <b-form-input id="price" type="text" v-model="form.price" placeholder="Enter Price" required></b-form-input>
            </b-form-group>

            <!-- Location -->
            <b-form-group id="frmgrp_location" label="Location" label-for="location">
                <b-form-input id="location" type="text" v-model="form.location" placeholder="Enter Location" required></b-form-input>
            </b-form-group>
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>

    </div>
</template>

<script>
    export default {
        name: "VehicleForm",
        components: {
            
        },
        props: [],
        data(){
            return {
                form: {
                    name: '',
                    engine_displacement: '',
                    price: '',
                    location: ''
                }
            }
        },
        methods: {
            onSubmit(event) {
                event.preventDefault()
                this.$emit('creatVehicle', this.form);
            },
            onReset(event) {
                event.preventDefault()
                
                // Reset our form values
                this.form.name = '';
                this.form.engine_displacement = '';
                this.form.price = '';
                this.form.location = '';
            }
        },
        created(){
           
        }
    }
</script>

<style scoped>

</style>