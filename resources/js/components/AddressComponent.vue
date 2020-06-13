<template>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Paises</label>
                <input
                    type="hidden"
                    :name="nameded+'country'"
                    v-model="address.country_id"
                />
                <v-select
                    class="style-chooser"
                    v-model="selectedCountry"
                    label="name"
                    :options="countries"
                    placeholder="Seleccionar"
                ></v-select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Provincias</label>

                <input
                    type="hidden"
                   :name="nameded+'province'"
                    v-model="address.province_id"
                />
                <v-select
                    class="style-chooser"
                    v-model="selectedProvince"
                    label="name"
                    :options="provinces"
                    placeholder="Seleccionar"
                ></v-select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Departamento</label>
                <input type="hidden" :name="nameded+'city'" v-model="address.city_id" />
                <v-select
                    class="style-chooser"
                    v-model="selectedCity"
                    label="name"
                    :options="cities"
                    placeholder="Seleccionar"
                ></v-select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label">Localidades</label>
                <input type="hidden" :name="nameded+'town'" v-model="address.town_id" />

                <v-select
                    class="style-chooser"
                    v-model="selectedTown"
                    label="name"
                    :options="towns"
                    placeholder="Seleccionar"
                ></v-select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="control-label">Domicilio</label>
                <div class="input-group">
                    <span class="input-group-addon"
                        ><i class="fa fa-home"></i></span
                    ><input
                        placeholder="Domicilio"
                        id="address"
                        name="address"
                        type="text"
                        class="form-control"
                        v-model="address.address"
                    />
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="control-label">Dpto</label>
                <div class="input-group">
                    <span class="input-group-addon"
                        ><i class="fa fa-home"></i></span
                    ><input
                        placeholder="Dpto"
                        id="dpto"
                        name="dpto"
                        type="text"
                        class="form-control"
                        v-model="address.dpto"
                    />
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="control-label">Piso</label>
                <div class="input-group">
                    <span class="input-group-addon"
                        ><i class="fa fa-home"></i></span
                    ><input
                        placeholder="Piso"
                        id="floor"
                        name="floor"
                        type="text"
                        class="form-control"
                        v-model="address.floor"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.style-chooser {
    display: block;
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
            selectedProvince: "",
            selectedCity: "",
            selectedTown: "",
            address: {
                address: "",
                dpto: "",
                floor: "",
                country_id:"",
                province_id:"",
                city_id:"",
                town_id:""
            }
        };
    },
    watch: {
        selectedCountry: function() {
            this.provinces = [];
            if (this.selectedCountry.id > 0) {
                this.address.country_id = this.selectedCountry.id;
                this.getProvinces(this.selectedCountry.id);
            }
        },
        selectedProvince: function() {
            this.cities = [];
            if (this.selectedProvince.id > 0) {
                this.address.province_id = this.selectedProvince.id;
                this.getCities(this.selectedProvince.id);
            }
        },
        selectedCity: function() {
            this.towns = [];
            if (this.selectedCity.id > 0) {
                this.address.city_id = this.selectedCity.id;
                this.getTowns(this.selectedCity.id);
            }
        },
        selectedTown: function() {
            if (this.selectedTown.id > 0) {
                this.address.town_id = this.selectedTown.id;
            }
        }
    },
    methods: {
        getCountries: function() {
            axios.get(route("countries")).then(res => {
                this.countries = res.data;
                console.log(this.countries);
            });
        },
        getProvinces: function(id) {
            axios.get(route("provinces", id)).then(res => {
                this.provinces = res.data;
            });
        },
        getCities: function(id) {
            axios.get(route("cities", id)).then(res => {
                this.cities = res.data;
            });
        },
        getTowns: function(id) {
            axios.get(route("towns", id)).then(res => {
                this.towns = res.data;
            });
        },

        getCountry: function(id) {
            axios.get(route("country", id)).then(res => {
                this.selectedCountry= res.data;
            });
        },

        getProvince: function(id) {
            axios.get(route("province", id)).then(res => {
                this.selectedProvince = res.data;
            });
        },
        getCity: function(id) {
            axios.get(route("city", id)).then(res => {
                this.selectedCity = res.data;
            });
        },
        getTown: function(id) {
            axios.get(route("town", id)).then(res => {
                this.selectedTown= res.data;
            });
        }
    },
    props: ["addressj","named"],
    computed: {
        // a computed getter
        nameded: function () {
        // `this` points to the vm instance
            console.log(this.named);
            return this.named;
        }
      },
    mounted() {
        this.getCountries();
        if (this.addressj !== undefined) {
            this.address = Object.assign(this.addressj, this.addres);
            if (this.address.country_id > 0) {
                this.getCountry(this.address.country_id);
                if (this.address.province_id > 0) {
                    this.getProvince(this.address.province_id);
                    if (this.address.city_id > 0) {
                        this.getCity(this.address.city_id);
                        if (this.address.town_id > 0) {
                            this.getTown(this.address.town_id);
                        }
                    }
                }
            }
        }
    }
};
</script>
