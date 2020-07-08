<?php

use App\Tb_user;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AccountController@index');
Route::get('random',function (){
    $item=\App\Item::with('rats_r')->get();
    foreach ($item as $data){
        dd($data->rats_r['rate']);
    }
    $dist = collect([
        ['id' => 1, 'rate' => 1],
        ['id' => 2, 'rate' => 1],
        ['id' => 3, 'rate' => 1],
        ['id' => 4, 'rate' => 1],
    ]);
//$dist->push([
//   'id'=>5,'rate'=>30
//]);
//
    $rand  = rand(1, $dist->sum('rate'));
    $accum = 0;
    $idx   = -1;
    $dist->each(function ($d, $k) use (&$accum, &$idx, $rand) {
        $idx   = $k;
        $accum += $d['rate'];
        if ($accum >= $rand) {
            return false;
        }
    });

    print_r($dist[$idx]);
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::group(['middleware'=> 'checkuser','web'],function(){
    \Illuminate\Support\Facades\View::composer(['*'],function ($view){
        $username = session('username');
        $data = Tb_user::select('pvalues','bonus')->where('mid', $username)->first();
        $view->with('point',$data);
    });
    Route::resource('/account', 'AccountController');
    Route::resource('/history', 'HistoryController');
    Route::get('/item', 'AccountController@item')->name('item');
    Route::post('/transaction', 'AccountController@transaction')->name('transaction');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'admin\AdminController@index');
        Route::resource('/box','BoxController');
        Route::resource('/item','ItemController');
    });
});
//Route::get('/item','ItemUserController@item')->name('item');
Route::get('/login2','LoginController@login2')->name('login2');
Route::post('/loginprocess','LoginController@loginprocess')->name('loginprocess');
Route::post('/logout2','LoginController@logout2')->name('logout2');
Route::get('/test',function (){
   $data=\App\Account::select('username')->get();
   dd($data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
