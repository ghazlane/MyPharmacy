<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DemandeMedicaments extends Model
{
    protected $table = 'demandes_medicaments';
    public $timestamps = true;

    public function getMaxDate($id_pharmacie){
    	return DemandeMedicaments::select('heure_retour')->where('id_pharmacie', $id_pharmacie)->orderBy('heure_retour', 'desc')->first();
    }

    public function getMaxId(){
    	$resultat = DB::table('demandes_medicaments')->select(DB::raw('max(LAST_INSERT_ID(id_demande)) as id'))->get();
        
        foreach ($resultat as $ligne) {
             $id = new DemandeMedicaments();
             $id->id_demande = $ligne->id;
             return intval($id->id_demande); 
         }
    }

    public function getListDemandeByIdPharmacie($id){
    	//App\Flight::where('active', 1)
    	$dateAujourdhui = '%'.date('Y-m-d', time()).'%' ; 
    	//echo "<br><br><br>".$dateAujourdhui;
    	   $resultat = DemandeMedicaments::where('id_pharmacie', $id)->where('heure_retour', 'like',$dateAujourdhui)->orderBy('heure_retour', 'desc')->get();
    	   //'heure_retour', 'like', '%' .date('Y-m-d', time()). '%'
    	   if($resultat == null) return new DemandeMedicaments(); 
    	   return $resultat ; 
    }

    public function deleteDemande($id){
    	DemandeMedicaments::where('id_demande', $id)->delete(); 

    }
    public function validateDemande($id){
    	DemandeMedicaments::where('id_demande', $id)->update(['etat_demande'=>'Prête']); 
    }
}
