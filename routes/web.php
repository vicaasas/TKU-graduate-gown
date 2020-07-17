<?php

use App\Cloth;
use App\Config;
use App\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::group(['middleware' => ['auth']], function () {
    // 主頁面
    Route::get('/', function () {
        return Redirect::route('home');
    });
    Route::get('/index', function () {
        return view('index',
            [
                'location' => Config::where('key', '歸還地點')->first()->value,
                'time_list' => Time::all(),
                'cloth_list' => Cloth::all()->groupBy('type')
            ]);
    })->name('home');

    // 個人設定
    Route::prefix('profile')->group(function () {
        Route::get('/', function () {
            return view('auth.profile');
        })->name('profile');

        Route::post('password', 'Auth\PasswordChangeController@change')
            ->name('profile.change.password');

        Route::post('image', 'Auth\ImageChangeController@change')
            ->name('profile.change.image')
            ->middleware('can:admin');
    });

    // 報表產生
    Route::group(['prefix' => 'report', 'middleware' => ['can:admin'], 'as' => 'report.'], function () {
        Route::get('total', function () {
            return view('admin.report.total');
        })->name('total');

        Route::get('not_return', function () {
            return view('admin.report.not_return');
        })->name('not_return');
    });

    // 更新歸還地點
    Route::post('return_location/update', 'ConfigController@update_location')
        ->name('update.location')
        ->middleware('can:admin');

    // 物品歸還頁面
    Route::get('return', 'ReturnClothController@index')
        ->name('return.cloths.page')
        ->middleware('can:admin');
    Route::post('return', 'ReturnClothController@post')
        ->name('return.cloths.post')
        ->middleware('can:admin');

    Route::resource('time', 'TimeController', ['only' => [
        'index', 'create', 'store', 'edit',
    ]]);

    Route::resource('cloth', 'ClothController', ['only' => [
        'index', 'create', 'store', 'edit',
    ]]);
});

Auth::routes([
    'confirm' => false,
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
