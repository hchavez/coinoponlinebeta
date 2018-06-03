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
        return view('financial-reports-graph/index');
    }   
    
    public function financialLogs(){  
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d H:i:s");
        $userall = MoneyLogs::select('created_at','coinIn','billIn','swipeIn')
           ->whereBetween('created_at', [$fromDate,$today])->get();
        
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
