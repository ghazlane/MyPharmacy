<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pharmacie extends Model
{
    protected $table = 'users';
    public $timestamps = true;

    public function getListVille()
    {
    	return User::select('ville')->groupBy('ville')->get(); 
    	    	
    }

    public function getListPharmacie(){
    	// $resultat =User::select('adresse', 'id', 'ville')->get(); 
    	/*$listeAdresseByVille = new array(); 
    	foreach ($this->getListVille() as $ville) {
    		array_push($listeAdresseByVille,$ville=>User::select('adresse', 'id')->whereVille($ville)->get();)
    	}
    	echo "<br><br><br><br>".$listeAdresseByVille;*/
    	return User::select('ville','id','adresse')->get();
    }
}
