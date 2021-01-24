<template>
    <b-card>
       <b-form @submit="onSubmit" @reset="onReset" autocomplete="off">

            <!-- Vehicle Name-->
            <b-form-group id="frmgrp_name" label="Name" label-for="name">
                <b-form-input 
                    id="name" type="text" 
                    v-model="form.name" 
                    placeholder="Enter Vehicle Name" 
                    v-bind:class="{ 'is-invalid': validationErrors.name ? true : false }" 
                    maxlength="120" 
                    required></b-form-input>
                <!-- display name field errors -->
                <div class="text-danger" v-if="validationErrors.name">{{validationErrors.name}}</div>
            </b-form-group>

            <!-- Engine Displacement -->
            <b-form-group id="frmgrp_engine_displacement" label="Engine Displacement" label-for="engine_displacement">
                <b-row>
                    <b-col>
                        <b-form-input 
                            id="engine_displacement" 
                            type="number" 
                            v-model="form.engine_displacement"
                            placeholder="Enter Engine Displacement"
                            v-bind:class="{ 'is-invalid': validationErrors.engine_displacement ? true : false }"
                            maxlength="10"
                            required></b-form-input>
                    </b-col>
                    <b-col>
                        <b-form-select id="input-3" v-model="form.unit_measure" :options="unit_measure" required></b-form-select>
                    </b-col>
                </b-row>
                <!-- display engine displacement field errors -->
                <div class="text-danger" v-if="validationErrors.engine_displacement">{{validationErrors.engine_displacement}}</div>
                <div class="text-danger" v-if="validationErrors.unit_measure">{{validationErrors.unit_measure}}</div>
            </b-form-group>
            
            <!-- Engine Power -->
            <b-form-group id="frmgrp_engine_power" label="Engine Power" label-for="engine_power">
                <b-form-input 
                    id="engine_power" 
                    type="number" 
                    v-model="form.engine_power" 
                    placeholder="Enter Engine Power"
                    v-bind:class="{ 'is-invalid': validationErrors.engine_power ? true : false }"
                    maxlength="10"
                    required></b-form-input>
                <!-- display engine power field errors -->
                <div class="text-danger" v-if="validationErrors.engine_power">{{validationErrors.engine_power}}</div>
            </b-form-group>

            <!-- Price -->
            <b-form-group id="frmgrp_price" label="Price" label-for="price">
                <b-form-input 
                    id="price" 
                    type="number" 
                    v-model="form.price" 
                    placeholder="Enter Price"
                    v-bind:class="{ 'is-invalid': validationErrors.price ? true : false }"
                    maxlength="15"
                    required></b-form-input>
                 <!-- display price field errors -->
                <div class="text-danger" v-if="validationErrors.price">{{validationErrors.price}}</div>
            </b-form-group>

            <!-- Location -->
            <b-form-group id="frmgrp_location" label="Location" label-for="location">
                <b-form-input 
                    id="location" 
                    type="text" 
                    v-model="form.location" 
                    placeholder="Enter Location"
                    v-bind:class="{ 'is-invalid': validationErrors.location ? true : false }"
                    maxlength="100"
                    required></b-form-input>
                <!-- display location field errors -->
                <div class="text-danger" v-if="validationErrors.location">{{validationErrors.location}}</div>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>

    </b-card>
</template>

<script>
    export default {
        name: "VehicleForm",
        components: {
            
        },
        props: ["validationErrors","form"],
        data(){
            return {
                unit_measure: [
                    { text: 'Select Unit Measure', value: null }, 
                    { text: 'L (Liters)', value: 'l'}, 
                    { text: 'CC / cm3 (Cubic Centimetres)', value: 'cm3'}, 
                    { text: 'in3 (Cubic Inches)', value: 'in3'}
                ],
            }
        },
        methods: {
            // event emiters for submit
            onSubmit(event) {
                event.preventDefault()
                this.$emit('creatVehicle', this.form);
            },
            // event emiters for reset form
            onReset(event) {
                event.preventDefault()
                this.$emit('resetForm');
            }
        }
    }
</script>

<style scoped>

</style>