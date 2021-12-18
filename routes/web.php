<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Management\Area;
use App\Http\Livewire\Management\Calendar;
use App\Http\Livewire\Management\Import;
use App\Http\Livewire\Management\Importgoods;
use App\Http\Livewire\Management\Exportgoods;
use App\Http\Livewire\Management\ListHuman;
use App\Http\Livewire\Management\ManagerTimekeeping;
use App\Http\Livewire\Management\Menu;
use App\Http\Livewire\Management\Provider;
use App\Http\Livewire\Management\Shift;
use App\Http\Livewire\Management\Storehouse;
use App\Http\Livewire\Management\TimeKeeping;
use App\Http\Livewire\Management\Table;
use App\Http\Livewire\Management\TableEmpty;
use App\Http\Livewire\Management\Bartending;
use App\Http\Livewire\Management\Invoice;
use App\Http\Livewire\Management\Order;
use App\Http\Livewire\Management\Statistical;
use App\Http\Livewire\Management\Wage;
use App\Http\Livewire\Profile\PrintPDF;
use App\Http\Livewire\Profile\ProfileInfo;

use Illuminate\Foundation\Auth\EmailVerificationRequest;    
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Livewire\User\ConfirmUser;
use App\Http\Livewire\User\GrantPermissionIndex;
use App\Http\Livewire\User\GrantPermission;

use App\Http\Livewire\Role\RoleIndex;
use App\Http\Livewire\Role\CreateRole;
use GuzzleHttp\Handler\Proxy;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Home::class)->name('dashboard');

//verify email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Confirm user and grant permission
Route::name('user.')->group(function () {
    Route::prefix('user')->group(function () {

        Route::get('/confirm_user', ConfirmUser::class)->name('confirm_user');

        Route::prefix('grant_permisison')->group(function () {
            Route::get('/', GrantPermissionIndex::class)->name('grant_permission_index');
            Route::get('/{user_id}', GrantPermission::class)->name('grant_permission');
        });

        Route::prefix('role')->group(function () {
            Route::get('/', RoleIndex::class)->name('role_index');
            Route::get('/create_role', CreateRole::class)->name('create_role');
        });
    });
});
//human resource management
Route::name('management.')->group(function () {
    Route::prefix('management')->group(function () {
        Route::get('/list', ListHuman::class)->name('list');
        Route::get('/timekeeping', Timekeeping::class)->name('timekeeping');
        Route::get('/manager_timekeeping', ManagerTimekeeping::class)->name('manager_timekeeping');
        Route::get('/calendar', Calendar::class)->name('calendar');
        Route::get('/shift', Shift::class)->name('shift');
        Route::prefix('table')->group(function () {
            Route::get('/list_empty', TableEmpty::class)->name('list_table_empty');
            Route::get('/list', Table::class)->name('list_table');
        });
        Route::get('/wage', Wage::class)->name('wage');
        Route::prefix('area')->group(function () {
            Route::get('/', Area::class)->name('area');
        });
        Route::get('/provider', Provider::class)->name('provider');
        Route::prefix('store_house')->group(function () {
            Route::get('/', Storehouse::class)->name('store_house');
            Route::get('/import_goods', Importgoods::class)->name('import_goods');
            Route::get('/import_goods/import', Import::class)->name('import');
            Route::get('/export_goods', Exportgoods::class)->name('export_goods');
        });
        Route::get('/menu', Menu::class)->name('menu');
        Route::get('/bartending', Bartending::class)->name('bartending');
        Route::get('/statistical', Statistical::class)->name('statistical');
        Route::get('/order', Order::class)->name('order');
        Route::get('/invoice', Invoice::class)->name('invoice');
    });
});


//edit profile
Route::get('/user/profile', ProfileInfo::class)->name('profile_info');
