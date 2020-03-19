<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemandeMedicaments; 
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public $demandeMedicaments ; 
    public $temp_traitementdemande = 6 ; //en minute
    public $temp_trajet = 6 ; 
    public $offset=60*60;

    public $heure_depart_matin = '09:00:00'; 
    public $heure_fin_matin = '13:00:00';
    public $heure_depart_soir = '16:00:00';
    public $heure_fin_soir = '19:30:00';   
     public function __construct(DemandeMedicaments $demandeMedicaments)
    {
        $this->demandeMedicaments = $demandeMedicaments;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
    public function store(Request $request)
    {
        $demandeMedicaments = new DemandeMedicaments();
        $demandeMedicaments->date_demande = date('Y-m-d H:i:s', time()+$this->offset);
        $demandeMedicaments->id_pharmacie = $request->id_pharmacie;
        if(isset($request->ordonnance)){
            $ordonnance =  $request->file('ordonnance'); 
            $path = base_path() . '/public/file/ordonnance/';
            $file_name = "ordonnance".str_random(70).'.'.$ordonnance->getClientOriginalExtension();
            $ordonnance->move($path, $file_name);
            $demandeMedicaments->ordonnance = $file_name;
        }

        if(isset($request->cin)){
            $cin =  $request->file('cin'); 
            $path = base_path() . '/public/file/cin/';
            $file_name = "cin".str_random(70).'.'.$cin->getClientOriginalExtension();
            $cin->move($path, $file_name);
            $demandeMedicaments->cin = $file_name;
        }
        $demandeMedicaments->etat_demande = 'En cours'; 
        $date_maximale = $this->demandeMedicaments->getMaxDate($request->id_pharmacie); 
        //string to date
        $lastDateInTable = date('Y-m-d H:i:s',strtotime($date_maximale->heure_retour));


if($lastDateInTable > date('Y-m-d H:i:s', time()+$this->offset)){
    $date_retour_finale = date('Y-m-d H:i:s', strtotime($lastDateInTable) + ($this->temp_traitementdemande * 60)); 
}else{
    $date_retour_finale = date('Y-m-d H:i:s', strtotime($demandeMedicaments->date_demande) + ($this->temp_traitementdemande * 60) + ($this->temp_trajet * 60 ));
}
//0 ou 6 teste sur le jour de la semaine
$jours_rendezvous = date ( 'w' , strtotime($date_retour_finale)); 
if($jours_rendezvous == 0){ 
    $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale." +1 days"));
    $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale)); 
}
// si samedi
else if($jours_rendezvous == 6){ 
    if(date("H:i", strtotime($date_retour_finale)) > date("H:i", strtotime("13:00"))){
       // echo "<br><br><br> i am here ". date("H:i", strtotime($date_retour_finale));
        $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale." +2 days"));
        $date_retour_finale = date("Y", strtotime($date_retour_finale))."-".date("m", strtotime($date_retour_finale))."-".date("d", strtotime($date_retour_finale))." 09:00:00";
         $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale)); 
    }else if(date("H:i", strtotime($date_retour_finale)) < date("H:i", strtotime("09:00"))){
        $date_retour_finale = date("Y", strtotime($date_retour_finale))."-".date("m", strtotime($date_retour_finale))."-".date("d", strtotime($date_retour_finale))." 09:00:00";
         $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale));
    }
}else{
    if(date("H:i", strtotime($date_retour_finale)) < date("H:i", strtotime("09:00"))){
        $date_retour_finale = date("Y", strtotime($date_retour_finale))."-".date("m", strtotime($date_retour_finale))."-".date("d", strtotime($date_retour_finale))." 09:00:00";
         $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale));
    }else if(date("H:i", strtotime($date_retour_finale)) > date("H:i", strtotime("13:00")) && date("H:i", strtotime($date_retour_finale)) < date("H:i", strtotime("16:00"))){
        $date_retour_finale = date("Y", strtotime($date_retour_finale))."-".date("m", strtotime($date_retour_finale))."-".date("d", strtotime($date_retour_finale))." 16:00:00";
         $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale));
    }else if(date("H:i", strtotime($date_retour_finale)) > date("H:i", strtotime("19:30"))){ 
        $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale." +1 days"));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale));
        while($jours_rendezvous==0){
        $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale." +1 days"));
        $jours_rendezvous = date ( 'w' , strtotime($date_retour_finale));
        }
        $date_retour_finale = date("Y", strtotime($date_retour_finale))."-".date("m", strtotime($date_retour_finale))."-".date("d", strtotime($date_retour_finale))." 09:00:00";
         $date_retour_finale = date("Y-m-d H:i:s", strtotime($date_retour_finale));
    }
}




        //echo "<br><br><br><br> ".$date_retour_finale."last date in table : ".$jours_rendezvous;
        $demandeMedicaments->heure_retour = $date_retour_finale ;
         DB::beginTransaction();
         try{ 
        $demandeMedicaments->save();
        $id_last_demande = $this->demandeMedicaments->getMaxId(); 
         DB::commit();
    }catch (\Exception $e) {
        // Rollback Transaction
        DB::rollback();
    }
        //$heure_retour = '2020-03-18 16:21:28'; 
        return view('DemandeBienEnvoyees', compact('date_retour_finale', 'id_last_demande')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getListDemandeByIdPharmacie($id){
         $listeDemande = $this->demandeMedicaments->getListDemandeByIdPharmacie($id); 
        // echo $listeDemande;
         return view('listeDemande', compact('listeDemande')); 
    }
}
