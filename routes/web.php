<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\MachineModel;
use App\User;
use App\Errorlogs;
use App\WinLogs;
use App\MoneyLogs;
use App\GoalsLogs;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;


Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');

Route::get('machine-management/ajax_getmachinemodel/{id}',array('as'=>'machine-management.ajax','uses'=>'MachineManagementController@ajax_getmachinemodel'));

Auth::routes();

Route::get('api/dropdown', function(){
    $id = Input::get('option');
    $models = Maker::find($id)->models;
    return $models->lists('name', 'id');
});

Route::get('/user', function(){
   $user = User::find(1);
   return new UserResource($user);
});

Route::get('/jsonusers', function(){
   $userall = User::paginate(2);
   return new UserCollection($userall);
});

Route::get('/errorapi', function(){
   $userall = Errorlogs::orderBy('created_at', 'desc')->limit(25000)->get();
   return new UserCollection($userall);
});

Route::get('/winapi', function(){
   $userall = WinLogs::orderBy('created_at', 'desc')->limit(25000)->get();
   return new UserCollection($userall);
});

Route::get('/moneyapi', function(){
   $userall = MoneyLogs::orderBy('created_at', 'desc')->limit(25000)->get();
   return new UserCollection($userall);
});

Route::get('/goalsapi', function(){
   $userall = GoalsLogs::orderBy('created_at', 'desc')->limit(25000)->get();
   return new UserCollection($userall);
});

Route::get('exportcsv/{data}', 'MachineManagementController@exportcsv');
Route::get('mlogs', 'MachineManagementController@mlogs');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); //Just added to fix issue

Route::get('machineApp', 'DashboardController@index');
Route::resource('dashboard', 'DashboardController');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::resource('profile', 'ProfileController');
//Route::get('profile', 'ProfileController@index'); 

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-mgmt', 'UserManagementController');
Route::get('user-management/show/{id}', 'UserManagementController@show');
Route::post('user-management/set_permission', 'UserManagementController@set_permission')->name('user-mgmt.set_permission');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('machine-management', 'MachineManagementController');
Route::post('machine-management/search', 'MachineManagementController@search')->name('machine-management.search');

Route::resource('machine-advam', 'MachineAdvamController');

Route::get('machine-management/win/{id}', 'MachineManagementController@win');
Route::get('machine-management/goals/{id}', 'MachineManagementController@goals');
Route::get('machine-management/money/{id}', 'MachineManagementController@money');
Route::get('machine-management/show/{id}', 'MachineManagementController@show');
Route::get('machine-management/error/{id}', 'MachineManagementController@error');
Route::get('machine-management/claw/{id}', 'MachineManagementController@claw_settings');
Route::post('machine-management/filter', 'MachineManagementController@filter')->name('machine-management.filter');
Route::get('machine-management/getError/{id}', 'MachineManagementController@getError');
Route::get('machine-management/getMoney/{id}', 'MachineManagementController@getMoney');

Route::resource('machine-reports', 'MachineReportsController');

/**********************************************************************************/
Route::post('dashboard/update_error_status', 'DashboardController@update_error_status');
    
Route::resource('machine-settings', 'MachineSettingsController');
Route::post('machine-settings/search', 'MachineSettingsController@search')->name('machine-settings.search');

Route::resource('claw-settings', 'ClawSettingsController');
Route::post('claw-settings/search', 'ClawSettingsController@search')->name('claw-settings.search');

Route::resource('game-settings', 'GameSettingsController');
Route::post('game-settings/search', 'GameSettingsController@search')->name('game-settings.search');

Route::resource('machine-accounts', 'MachineAccountsController');
Route::post('machine-accounts/search', 'MachineAccountsController@search')->name('machine-accounts.search');

Route::resource('product-definitions', 'ProductDefinitionsController');
Route::post('product-definitions/search', 'ProductDefinitionsController@search')->name('product-definitions.search');

Route::resource('cash-boxes', 'CashBoxesController');
Route::post('cash-boxes/search', 'CashBoxesController@search')->name('cash-boxes.search');

Route::resource('area', 'AreaController');
Route::post('area/search', 'AreaController@search')->name('area.search');

Route::resource('prizes', 'PrizeController');
Route::post('prize/search', 'PrizeController@search')->name('prize.search');

Route::resource('themes', 'ThemeController');
Route::post('theme/search', 'ThemeController@search')->name('themes.search');

Route::resource('route', 'RouteController');
Route::post('route/search', 'RouteController@search')->name('route.search');

Route::resource('site-type', 'SiteTypeController');
Route::post('site-type/search', 'SiteTypeController@search')->name('site-type.search');

Route::resource('site-group', 'SiteGroupController');
Route::post('site-group/search', 'SiteGroupController@search')->name('site-group.search');

Route::resource('managing-agent', 'ManagingAgentController');
Route::post('managing-agent/search', 'ManagingAgentController@search')->name('managing-agent.search');

Route::resource('site', 'SiteController');
Route::post('site/search', 'SiteController@search')->name('site.search');

Route::resource('site-commission', 'SiteCommissionController');
Route::post('site-commission', 'SiteCommissionController@search')->name('site-commission.search');

Route::resource('system-management/user-access', 'UserAccessController');
Route::post('system-management/user-access/search', 'UserAccessController@search')->name('user-access.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::resource('machine-type', 'MachineTypeController');
Route::post('machine-type/search', 'MachineTypeController@search')->name('machine-type.search');

Route::resource('machine-model', 'MachineModelController');
Route::post('machine-model/search', 'MachineModelController@search')->name('machine-model.search');

Route::resource('key', 'KeyController');
Route::post('key/search', 'KeyController@search')->name('key.search');

Route::resource('key-location', 'KeyLocationController');
Route::post('key-location/search', 'KeyLocationController@search')->name('key-location.search');

Route::resource('machine-sizes', 'MachineSizesController');
Route::post('machine-sizes/search', 'MachineSizesController@search')->name('machine-sizes.search');

Route::resource('checklist', 'CheckListController');
Route::post('checklist/search', 'CheckListController@search')->name('checklist.search');

Route::resource('machinemodel-checklist', 'MachineModelCheckListController');
Route::post('machinemodel-checklist/search', 'MachineModelCheckListController@search')->name('machinemodel-checklist.search');

Route::resource('repair-type', 'RepairTypeController');
Route::post('repair-type/search', 'RepairTypeController@search')->name('repair-type.search');

Route::resource('meters', 'MetersController');
Route::post('meters/search', 'MetersController@search')->name('meters.search');

Route::resource('system-management/area', 'AreaController');
Route::post('system-management/area/search', 'AreaController@search')->name('name.search');

Route::resource('system-management/route', 'RouteController');
Route::post('system-management/route/search', 'RouteController@search')->name('route.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::resource('system-management/machine-type', 'MachineTypeController');
Route::resource('system-management/site-type', 'SiteTypeController');
Route::resource('system-management/machine-model', 'MachineModelController');
Route::resource('system-management/site-group', 'SiteGroupController');
Route::resource('system-management/city', 'CityController');
Route::resource('system-management/site', 'SiteController');

Route::resource('machines-mgmt/reports', 'MachineReportsController');

Route::get('avatars/{name}', 'EmployeeManagementController@load');
Route::get('avatars/{name}', 'MachineManagementController@load');

Route::resource('profile', 'ProfileController');
Route::post('profile/{id}', 'ProfileController@update');
Route::post('profile/edit/{id}', 'ProfileController@edit');
Route::get('profile/role/{id}', 'ProfileController@role');

Route::resource('activity', 'ActivityController');
Route::get('activity/show/{id}', 'ActivityController@userActivity');

Route::get('add-to-log', 'ActivityController@myTestAddToLog');
Route::get('logActivity', 'ActivityController@logActivity');

Route::resource('messages', 'MessagesController');
Route::get('messages/log', 'MessagesController@log');
