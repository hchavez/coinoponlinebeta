<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Route;
use App\MachineType;
use App\MachineModel;
use Input;

class RouteController extends Controller
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
         $routes = Route::get();
        return view('route/index', ['routes' => $routes,'success' => '2']);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = Route::all();
        return view('route/create', ['route' => $route]);
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

        return redirect()->intended('system-management/route');
    }
    
    public function store_route(Request $request)
    {
        $route = Input::get('route');      
        $route_id = Input::get('route_id');
        $today = date("Y-m-d H:i:s");
        
        if(!empty($route)):
            if($route_id!=''):            
                $input = [
                    'route' => $route,
                ];
                $query = Route::where('id', $route_id)
                    ->update($input);
                $status = ($query)? '1' : '2';
            else:            
                $query = Route::create([           
                    'database_id' => '2',
                    'route' => $route,
                    'last_modified' => $today
                ]);  
                $status = ($query)? '1' : '2';
            endif;
        else:
            $status = 0;
        endif;
        
        $getAll = Route::all();
   
        return view('route/index',['routes' => $getAll,'success'=>$status]);
       
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
        $route = Route::find($id);
        // Redirect to route list if updating route wasn't existed
        if ($route == null || count($route) == 0) {
            return redirect()->intended('/system-management/route');
        }


        return view('route/edit', ['route' => $route]);
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
        $route = Route::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
        ];
        Route::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/route');
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
         return redirect()->intended('system-management/route');
    }

    /**
     * Search route from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $routes = $this->doSearchingQuery($constraints);
       return view('route/index', ['routes' => $routes, 'searchingVals' => $constraints]);
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
        'name' => 'required|max:60|unique:routes'
    ]);
    }
}
