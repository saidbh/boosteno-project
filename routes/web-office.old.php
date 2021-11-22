<?php
namespace App\Models;
namespace App\Http\Controllers;

use App\Http\Controllers\Purchases\SuppliersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

    Route::resource('clients', Academy\ClientsManagmentController::class)->names([
      'index' => 'academy-clients',
      'create' => 'academy-clients.create',
    ]);

    Route::resource('teachers', Academy\TeachersManagmentController::class)->names([
      'index' => 'academy-teachers',
      'create' => 'academy-teachers.create',
    ]);

    Route::resource('rooms', Academy\RoomsManagmentController::class)->names([
      'index' => 'academy-rooms',
      'create' => 'academy-rooms.create',
      'store' => 'academy-rooms.store',
      'edit' => 'academy-rooms.edit',
      'update' => 'academy-rooms.update',
      'destroy' => 'academy-rooms.destroy',
    ]);

    Route::resource('classes', Academy\ClassesManagmentController::class)->names([
      'index' => 'academy-classes',
      'create' => 'academy-classes.create',
      'store' => 'academy-classes.store',
      'edit' => 'academy-classes.edit',
      'update' => 'academy-classes.update',
      'destroy' => 'academy-classes.destroy',
    ]);

    Route::resource('lessons', Academy\LessonsManagmentController::class)->names([
      'index' => 'academy-lessons',
      'create' => 'academy-lessons.create',
      'store' => 'academy-lessons.store',
      'edit' => 'academy-lessons.edit',
      'update' => 'academy-lessons.update',
      'destroy' => 'academy-lessons.destroy',
    ]);

    Route::resource('sessions', Academy\SessionsManagmentController::class)->names([
      'index' => 'academy-sessions',
      'create' => 'academy-sessions.create',
      'store' => 'academy-sessions.store',
      'edit' => 'academy-sessions.edit',
      'update' => 'academy-sessions.update',
      'destroy' => 'academy-sessions.destroy',
    ]);

    Route::resource('schooling', Academy\SchoolingManagmentController::class)->names([
      'index' => 'academy-schooling',
      'create' => 'academy-schooling.create',
    ]);

  });

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

    Route::resource('list', Thirds\GlobalThirdsController::class)->names([
      'index'=>'thirds-list',
      'create'=>'thirds-new',
      'store'=>'thirds-store',
      'edit'=>'thirds-edit',
      'update'=>'thirds-update',
      'destroy'=>'thirds-destroy',
    ]);

    Route::get('third/switch', [Thirds\GlobalThirdsController::class, 'changeThird'])->name('thirds-switch');
    Route::post('third/affect', [Thirds\GlobalThirdsController::class, 'thirdContactAffect'])->name('thirds-affect');

    Route::resource('prospects', Thirds\ProspectsThirdsController::class)->names([
      'index'=>'thirds-prospects'
    ]);

    Route::resource('clients', Thirds\ClientsThirdsController::class)->names([
      'index'=>'thirds-clients'
    ]);

    Route::resource('suppliers', Thirds\SuppliersThirdsController::class)->names([
      'index'=>'thirds-suppliers'
    ]);

  });

  Route::group(['prefix'=>'contacts','name'=>'contacts'], function(){

    Route::get('/',function(){return redirect('dashboard');})->name('contacts');

    Route::resource('list', Contacts\GlobalContactsController::class)->names([
      'index'=>'contacts-list',
      'create' => 'contacts-new',
      'edit'=>'contacts-edit',
      'update'=>'contacts-update',
      'store' => 'contacts-store',
      'destroy'=>'contacts-destroy'
    ]);

    Route::get('contact/switch', [Contacts\GlobalContactsController::class, 'contactSwitch'])->name('contacts-switch');
    Route::post('contact/affect', [Contacts\GlobalContactsController::class, 'contactThirdAffect'])->name('contacts-affect');

    Route::resource('prospects', Contacts\ProspectsContactsController::class)->names([
      'index'=>'contacts-prospects'
    ]);

    Route::resource('clients', Contacts\ClientsContactsController::class)->names([
      'index'=>'contacts-clients'
    ]);

    Route::resource('suppliers', Contacts\SuppliersContactsController::class)->names([
      'index'=>'contacts-suppliers'
    ]);

  });

  Route::group(['prefix'=>'sales','name'=>'sales'],function(){

    Route::get('/',function(){return redirect('dashboard');})->name('sales');

    Route::resource('clients', Sales\ClientsController::class)->names([
      'index' => 'sales-clients',
      'create' => 'sales-clients.create',
      'store' => 'sales-clients.store'
    ]);

    Route::post('estimate/orders/add', [Sales\EstimatesController::class, "addOrders"])->name('sales-estimates-orders.add');
    Route::get('estimate/orders/items', [Sales\EstimatesController::class, "create"])->name('sales-estimates.items');
    Route::get('estimate/orders/list', [Sales\EstimatesController::class,"getOrders"])->name('sales-estimates-orders.list');
    Route::get('estimate/taxes/list', [Sales\EstimatesController::class,"getTaxes"])->name('sales-estimates-taxes.list');
    Route::delete('estimate/orders/delete', [Sales\EstimatesController::class,"deleteOrders"])->name('sales-estimates-orders.delete');
    Route::delete('estimate/taxes/delete', [Sales\EstimatesController::class,"deleteTaxes"])->name('sales-estimates-taxes.delete');
    Route::post('estimate/total', [Sales\EstimatesController::class, 'setTotal'])->name('sales-estimates.total');
    Route::get('estimate/confirm', [Sales\EstimatesController::class, 'confirm'])->name('sales-estimates.confirm');
    Route::get('estimate/preview',[Sales\EstimatesController::class, 'previewEstimate'])->name('sales-estimates.preview');

    Route::get('estimate/clients/list',[Sales\EstimatesController::class, 'clientsList'])->name('sales-estimates-client.list');
    Route::post('estimate/clients/add',[Sales\EstimatesController::class, 'clientAdd'])->name('sales-estimates-client.add');

    Route::resource('estimates', Sales\EstimatesController::class)->names([
      'index' => 'sales-estimates',
      'create' => 'sales-estimates.create',
      'store' => 'sales-estimates.store',
      'show' => 'sales-estimates.show',
      'edit' => 'sales-estimates.edit',
      'update' => 'sales-estimates.update',
      'destroy' => 'sales-estimates.destroy',
    ]);

    Route::resource('orders', Sales\OrdersController::class)->names([
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

  Route::group(['prefix'=>'contracts','name'=>'contracts'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('contracts');
  });

  Route::group(['prefix'=>'rh','name'=>'rh'], function(){
    Route::get('/',function(){return redirect('dashboard');})->name('rh');

    Route::resource('employees', Rh\EmployeesRhController::class)->names([
      'index'=>'rh-employees',
      'create'=>'rh-employees.create',
      'store'=>'rh-employees.store',
      'show'=>'rh-employees.show',
      'edit'=>'rh-employees.edit',
      'update'=>'rh-employees.update',
      'destroy'=>'rh-employees.destroy',
    ]);

    Route::resource('recruitments', Rh\RecruitmentsRhController::class)->names([
      'index'=>'rh-recruitments'
    ]);

    Route::resource('evaluations', Rh\EvaluationsRhController::class)->names([
      'index'=>'rh-evaluations'
    ]);

    Route::resource('requests', Rh\RequestsRhController::class)->names([
      'index'=>'rh-requests'
    ]);

    Route::resource('expenses', Rh\ExpensesRhController::class)->names([
      'index'=>'rh-expenses'
    ]);

    Route::resource('reports', Rh\ReportsRhController::class)->names([
      'index'=>'rh-reports'
    ]);

  });

  //
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

    Route::resource('companies', System\CompaniesController::class)->names([
      'index' => 'system-companies',
      'create' => 'system-companies.create',
      'store' => 'system-companies.store',
      'edit' => 'system-companies.edit',
      'update' => 'system-companies.update',
      'destroy' => 'system-companies.destroy',
    ]);

    Route::resource('role-permission', System\RolePermissionController::class)->names([
      'index' => 'system-role-permission',
      'create' => 'system-role-permission.create',
      'store' => 'system-role-permission.store',
      'edit' => 'system-role-permission.edit',
      'update' => 'system-role-permission.update',
      'destroy' => 'system-role-permission.destroy'
    ]);

    Route::resource('assign-role', System\AssignRoleController::class)->names([
      'index' => 'system-assign-role',
      'create' => 'system-assign-role.create',
      'store' => 'system-assign-role.store',
      'edit' => 'system-assign-role.edit',
      'update' => 'system-assign-role.update',
      'destroy' => 'system-assign-role.destroy',
    ]);

    Route::resource('currencies', System\CurrenciesController::class)->names([
      'index' => 'system-currencies',
      'create' => 'system-currencies.create',
      'store' => 'system-currencies.store',
    ]);

    Route::resource('mailing-validation', System\MailingValidationController::class)->names([
      'index' => 'system-mailing-validation',
      'create' => 'system-mailing-validation.create',
      'store' => 'system-mailing-validation.store',
    ]);

    Route::resource('agencies', System\AgenciesController::class)->names([
      'index' => 'system-agencies',
      'create' => 'system-agencies.create',
      'store' => 'system-agencies.store',
      'edit' => 'system-agencies.edit',
      'update' => 'system-agencies.update',
      'destroy' => 'system-agencies.destroy',
    ]);

    Route::resource('departments', System\DepartmentsController::class)->names([
      'index' => 'system-departments',
      'create' => 'system-departments.create',
      'store' => 'system-departments.store',
      'edit' => 'system-departments.edit',
      'update' => 'system-departments.update',
      'destroy' => 'system-departments.destroy',
    ]);

    Route::resource('dictionary', System\DictionaryController::class)->names([
      'index'=>'system-dictionary'
    ]);
  });

});







