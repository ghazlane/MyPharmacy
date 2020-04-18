<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacies_list extends Model
{
    protected $table = 'pharmacies_liste';
    public $timestamps = true;

    public function veriferExistance($nom, $prenom)
    {
    	if (Pharmacies_list::where('nom', '=', Input::get('nom_prenom'))->count() > 0) {
      		return true; 
		}	    	
    }


}
