<?php

use App\Http\Livewire\Account\Account;
use App\Http\Livewire\Home\Home;
use App\Http\Livewire\Login\Login;
use App\Http\Livewire\Testing;
use App\Http\Livewire\Workspace\Workspaces;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', Login::class);

//Check if logged in
Route::middleware(['isAuth'])->group(function ()
{
    Route::get('myboards', Home::class);

    Route::get('workspace', Workspaces::class)->name('workspace');

    Route::get('account', Account::class);

    Route::get('testing', Testing::class);
});
