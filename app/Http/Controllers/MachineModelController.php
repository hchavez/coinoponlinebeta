<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\MachineType;
use App\MachineModel;

class MachineModelController extends Controller
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
         $models = DB::table('machine_models')
        ->select('machine_models.*',  'machine_types.machine_type as machine_type')
        ->leftJoin('machine_types', 'machine_models.machine_type_id', '=', 'machine_types.id')
        ->latest('machine_models.created_at')->paginate(100);    
        return view('machine-model/index', ['models' => $models]);
        
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = MachineModel::all();
        $types = MachineType::all();
        return view('machine-model/create', ['models' => $models,'types' => $types]);
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
         MachineModel::create([
            'title' => $request['title'],
             'code' => $request['code'],
             'type_id' => $request['type_id']
            
        ]);

        return redirect()->intended('machine-model');
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
        $model = MachineModel::find($id);
        $types = MachineType::all();
        // Redirect to machine_model list if updating machine_model wasn't existed
        if ($model == null || count($model) == 0) {
            return redirect()->intended('machine_model');
        }


        return view('machine-model/edit', ['model' => $model,'types' => $types]);
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
        $machine_model = MachineModel::findOrFail($id);
         $this->validate($request, [
        'title' => 'required|max:60'
        ]);
        $input = [
            'title' => $request['title'],
            'code' => $request['code'],
            'type_id' => $request['type_id']
        ];
        MachineModel::where('id', $id)
            ->update($input);
        
        return redirect()->intended('machine-model');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MachineModel::where('id', $id)->delete();
         return redirect()->intended('machine-model');
    }

    /**
     * Search machine_model from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'title' => $request['title']
            ];

       $models = $this->doSearchingQuery($constraints);
       return view('machine-model/index', ['models' => $models, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = MachineModel::query();
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
        'title' => 'required|max:60|unique:machine_model'
    ]);
    }
}
