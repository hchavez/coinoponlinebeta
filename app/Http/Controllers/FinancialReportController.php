<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Machine;
use App\City;
use App\State;
use App\Country;
use App\Department;
use App\Division;
use App\Errorlogs;
use App\GoalsLogs;
use App\WinLogs;
use App\MoneyLogs;
use App\MachineType;
use App\MachineModel;
use App\Site;
use App\ErrorlogsHistory;
use Carbon\Carbon;
use Input;


class FinancialReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {               
                
        $dateRange = Input::get('dateFilter');
        
        $from = date("Y-m-d H:i:s",strtotime("-3 month"));
        $to = date("Y-m-d H:i:s");       
        if($dateRange !=''):
            $explode = explode('-',$dateRange);
            $explode_from = explode('/',$explode[0]);
            $explode_to = explode('/',$explode[1]);
            $from = str_replace(' ','',$explode_from[2].'-'.$explode_from[0].'-'.$explode_from[1]);
            $to = str_replace(' ','',$explode_to[2].'-'.$explode_to[0].'-'.$explode_to[1]);
        endif;
        $date = array('to'=>$to,'from'=>$from);
        $cardreader_01 = '38';
        $cardreader_02 = '39';
        $cardreader_03 = '40';
        $cardreader_04 = '42';
        $cardreader_05 = '43';
        //$cardreader = array('38','39','40','42','43');
        //$george = array('28','29','30','31','34','35','36','37','41');
        $george_01 = '28';
        $george_02 = '29';
        $george_03 = '30';
        $george_04 = '31';       
        $george_05 = '35';
        $george_06 = '36';
        $george_07 = '37';
        $george_08 = '41';
        
        //$coin28 = $this->getCoin($machine_01,$date);
        $swipe38 = $this->getSwipe($cardreader_01,$date);
        $swipe39 = $this->getSwipe($cardreader_02,$date);
        $swipe40 = $this->getSwipe($cardreader_03,$date);
        $swipe42 = $this->getSwipe($cardreader_04,$date);
        $swipe43 = $this->getSwipe($cardreader_05,$date);
      // echo $swipe39['swipe'];
        $coin28 = $this->getCoin($george_01,$date);
        $coin28s = $this->getSwipe($george_01,$date);
        $coin28s['swipe'];
        $coin29 = $this->getCoin($george_02,$date);
        $coin30 = $this->getCoin($george_03,$date);
        $coin31 = $this->getCoin($george_04,$date);        
        $coin35 = $this->getCoin($george_05,$date);
        $coin36 = $this->getCoin($george_06,$date);
        $coin37 = $this->getCoin($george_07,$date);
        $coin41 = $this->getCoin($george_08,$date);
        
        if(!empty(Input::get())):
            $category = Input::get('category');
        endif;  
        
        return view('financial-reports/index', ['from'=>$from,'to'=>$to,'swipe38' => $swipe38['swipe'],'swipe39' => $swipe39['swipe'],'swipe40' => $swipe40['swipe'],'swipe42' => $swipe42['swipe'],'swipe43' => $swipe43['swipe'],
                'coin28'=>$coin28,'coin29'=>$coin29,'coin30'=>$coin30,'coin31'=>$coin31,'coin35'=>$coin35,'coin36'=>$coin36,'coin37'=>$coin37,'coin41'=>$coin41]);
        
    }  
    
    public function query(){
        $query = DB::table('moneylogs')
                ->select('moneylogs.*','moneylogs.ttlBillIn as coinnote', 'moneylogs.swipeIn as card',
                        'machines.comments as comments','machines.category as category')
                ->leftJoin('machines','machines.id','=','moneylogs.machine_id');
        return $query;
    }
    public function getCoin($id,$date){
        $qcoin = $this->query();                  
        $machinelogs = $qcoin->whereBetween('moneylogs.created_at',[$date['from'], $date['to']]);
        $machinelogs = $qcoin->where('machine_id','=',$id)->sum('ttlBillIn');
        
        $data = array('type'=>'george','coin'=>$machinelogs);
        return $machinelogs;
    }
    
    public function getSwipe($id,$date){
        $qswipe = $this->query();                  
        $getSwipe = $qswipe->whereBetween('moneylogs.created_at',[$date['from'], $date['to']]);
        $getSwipe = $qswipe->where('machine_id','=',$id)->sum('swipeIn');
        
        $data = array('type'=>'cardreader','swipe'=>$getSwipe);
        return $data;
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
        //
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
}
