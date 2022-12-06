<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
require 'App/Utilities/slug.php';



class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i<=10; $i++){
            $restaurant = new Restaurant();
            $restaurant->name = 'Pizzeria n.' . $i;
            $restaurant->p_iva = '000000000' . $i;
            $restaurant->address = 'Via dei Mille n.' . $i;
            $restaurant->slug = getSlugForTable($restaurant->name, 'restaurants');
            $restaurant->save();
        }
    }
}
