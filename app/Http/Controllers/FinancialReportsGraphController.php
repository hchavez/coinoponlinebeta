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
        $var = $this->permission('14');
        $totalCoin = $this->getTotal('coinIn');
        $totalBill = $this->getTotal('billIn');
        $totalSwipe = $this->getTotal('swipeIn');
      
             
        if($var['permit']['read']):
            return view('financial-reports-graph/index', ['coin' => $totalCoin,'bill'=>$totalBill,'card'=>$totalSwipe]); 
        else:
            return view('profile/index', ['permit' => $var['permit'], 
                'userDetails' => $var['userDetails'], 
                'user_id' => $var['userDetails'][0]['id'], 
                'userGroup' => $var['userRole'][0]['users_group']]
            );
        endif;
    }   
    
    public function permission($id)
    {                
        $userDetails = \AppHelper::currentUser();     
        $userRole = \AppHelper::getRole($userDetails[0]['userID']);  
        $permission = \AppHelper::userPermission(Auth::User()->id, $id);      
        $permit = array(
            'readAll' => \AppHelper::isReadAll($permission),
            'addAll' => \AppHelper::isAddAll($permission),
            'editAll' => \AppHelper::isEditAll($permission),
            'read' => \AppHelper::isRead($permission),
            'edit' => \AppHelper::isEdit($permission),
            'delete' => \AppHelper::isDelete($permission),
        );        
        $permitDetails = array('userDetails' => $userDetails, 'userRole' => $userRole, 'permit' => $permit);        
        return $permitDetails;
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
        $financial = MoneyLogs::where('status', '=', 1)->whereBetween('created_at',['2018-01-01', '2018-07-01'])->sum($type);
        $Year = MoneyLogs::where('status', '=', 1)->whereBetween('created_at',[$thisYear, $today])->sum($type);
        
        $total = array('today'=>$Today,'yesterday'=>$Yesterday,'thisWeek'=>$Week,'thisMonth'=>$Month,'thisFinancial'=>$financial,'thisYear'=>$Year);
        return $total;
    }   
    
    public function queryLogs($type){
        $fromDate = date("Y-m-d H:i:s",strtotime("-3 month"));
        $today = date("Y-m-d H:i:s");            
        $queryAll = DB::table('moneylogs')
                     ->select(DB::raw('DATE(created_at) as created_at, machine_id, sum('.$type.') as '.$type.' '))
                     ->whereBetween('created_at',[$fromDate,$today])->where('status', '=', 1)
                     ->groupBy(DB::raw('DATE(created_at), machine_id'))->get();        
        return $queryAll;         
    }
    
    public function coin(){                  
        $georgieCoin = $this->queryLogs('coinIn');
        if ($georgieCoin->count() > 0) {
            foreach ($georgieCoin as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                    
                $coin = ($value->coinIn == '')? '0' : $value->coinIn;
                $financialGraph[] = "[". $asdate .",". round($coin,2) ."]";    
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    
    public function bill(){      
        $bill = $this->queryLogs('billIn');
        if ($bill->count() > 0) {
            foreach ($bill as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                         
                $billIn = ($value->billIn == '')? '0' : $value->billIn;
                $financialGraph[] = "[". $asdate .",". round($billIn,2) ."]";  
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
            $financialGraphDate = null;
        }             
        return "[". $financialGraphDate . "]";  
    }
    
    public function card(){          
        $swipe = $this->queryLogs('swipeIn');
        if ($swipe->count() > 0) {
            foreach ($swipe as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $swipeIn = ($value->swipeIn == '')? '0' : $value->swipeIn;                     
                $financialGraph[] = "[". $asdate .",". round($swipeIn,2) ."]";  
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
            $financialGraphDate = null;
        }   
        return "[". $financialGraphDate . "]";  
    }
    
    public function total(){
        $swipe = $this->queryLogs('ttlMoneyIn');
        if ($swipe->count() > 0) {
            foreach ($swipe as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $ttlMoneyIn = ($value->ttlMoneyIn == '')? '0' : $value->ttlMoneyIn;                     
                $financialGraph[] = "[". $asdate .",". round($ttlMoneyIn,2) ."]";  
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
            $financialGraphDate = null;
        }   
        return "[". $financialGraphDate . "]";  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byCategory($type,$cat){
        $fromDate = date("Y-m-d H:i:s",strtotime("-1 month"));
        $today = date("Y-m-d H:i:s");
        $category = DB::table('moneylogs')
                     ->select(DB::raw('DATE(moneylogs.created_at) as created_at, machine_id, sum('.$type.') as '.$type.' ','machines.id as machineID'))
                     ->leftJoin('machines', 'machines.id', '=', 'moneylogs.machine_id')
                     ->where('machines.category','=',$cat)
                     ->whereBetween('moneylogs.created_at',[$fromDate,$today])->where('moneylogs.status', '=', 1)
                     ->groupBy(DB::raw('DATE(moneylogs.created_at), machine_id'))->get();      
        return $category;
    }
    
    public function georgeCoin(){
        $georgieCoin = $this->byCategory('coinIn','george system');
        if ($georgieCoin->count() > 0) {
            foreach ($georgieCoin as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $coin = $value->coinIn;                
                $financialGraph[] = "[". $asdate .",". round($coin,2) ."]";    
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    public function georgeBill(){
        $georgieBill = $this->byCategory('billIn','george system');
        if ($georgieBill->count() > 0) {
            foreach ($georgieBill as $value) { 
                $asdate = strtotime($value->created_at) * 1000;
                $billIn = $value->billIn;                
                $financialGraph[] = "[". $asdate .",". round($billIn,2) ."]";    
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    public function georgeCard(){
        $georgieCard = $this->byCategory('swipeIn','george system');
        if ($georgieCard->count() > 0) {
            foreach ($georgieCard as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                
                $swipeIn = ($value->swipeIn == '')? '0' : $value->swipeIn;                
                $financialGraph[] = "[". $asdate .",". round($swipeIn,2) ."]";    
            }
            $financialGraphDate = join($financialGraph, ',');
        }else{
             $financialGraphDate = null;
        }         
        return "[". $financialGraphDate . "]";  
    }
    
    public function cardReader_Coin(){        
        $coinCard = $this->byCategory('coinIn','cardreader');        
        if ($coinCard->count() > 0) {
            foreach ($coinCard as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                
                $coin = ($value->coinIn == '')? '0' : $value->coinIn; 
                $financialGraph[] = "[". $asdate .",". round($coin,2) ."]";    
            }
            $graphdataWinResultwithDate = join($financialGraph, ',');
        }else{
             $graphdataWinResultwithDate = null;
        }         
        return "[". $graphdataWinResultwithDate . "]";  
    }
    public function cardReader_Bill(){        
        $coinCard = $this->byCategory('billIn','cardreader');
        if ($coinCard->count() > 0) {
            foreach ($coinCard as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                        
                $bill = ($value->billIn == '')? '0' : $value->billIn;
                $financialGraph[] = "[". $asdate .",". round($bill,2) ."]";    
            }
            $graphdataWinResultwithDate = join($financialGraph, ',');
        }else{
             $graphdataWinResultwithDate = null;
        }         
        return "[". $graphdataWinResultwithDate . "]";  
    }
    public function cardReader_Swipe(){        
        $coinCard = $this->byCategory('swipeIn','cardreader');
        if ($coinCard->count() > 0) {
            foreach ($coinCard as $value) { 
                $asdate = strtotime($value->created_at) * 1000;                                
                $swipe = ($value->swipeIn == '')? '0' : $value->swipeIn;
                $financialGraph[] = "[". $asdate .",". round($swipe,2) ."]";    
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
