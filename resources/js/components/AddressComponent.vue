<template>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Paises</label>
                    <input type="hidden" name="country" v-model="selectedCountry.id">
                    <v-select class="style-chooser"  v-model="selectedCountry"  label="name" :options="countries" placeholder="Seleccionar"></v-select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Provincias</label>
         
                    <input type="hidden" name="province" v-model="selectedProvince.id">
                    <v-select class="style-chooser" v-model="selectedProvince"  label="name" :options="provinces" placeholder="Seleccionar"></v-select>

               
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Departamento</label>
                    <input type="hidden" name="city" v-model="selectedCity.id">
                    <v-select class="style-chooser" v-model="selectedCity"  label="name" :options="cities" placeholder="Seleccionar"></v-select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Localidades</label>
                    <input type="hidden" name="town" v-model="selectedTown.id">
                    <v-select class="style-chooser" v-model="selectedTown"  label="name" :options="towns" placeholder="Seleccionar"></v-select>
                </div>
            </div>
        </div>
    </div>

</template>
<style>
  .style-chooser{ display: block;
  width: 100%;

  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
</style>
<script>
    export default {

        data() {
            return {
                countries: [],
                provinces: [],
                cities: [],
                towns: [],
                selectedCountry: "",
                selectedProvince:"",
                selectedCity:"",
                selectedTown:""
            }
        },
        watch: {
            selectedCountry: function () {
                this.provinces = [];
                if (this.selectedCountry.id > 0) {
                    this.getProvinces(this.selectedCountry.id);
                }
            },
            selectedProvince: function () {
                this.cities = [];
                if (this.selectedProvince.id > 0) {
                    this.getCities(this.selectedProvince.id);
                }
            },
            selectedCity: function () {
                this.towns = [];
                if (this.selectedCity.id > 0) {
                    this.getTowns(this.selectedCity.id);
                }
            }

        },
        methods: {
            getCountries: function () {
                axios.get('/mercadomadera/public/countries')
                    .then(res => {
                        this.countries = res.data;
                    });
            },
            getProvinces: function (id) {
                axios.get('/mercadomadera/public/country/' + id + '/provinces')
                    .then(res => {
                        this.provinces=  res.data;
                    });
            },
            getCities: function (id) {
                 axios.get('/mercadomadera/public/province/' + id + '/cities')
                    .then(res => {
                        this.cities=  res.data;

                    });
            },
            getTowns: function (id) {
                axios.get('/mercadomadera/public/city/' + id + '/towns')
                    .then(res => {
                        this.towns=  res.data;

                    });
            },

            getProvince: function (id) {
                axios.get('/mercadomadera/public/province/' + id)
                    .then(res => {
                        this.selectedProvince=  res.data;

                    });
            },
            getCity: function (id) {
                axios.get('/mercadomadera/public/city/' + id)
                    .then(res => {
                        this.selectedCity=  res.data;

                    });
            },
            getTown: function (id) {
                axios.get('/mercadomadera/public/town/' + id)
                    .then(res => {
                        this.selectedTown=  res.data;

                    });
            },
        },
        props: [
            'country_id',
            'province_id',
            'city_id',
            'town_id'
        ],
        mounted() {
            if(this.country_id > 0 ){
                this.getCountries();
                this.getCountry(this.country_id);
                if(this.province_id >0){
                    this.getProvinces(this.country_id);
                    this.getProvince(this.province_id);
                    if(this.city_id > 0){
                        this.getCities(this.province_id);
                        this.getCity(this.city_id);
                        if(this.town_id > 0){
                            this.getCities(this.city_id);
                            this.getCity(this.town_id);
                        }
                    }
                }
            }else{
                this.getCountries();
            }
        }

    }


</script>
