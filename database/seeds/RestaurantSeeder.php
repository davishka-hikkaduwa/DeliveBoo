<?php

use Illuminate\Database\Seeder;
use App\Restaurant;
use Illuminate\Support\Str;

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
        for($i = 1; $i<=10; $i++){
            $restaurant = new Restaurant();
            $restaurant->name = 'Pizzeria n.' . $i;
            $restaurant->p_iva = '000000000' . $i;
            $restaurant->address = 'Via dei Mille n.' . $i;

            $slug = Str::slug($restaurant->name);

            //slug di partenza 
            $slug_base = $slug;

            $counter = 1;

            //cerca un post che abbia slug uguale a slug appena creato 
            $existingRestaurant = Restaurant::where('slug', $slug)->first();

            //fintanto che esiste un post con slug selezionato  
            while($existingRestaurant){
                // incrementiamo slug con counter 
                $slug = $slug_base . '_' . $counter;
                $existingRestaurant = Restaurant::where('slug', $slug)->first();
                $counter++;
            }

            $restaurant->slug = $slug;

            $restaurant->save();
        }
    }
}
