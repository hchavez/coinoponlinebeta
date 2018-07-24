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
        $url = url()->current();
        $path = \AppHelper::objectId($url); 
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
        //$george = array('28','29','30','31','35','36','37','41');
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
        $coin28B = $this->getBill($george_01,$date);
        $coin28S = $this->getSwipe($george_01,$date);        
       
        $coin29 = $this->getCoin($george_02,$date);
        $coin29B = $this->getBill($george_02,$date);
        $coin29S = $this->getSwipe($george_02,$date); 
        
        $coin30 = $this->getCoin($george_03,$date);
        $coin30B = $this->getBill($george_03,$date);
        $coin30S = $this->getSwipe($george_03,$date);
        
        $coin31 = $this->getCoin($george_04,$date);  
        $coin31B = $this->getBill($george_04,$date);
        $coin31S = $this->getSwipe($george_04,$date);
        
        $coin35 = $this->getCoin($george_05,$date);
        $coin35B = $this->getBill($george_05,$date);
        $coin35S = $this->getSwipe($george_05,$date);
        
        $coin36 = $this->getCoin($george_06,$date);
        $coin36B = $this->getBill($george_06,$date);
        $coin36S = $this->getSwipe($george_06,$date);
        
        $coin37 = $this->getCoin($george_07,$date);
        $coin37B = $this->getBill($george_07,$date);
        $coin37S = $this->getSwipe($george_07,$date);
        
        $coin38 = $this->getCoin($cardreader_01,$date);
        $coin38B = $this->getBill($cardreader_01,$date);
        $coin38S = $this->getSwipe($cardreader_01,$date);
  
        $coin39 = $this->getCoin($cardreader_02,$date);
        $coin39B = $this->getBill($cardreader_02,$date);
        $coin39S = $this->getSwipe($cardreader_02,$date);   
        
        $coin40 = $this->getCoin($cardreader_03,$date);
        $coin40B = $this->getBill($cardreader_03,$date);
        $coin40S = $this->getSwipe($cardreader_03,$date);
        
        $coin41 = $this->getCoin($george_08,$date);
        $coin41B = $this->getBill($george_08,$date);
        $coin41S = $this->getSwipe($george_08,$date);
        
        $coin42 = $this->getCoin($cardreader_04,$date);
        $coin42B = $this->getBill($cardreader_04,$date);
        $coin42S = $this->getSwipe($cardreader_04,$date);
        
        $coin43 = $this->getCoin($cardreader_05,$date);
        $coin43B = $this->getBill($cardreader_05,$date);
        $coin43S = $this->getSwipe($cardreader_05,$date);
        
        //$coin41 = $this->getCoin($george_08,$date);
        
        if(!empty(Input::get())):
            $category = Input::get('category');
        endif;  
        
        return view('financial-reports/index', ['from'=>$from,'to'=>$to,'coin28'=>$coin28,'coin28B'=>$coin28B['bill'],'coin28S'=>$coin28S['swipe'],'coin29B'=>$coin29B['bill'],'coin29S'=>$coin29S['swipe'],'coin29'=>$coin29,'coin30B'=>$coin30B['bill'],'coin30S'=>$coin30S['swipe'],
                'coin31B'=>$coin31B['bill'],'coin31S'=>$coin31S['swipe'],'coin35B'=>$coin35B['bill'],'coin35S'=>$coin35S['swipe'], 'coin36B'=>$coin36B['bill'],'coin36S'=>$coin36S['swipe'],
                'coin37B'=>$coin37B['bill'],'coin37S'=>$coin37S['swipe'],'coin38B'=>$coin38B['bill'],'coin38S'=>$coin38S['swipe'],'coin38'=>$coin38,'coin39B'=>$coin39B['bill'],'coin39S'=>$coin39S['swipe'],'coin39'=>$coin39,
                'coin40B'=>$coin40B['bill'],'coin40S'=>$coin40S['swipe'],'coin40'=>$coin40,'coin41B'=>$coin41B['bill'],'coin41S'=>$coin41S['swipe'],'coin41'=>$coin41,'coin42B'=>$coin42B['bill'],'coin42S'=>$coin42S['swipe'],'coin42'=>$coin42,
                'coin43B'=>$coin43B['bill'],'coin43S'=>$coin43S['swipe'],'coin43'=>$coin43,'coin43'=>$coin43,'coin30'=>$coin30,'coin31'=>$coin31,'coin35'=>$coin35,'coin36'=>$coin36,'coin37'=>$coin37]);
        
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
        $machinelogs = $qcoin->where('machine_id','=',$id)->sum('coinIn');
        
        $data = array('type'=>'george','coin'=>$machinelogs);
        return $machinelogs;
    }
    
    public function getBill($id,$date){
        $qcoin = $this->query();                  
        $bill = $qcoin->whereBetween('moneylogs.created_at',[$date['from'], $date['to']]);
        $bill = $qcoin->where('machine_id','=',$id)->sum('billIn');
        
        $data = array('type'=>'george','bill'=>$bill);
        return $data;
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
