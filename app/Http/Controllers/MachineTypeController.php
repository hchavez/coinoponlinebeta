<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\MachineType;
use App\MachineModel;
use Input;

class MachineTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $types = MachineType::get();
        return view('machine-type/index', ['types' => $types,'success'=>'2']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = MachineType::all();
        return view('machine-type/create', ['types' => $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         MachineType::create([
            'machine_type' => $request['machine_type'],
             'status' => '1'
        ]);

        return redirect()->intended('machine-type');
    }
    
    public function store_machineType(Request $request)
    {
        $new_machinetype = Input::get('new_machinetype');      
        $machinetype_id = Input::get('machinetype_id');
        $today = date("Y-m-d H:i:s");
        
        if(!empty($new_machinetype)):
            if($machinetype_id!=''):            
                $input = [
                    'machine_type' => $new_machinetype,
                ];
                $query = MachineType::where('id', $machinetype_id)
                    ->update($input);
                $status = ($query)? '1' : '2';
            else:            
                $query = MachineType::create([           
                    'database_id' => '2',
                    'machine_type' => $new_machinetype,
                    'created_at' => $today
                ]);  
                $status = ($query)? '1' : '2';
            endif;
        else:
            $status = 0;
        endif;
        
        $getAll = MachineType::all();
   
        return view('machine-type/index',['types' => $getAll,'success'=>$status]);
       
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
        $machine_type = MachineType::find($id);
        // Redirect to machine_type list if updating machine_type wasn't existed
        if ($machine_type == null || count($machine_type) == 0) {
            return redirect()->intended('machine_type');
        }


        return view('machine-type/edit', ['type' => $machine_type]);
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
        $machine_type = MachineType::findOrFail($id);
         $this->validate($request, [
        'machine_type' => 'required|max:60'
        ]);
        $input = [
            'machine_type' => $request['machine_type'],
        ];
        MachineType::where('id', $id)
            ->update($input);
        
        return redirect()->intended('machine-type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MachineType::where('id', $id)->delete();
         return redirect()->intended('machine-type');
    }

    /**
     * Search machine_type from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'title' => $request['title']
            ];

       $types = $this->doSearchingQuery($constraints);
       return view('machine-type/index', ['types' => $types, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = MachineType::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'machine_type' => 'required|max:60|unique:machine_type'
    ]);
    }
}
