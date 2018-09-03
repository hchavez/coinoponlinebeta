<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Route;
use App\ManagingAgent;
use App\MachineModel;

class ManagingAgentController extends Controller
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
        $agents = ManagingAgent::paginate(5);
        return view('managing-agent/index', ['agents' => $agents]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Route::all();
        return view('managing-agent/create', ['managing-agent' => $agents]);
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
         Route::create([
            'name' => $request['name']
        ]);

        return redirect()->intended(' /managing-agent');
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
        $agents = Route::find($id);
        // Redirect to managing-agent list if updating managing-agent wasn't existed
        if ($agents == null || count($$agents) == 0) {
            return redirect()->intended('/managing-agent');
        }


        return view('managing-agent/edit', ['agents' => $agents]);
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
        $agent = Route::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
        ];
        Route::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/managing-agent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Route::where('id', $id)->delete();
         return redirect()->intended('/managing-agent');
    }

    /**
     * Search managing-agent from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $agents = $this->doSearchingQuery($constraints);
       return view('managing-agent/index', ['agents' => $agents, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Route::query();
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
        'name' => 'required|max:60|unique:agents'
    ]);
    }
}
