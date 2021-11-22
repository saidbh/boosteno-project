<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\IconController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\UIElementController;
use App\Http\Controllers\ExtraPagesController;
use App\Http\Controllers\FormElementController;
use App\Http\Controllers\Rh\ReportsRhController;
use App\Http\Controllers\Sales\OrdersController;
use App\Http\Controllers\Rh\ExpensesRhController;
use App\Http\Controllers\Rh\RequestsRhController;
use App\Http\Controllers\Sales\ClientsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Rh\EmployeesRhController;
use App\Http\Controllers\Sales\InvoicesController;
use App\Http\Controllers\Sales\ServicesController;
use App\Http\Controllers\Sales\EstimatesController;
use App\Http\Controllers\System\AgenciesController;
use App\Http\Controllers\Rh\EvaluationsRhController;
use App\Http\Controllers\Rh\RecruitmentsRhController;
use App\Http\Controllers\System\AssignRoleController;
use App\Http\Controllers\System\CurrenciesController;
use App\Http\Controllers\System\DepartmentsController;
use App\Http\Controllers\Thirds\GlobalThirdsController;
use App\Http\Controllers\System\CompaniesPlusController;
use App\Http\Controllers\Thirds\ClientsThirdsController;
use App\Http\Controllers\System\RolePermissionController;
use App\Http\Controllers\Academy\RoomsManagmentController;
use App\Http\Controllers\Thirds\ProspectsThirdsController;
use App\Http\Controllers\Thirds\SuppliersThirdsController;
use App\Http\Controllers\Contacts\GlobalContactsController;
use App\Http\Controllers\Academy\ClassesManagmentController;
use App\Http\Controllers\Academy\ClientsManagmentController;
use App\Http\Controllers\Academy\LessonsManagmentController;
use App\Http\Controllers\Contacts\ClientsContactsController;
use App\Http\Controllers\System\MailingValidationController;
use App\Http\Controllers\Academy\SessionsManagmentController;
use App\Http\Controllers\Academy\TeachersManagmentController;
use App\Http\Controllers\Academy\SchoolingManagmentController;
use App\Http\Controllers\Contacts\ProspectsContactsController;
use App\Http\Controllers\Contacts\SuppliersContactsController;
use App\Http\Controllers\Academy\LevelsManagmentController;
use App\Http\Controllers\Academy\TimesheetsManagmentController;
use App\Http\Controllers\Academy\AvailablityManagmentController;
use App\Http\Controllers\Academy\ReservationManagmentController;
use App\Http\Controllers\Calendar\EventsController;


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

Route::group(['middleware'=>'guest'],function(){

  Route::group(['prefix'=>'login'],function(){
    Route::get('/', [AuthenticationController::class, 'loginView'])->name('login');
    Route::post('/', [AuthenticationController::class, 'login'])->name('login');
  });

  Route::group(['prefix'=>'registration'],function(){
    Route::get('/', [AuthenticationController::class, 'registrationView'])->name('registration');
    Route::post('/', [AuthenticationController::class, 'registration'])->name('registration');
  });

  Route::group(['prefix'=>'recover'],function(){
    Route::get('/', [AuthenticationController::class, 'recoverPasswordView'])->name('recover');
    Route::post('/', [AuthenticationController::class, 'recoverPassword'])->name('recover');
  });


});

Route::group(['middleware'=>'auth:web','except'=>'logout'],function(){

  Route::get("auth/check",function(){
  });

  Route::get('logout',function(){
    Session::flush();
    Auth::logout();
    return redirect('login');
  })->name('logout');

  Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

  Route::group(['prefix'=>'academy','name'=>'academy'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('academy');

    Route::resource('clients',ClientsManagmentController::class)->names([
      'index' => 'academy-clients',
      'create' => 'academy-clients.create',
      'store' => 'academy-clients.store',
      'update' => 'academy-clients.update',
      'destroy' => 'academy-clients.destroy'
    ]);
    Route::get('/profile', function () {
        return view('academy.clients.profile.profile');
    })->name('Client_profile');
    ////////

    Route::resource('teachers',TeachersManagmentController::class)->names([
      'index' => 'academy-teachers',
      'create' => 'academy-teachers.create',
    ]);
    Route::get('/teacher/profile', function () {
        return view('academy.teachers.profile.profile');
    })->name('teacher_profile');
    ///

    Route::resource('rooms',RoomsManagmentController::class)->names([
      'index' => 'academy-rooms',
      'create' => 'academy-rooms.create',
    ]);

/*     Route::resource('classes',ClassesManagmentController::class)->names([
      'index' => 'academy-classes',
      'create' => 'academy-classes.create',
      'store' => 'academy-classes.store',
      'update' => 'academy-classes.update',
      'destroy' => 'academy-classes.destroy',
    ]); */

    Route::resource('lessons',LessonsManagmentController::class)->names([
      'index' => 'academy-lessons',
      'create' => 'academy-lessons.create',
      'store' => 'academy-lessons.store',
      'update' => 'academy-lessons.update',
      'destroy' => 'academy-lessons.destroy',
    ]);

    Route::resource('sessions',SessionsManagmentController::class)->names([
      'index' => 'academy-sessions',
      'create' => 'academy-sessions.create',
      'store' => 'academy-sessions.store',
      'update' => 'academy-sessions.update',
      'destroy' => 'academy-sessions.destroy',
    ]);

    Route::resource('schooling',SchoolingManagmentController::class)->names([
      'index' => 'academy-schooling',
      'create' => 'academy-schooling.create',
    ]);

    Route::resource('levels',LevelsManagmentController::class)->names([
        'index' => 'academy-levels',
        'create' => 'academy-levels.create',
        'store' => 'academy-levels.store',
        'update' => 'academy-levels.update',
        'destroy' => 'academy-levels.destroy',
      ]);
      ///
            //timesheet
            Route::resource('timesheet',TimesheetsManagmentController::class)->names([
                'index' => 'academy-timesheet',
                'create' => 'academy-timesheet.create',
                'store' => 'academy-timesheet.store',
                'update' => 'academy-timesheet.update',
                'destroy' => 'academy-timesheet.destroy',
              ]);

                          //Availablity
            Route::resource('availability',AvailablityManagmentController::class)->names([
                'index' => 'academy-availability',
                'create' => 'academy-availability.create',
                'store' => 'academy-availability.store',
                'update' => 'academy-availability.update',
                'destroy' => 'academy-availability.destroy',
              ]);
                  //Reservation
            Route::resource('reservation',ReservationManagmentController::class)->names([
                'index' => 'academy-reservation',
                'create' => 'academy-reservation.create',
                'store' => 'academy-reservation.store',
                'update' => 'academy-reservation.update',
                'destroy' => 'academy-reservation.destroy',
              ]);
              //////
              Route::resource('schooling',SchoolingManagmentController::class)->names([
                'index' => 'academy-schooling',
                'create' => 'academy-schooling.create',
                'store' => 'academy-schooling.store',
                'update' => 'academy-schooling.update',
                'destroy' => 'academy-schooling.destroy',
              ]);
              //////

  });
  /////
  Route::group(['prefix'=>'calendar','name'=>'calendar'], function(){

    Route::resource('events',EventsController::class)->names([
        'index'=>'calendar-events',
      ]);
      Route::post('eventsCRUD', [EventsController::class ,'calendarEvents'])->name('calendar-events.ajax');
  });
  /////

  Route::group(['prefix'=>'visa','name'=>'visa'], function(){
    Route::get('/',function(){
      return null;
    })->name('visa');
  });

  Route::group(['prefix'=>'space','name'=>'space'], function(){
    Route::get('/',function(){
      return null;
    })->name('space');
  });

  Route::group(['prefix'=>'thirds','name'=>'thirds'], function(){

    Route::get('/',function(){return redirect('dashboard');})->name('thirds');

    Route::resource('list', GlobalThirdsController::class)->names([
      'index'=>'thirds-list',
      'create'=>'thirds-new',
      'store'=>'thirds-store',
      'edit'=>'thirds-edit',
      'update'=>'thirds-update',
      'destroy'=>'thirds-destroy',
    ]);

    Route::get('third/switch', [GlobalThirdsController::class, 'changeThird'])->name('thirds-switch');
    Route::post('third/affect', [GlobalThirdsController::class, 'thirdContactAffect'])->name('thirds-affect');

    Route::resource('prospects',ProspectsThirdsController::class)->names([
      'index'=>'thirds-prospects'
    ]);

    Route::resource('clients',ClientsThirdsController::class)->names([
      'index'=>'thirds-clients'
    ]);

    Route::resource('suppliers',SuppliersThirdsController::class)->names([
      'index'=>'thirds-suppliers'
    ]);

  });

  Route::group(['prefix'=>'contacts','name'=>'contacts'], function(){

    Route::get('/',function(){return redirect('dashboard');})->name('contacts');

    Route::resource('list',GlobalContactsController::class)->names([
      'index'=>'contacts-list',
      'create' => 'contacts-new',
      'edit'=>'contacts-edit',
      'update'=>'contacts-update',
      'store' => 'contacts-store',
      'destroy'=>'contacts-destroy'
    ]);

    Route::get('contact/switch', [GlobalContactsController::class, 'contactSwitch'])->name('contacts-switch');
    Route::post('contact/affect', [GlobalContactsController::class, 'contactThirdAffect'])->name('contacts-affect');

    Route::resource('prospects', ProspectsContactsController::class)->names([
      'index'=>'contacts-prospects'
    ]);

    Route::resource('clients',ClientsContactsController::class)->names([
      'index'=>'contacts-clients'
    ]);

    Route::resource('suppliers',SuppliersContactsController::class)->names([
      'index'=>'contacts-suppliers'
    ]);

  });

  Route::group(['prefix'=>'sales','name'=>'sales'],function(){

    Route::get('/',function(){return redirect('dashboard');})->name('sales');

    Route::resource('clients', ClientsController::class)->names([
      'index' => 'sales-clients',
      'create' => 'sales-clients.create',
      'store' => 'sales-clients.store'
    ]);

    Route::post('estimate/orders/add',[EstimatesController::class, "addOrders"])->name('sales-estimates-orders.add');

    Route::get('estimate/orders/items',[EstimatesController::class, "create"])->name('sales-estimates.items');

    Route::get('estimate/orders/list',[EstimatesController::class,"getOrders"])->name('sales-estimates-orders.list');
    Route::get('estimate/taxes/list',[EstimatesController::class,"getTaxes"])->name('sales-estimates-taxes.list');

    Route::delete('estimate/orders/delete',[EstimatesController::class,"deleteOrders"])->name('sales-estimates-orders.delete');
    Route::delete('estimate/taxes/delete',[EstimatesController::class,"deleteTaxes"])->name('sales-estimates-taxes.delete');



    Route::resource('estimates', EstimatesController::class)->names([
      'index' => 'sales-estimates',
      'create' => 'sales-estimates.create',
      'store' => 'sales-estimates.store',
    ]);

    Route::resource('orders', OrdersController::class)->names([
      'index' => 'sales-orders',
    ]);
    Route::resource('services', ServicesController::class)->names([
      'index' => 'sales-services',
      'create' => 'sales-services.create',
    ]);
    Route::resource('invoices', InvoicesController::class)->names([
      'index' => 'sales-invoices',
    ]);

  });

  Route::group(['prefix'=>'purchases','name'=>'purchases'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('purchases');
  });

  Route::group(['prefix'=>'contracts','name'=>'contracts'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('contracts');
  });

  Route::group(['prefix'=>'rh','name'=>'rh'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('rh');

    Route::resource('employees',EmployeesRhController::class)->names([
      'index'=>'rh-employees',
      'store' => 'rh-employees.store',
      'create' => 'rh-employees.create',
      'update' => 'rh-employees.update',
      'destroy' => 'rh-employees.destroy',
    ]);

    Route::resource('recruitments',RecruitmentsRhController::class)->names([
      'index'=>'rh-recruitments'
    ]);

    Route::resource('evaluations',EvaluationsRhController::class)->names([
      'index'=>'rh-evaluations'
    ]);

    Route::resource('requests',RequestsRhController::class)->names([
      'index'=>'rh-requests'
    ]);

    Route::resource('expenses',ExpensesRhController::class)->names([
      'index'=>'rh-expenses'
    ]);

    Route::resource('reports',ReportsRhController::class)->names([
      'index'=>'rh-reports'
    ]);

  });

  Route::group(['prefix'=>'mkg','name'=>'mkg'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('mkg');
  });

  Route::group(['prefix'=>'team','name'=>'team'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('team');
  });

  Route::group(['prefix'=>'support','name'=>'support'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('support');
  });

  Route::group(['prefix'=>'docs','name'=>'docs'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('docs');
  });

  Route::group(['prefix'=>'reports'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('reports');
  });

  Route::group(['prefix'=>'system'],function(){
    Route::get('/',function(){return redirect('dashboard');})->name('system');

    Route::resource('companies', CompaniesPlusController::class)->names([
        'index' => 'system-companies-plus',
        'create' => 'system-companies-plus.create',
        'store' => 'system-companies-plus.store',
        'edit' => 'system-companies-plus.edit',
        'update' => 'system-companies-plus.update',
        'destroy' => 'system-companies-plus.destroy',
      ]);

    Route::resource('role-permission', RolePermissionController::class)->names([
      'index' => 'system-role-permission',
      'create' => 'system-role-permission.create',
      'store' => 'system-role-permission.store',
      'edit' => 'system-role-permission.edit',
      'update' => 'system-role-permission.update',
      'destroy' => 'system-role-permission.destroy'
    ]);

    Route::resource('assign-role', AssignRoleController::class)->names([
      'index' => 'system-assign-role',
      'create' => 'system-assign-role.create',
      'store' => 'system-assign-role.store',
      'edit' => 'system-assign-role.edit',
      'update' => 'system-assign-role.update',
      'destroy' => 'system-assign-role.destroy',
    ]);

    Route::resource('currencies', CurrenciesController::class)->names([
      'index' => 'system-currencies',
      'create' => 'system-currencies.create',
      'store' => 'system-currencies.store',
    ]);

    Route::resource('mailing-validation', MailingValidationController::class)->names([
      'index' => 'system-mailing-validation',
      'create' => 'system-mailing-validation.create',
      'store' => 'system-mailing-validation.store',
    ]);

    Route::resource('agencies', AgenciesController::class)->names([
      'index' => 'system-agencies',
      'create' => 'system-agencies.create',
      'store' => 'system-agencies.store',
      'edit' => 'system-agencies.edit',
      'update' => 'system-agencies.update',
      'destroy' => 'system-agencies.destroy',
    ]);

    Route::resource('departmens', DepartmentsController::class)->names([
      'index' => 'system-departments',
      'create' => 'system-departments.create',
      'store' => 'system-departments.store',
      'edit' => 'system-departments.edit',
      'update' => 'system-departments.update',
      'destroy' => 'system-departments.destroy',
    ]);

    Route::get('dictionary',function(){
      return 'hello';
    })->name('system-dictionary');
  });

  /**
   * new routes
   *
   */
  Route::group(['prefix'=>'sales','name'=>'sales'],function(){

    Route::get('/',function(){return redirect('dashboard');})->name('sales');

    Route::resource('clients', ClientsController::class)->names([
      'index' => 'sales-clients',
      'create' => 'sales-clients.create',
      'store' => 'sales-clients.store'
    ]);

    Route::post('estimate/orders/add', [EstimatesController::class, "addOrders"])->name('sales-estimates-orders.add');
    Route::get('estimate/orders/items', [EstimatesController::class, "create"])->name('sales-estimates.items');
    Route::get('estimate/orders/list', [EstimatesController::class,"getOrders"])->name('sales-estimates-orders.list');
    Route::get('estimate/taxes/list', [EstimatesController::class,"getTaxes"])->name('sales-estimates-taxes.list');
    Route::delete('estimate/orders/delete', [EstimatesController::class,"deleteOrders"])->name('sales-estimates-orders.delete');
    Route::delete('estimate/taxes/delete', [EstimatesController::class,"deleteTaxes"])->name('sales-estimates-taxes.delete');
    Route::post('estimate/total', [EstimatesController::class, 'setTotal'])->name('sales-estimates.total');
    Route::get('estimate/confirm', [EstimatesController::class, 'confirm'])->name('sales-estimates.confirm');
    Route::get('estimate/preview',[EstimatesController::class, 'previewEstimate'])->name('sales-estimates.preview');

    Route::get('estimate/clients/list',[EstimatesController::class, 'clientsList'])->name('sales-estimates-client.list');
    Route::post('estimate/clients/add',[EstimatesController::class, 'clientAdd'])->name('sales-estimates-client.add');

    Route::resource('estimates', EstimatesController::class)->names([
      'index' => 'sales-estimates',
      'create' => 'sales-estimates.create',
      'store' => 'sales-estimates.store',
      'show' => 'sales-estimates.show',
      'edit' => 'sales-estimates.edit',
      'update' => 'sales-estimates.update',
      'destroy' => 'sales-estimates.destroy',
    ]);

    Route::resource('orders', OrdersController::class)->names([
      'index' => 'sales-orders',
      'create' => 'sales-orders.create',
      'store' => 'sales-orders.store',
      'show' => 'sales-orders.show',
      'edit' => 'sales-orders.edit',
      'update' => 'sales-orders.update',
      'destroy' => 'sales-orders.destroy',
    ]);

    Route::post('commande/orders/add', [Sales\OrdersController::class, "addOrders"])->name('sales-commande-orders.add');
    Route::get('commande/orders/items', [Sales\OrdersController::class, "create"])->name('sales-commande.items');
    Route::get('commande/orders/list', [Sales\OrdersController::class,"getOrders"])->name('sales-commande-orders.list');
    Route::get('commande/taxes/list', [Sales\OrdersController::class,"getTaxes"])->name('sales-commande-taxes.list');
    Route::delete('commande/orders/delete', [Sales\OrdersController::class,"deleteOrders"])->name('sales-commande-orders.delete');
    Route::delete('commande/taxes/delete', [Sales\OrdersController::class,"deleteTaxes"])->name('sales-commande-taxes.delete');
    Route::post('commande/total', [Sales\OrdersController::class, 'setTotal'])->name('sales-commande.total');
    Route::get('commande/confirm', [Sales\OrdersController::class, 'confirm'])->name('sales-commande.confirm');

    Route::resource('services', Sales\ServicesController::class)->names([
      'index' => 'sales-services',
      'create' => 'sales-services.create',
      'store' => 'sales-services.store',
      'show' => 'sales-services.show',
      'edit' => 'sales-services.edit',
      'update' => 'sales-services.update',
      'destroy' => 'sales-services.destroy',
    ]);

    Route::post('invoice/orders/add', [Sales\InvoicesController::class, "addOrders"])->name('sales-invoices-orders.add');
    Route::get('invoice/orders/items', [Sales\InvoicesController::class, "create"])->name('sales-invoices.items');
    Route::get('invoice/orders/list', [Sales\InvoicesController::class,"getOrders"])->name('sales-invoices-orders.list');
    Route::get('invoice/taxes/list', [Sales\InvoicesController::class,"getTaxes"])->name('sales-invoices-taxes.list');
    Route::delete('invoice/orders/delete', [Sales\InvoicesController::class,"deleteOrders"])->name('sales-invoices-orders.delete');
    Route::delete('invoice/taxes/delete', [Sales\InvoicesController::class,"deleteTaxes"])->name('sales-invoices-taxes.delete');
    Route::post('invoice/total', [Sales\InvoicesController::class, 'setTotal'])->name('sales-invoices.total');
    Route::get('invoice/confirm', [Sales\InvoicesController::class, 'confirm'])->name('sales-invoices.confirm');
    Route::get('invoice/preview',[Sales\InvoicesController::class, 'previewInvoice'])->name('sales-invoices.preview');
    Route::resource('invoices', Sales\InvoicesController::class)->names([
      'index' => 'sales-invoices',
      'create' => 'sales-invoices.create',
      'store' => 'sales-invoices.store',
      'show' => 'sales-invoices.show',
      'edit' => 'sales-invoices.edit',
      'update' => 'sales-invoices.update',
      'destroy' => 'sales-invoices.destroy',
    ]);

  });

  Route::group(['prefix'=>'purchases','name'=>'purchases'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('purchases');

    Route::resource('suppliers', Purchases\SuppliersController::class)->names([
      'index' => 'purchases-suppliers',
      'create' => 'purchases-suppliers.create',
      'store' => 'purchases-suppliers.store',
      'show' => 'purchases-suppliers.show',
      'edit' => 'purchases-suppliers.edit',
      'update' => 'purchases-suppliers.update',
      'destroy' => 'purchases-suppliers.destroy',
    ]);
    Route::resource('services', Purchases\ServicesController::class)->names([
      'index' => 'purchases-services',
      'create' => 'purchases-services.create',
      'store' => 'purchases-services.store',
      'show' => 'purchases-services.show',
      'edit' => 'purchases-services.edit',
      'update' => 'purchases-services.update',
      'destroy' => 'purchases-services.destroy',
    ]);
    Route::resource('estimates', Purchases\EstimatesController::class)->names([
      'index' => 'purchases-estimates',
      'create' => 'purchases-estimates.create',
      'store' => 'purchases-estimates.store',
      'show' => 'purchases-estimates.show',
      'edit' => 'purchases-estimates.edit',
      'update' => 'purchases-estimates.update',
      'destroy' => 'purchases-estimates.destroy',
    ]);
    Route::resource('orders', Purchases\OrdersController::class)->names([
      'index' => 'purchases-orders',
      'create' => 'purchases-orders.create',
      'store' => 'purchases-orders.store',
      'show' => 'purchases-orders.show',
      'edit' => 'purchases-orders.edit',
      'update' => 'purchases-orders.update',
      'destroy' => 'purchases-orders.destroy',
    ]);
    Route::resource('invoices', Purchases\InvoicesController::class)->names([
      'index' => 'purchases-invoices',
      'create' => 'purchases-invoices.create',
      'store' => 'purchases-invoices.store',
      'show' => 'purchases-invoices.show',
      'edit' => 'purchases-invoices.edit',
      'update' => 'purchases-invoices.update',
      'destroy' => 'purchases-invoices.destroy',
    ]);
    Route::resource('stock', Purchases\StockController::class)->names([
      'index' => 'purchases-stock',
      'create' => 'purchases-stock.create',
      'store' => 'purchases-stock.store',
      'show' => 'purchases-stock.show',
      'edit' => 'purchases-stock.edit',
      'update' => 'purchases-stock.update',
      'destroy' => 'purchases-stock.destroy',
    ]);

  });

});







