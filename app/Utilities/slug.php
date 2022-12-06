<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


function getSlugForTable($text, $tableName){  
        if(Schema::hasTable($tableName)){

            $slug = Str::slug($text);

            //slug di partenza 
            $slug_base = $slug;

            $counter = 1;

            //cerca un post che abbia slug uguale a slug appena creato 
            $existingRestaurant = DB::table($tableName)->where('slug', $slug)->first();

            //fintanto che esiste un post con slug selezionato  
            while($existingRestaurant){
                // incrementiamo slug con counter 
                $slug = $slug_base . '_' . $counter;
                $existingRestaurant = DB::table($tableName)->where('slug', $slug)->first();
                $counter++;
            }

            return $slug;
        }
        else {
            throw new ErrorException('TABLE ' . $tableName . ' NOT FOUND');
        }
    }
?>