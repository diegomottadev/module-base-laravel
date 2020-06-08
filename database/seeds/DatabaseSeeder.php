<?php

use App\City;
use App\Country;
use App\Province;
use App\Town;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);

        factory(\App\Person::class, 20)->create();

        $country = factory(Country::class, 1)->create()->each(function ($country) {
            factory(Province::class, 10)->create(['country_id' => $country->id])->each(function ($prov) {
                factory(City::class, 10)->create(['province_id' => $prov->id])->each(function ($city) {
                    $city->towns()->saveMany(factory(Town::class, 10)->create(['city_id' => $city->id]));
                });
            });
        });
    }
}
