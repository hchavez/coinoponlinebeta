<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Machine;
use App\MoneyLogs;
use Carbon\Carbon;
use Input;


class FinancialReportsGraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {            
                
        $totalCoin = $this->getTotal('coinIn');
        $totalBill = $this->getTotal('billIn');
        $totalSwipe = $this->getTotal('swipeIn');
       
        return view('financial-reports-graph/index', ['coin' => $totalCoin,'bill'=>$totalBill,'card'=>$totalSwipe]);        
    }   
    
    public function getTotal($type){
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d");
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $weekFrom = date('Y-m-d',strtotime("-7 days"));
        $thisYear = date('Y-m-d',strtotime(date('Y-01-01')));
        
        $Today = MoneyLogs::where('status', '=', 1)->where('created_at','like','%'.$today.'%')->sum($type);    
        $Yesterday = MoneyLogs::where('status', '=', 1)->where('created_at','like','%'.$yesterday.'%')->sum($type);
        $Week = MoneyLogs::where('status', '=', 1)->whereBetween('created_at',[$weekFrom, $today])->sum($type);
        $Month = MoneyLogs::where('status', '=', 1)->whereBetween('created_at',[$fromDate, $today])->sum($type);
        $Year = MoneyLogs::where('status', '=', 1)->whereBetween('created_at',[$thisYear, $today])->sum($type);
        
        $total = array('today'=>$Today,'yesterday'=>$Yesterday,'thisWeek'=>$Week,'thisMonth'=>$Month,'thisYear'=>$Year);
        return $total;
    }
    
    public function financialLogs(){  
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d H:i:s");
        $userall = MoneyLogs::select('moneylogs.created_at','coinIn','billIn','swipeIn','machines.comments as comments')
                ->leftJoin('machines','machines.id','=','moneylogs.machine_id')
                ->whereBetween('moneylogs.created_at', [$fromDate,$today])->get();
        
        /*$userall = DB::table('moneylogs')
                     ->select(DB::raw('DATE(created_at) as created_at, machine_id, sum(coinIn) as coinIn, sum(billIn) as billIn, sum(swipeIn) as swipeIn'))
                     ->whereBetween('created_at',[$fromDate,$today])
                     ->where('status', '=', 1)
                     ->groupBy(DB::raw('DATE(created_at), machine_id'))
                     ->get();*/
        //print_r($userall);
        if ($userall->count() > 0) {
                 foreach ($userall as $value) { 
                     $asdate = strtotime($value->created_at) * 1000;
                     $coin = $value->coinIn;
                     $bill = $value->billIn;                     
                     $swipe = ($value->swipeIn == '')? '0' : $value->swipeIn;
                     $financialGraph[] = "[". $asdate .",". $coin .",". $bill .",". $swipe ."]";    
                 }
                 $graphdataWinResultwithDate = join($financialGraph, ',');
             }else{
                  $graphdataWinResultwithDate = null;
             }         
         return "[". $graphdataWinResultwithDate . "]";  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function georgeLogs(){
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d H:i:s");
        $userall = DB::table('moneylogs')
                        ->select('moneylogs.*', 'moneylogs.created_at as createdDate', 'moneylogs.coinIn as coin','moneylogs.billIn as bill','moneylogs.swipeIn as swipe'
                                , 'machines.id as machineID', 'machines.category as category')
                        ->leftJoin('machines', 'machines.id', '=', 'moneylogs.machine_id')
                        ->where('machines.category','=','george system')
                        ->whereBetween('moneylogs.created_at', [$fromDate,$today])->get();
                       
        
        if ($userall->count() > 0) {
                 foreach ($userall as $value) { 
                     $asdate = strtotime($value->created_at) * 1000;
                     $coin = $value->coinIn;
                     $bill = $value->billIn;                     
                     $swipe = ($value->swipeIn == '')? '0' : $value->swipeIn;
                     $financialGraph[] = "[". $asdate .",". $coin .",". $bill .",". $swipe ."]";    
                 }
                 $graphdataWinResultwithDate = join($financialGraph, ',');
             }else{
                  $graphdataWinResultwithDate = null;
             }         
         return "[". $graphdataWinResultwithDate . "]";  
    }
    
    public function cardReaderLogs(){
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d H:i:s");
        $userall = DB::table('moneylogs')
                        ->select('moneylogs.*', 'moneylogs.created_at as createdDate', 'moneylogs.coinIn as coin','moneylogs.billIn as bill','moneylogs.swipeIn as swipe'
                                , 'machines.id as machineID', 'machines.category as category')
                        ->leftJoin('machines', 'machines.id', '=', 'moneylogs.machine_id')
                        ->where('machines.category','=','cardreader')
                        ->whereBetween('moneylogs.created_at', [$fromDate,$today])->get();
                       
        
        if ($userall->count() > 0) {
                 foreach ($userall as $value) { 
                     $asdate = strtotime($value->created_at) * 1000;
                     $coin = $value->coinIn;
                     $bill = $value->billIn;                     
                     $swipe = ($value->swipeIn == '')? '0' : $value->swipeIn;
                     $financialGraph[] = "[". $asdate .",". $coin .",". $bill .",". $swipe ."]";    
                 }
                 $graphdataWinResultwithDate = join($financialGraph, ',');
             }else{
                  $graphdataWinResultwithDate = null;
             }         
         return "[". $graphdataWinResultwithDate . "]";  
    }
    
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
