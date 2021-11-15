<?php
namespace App\Models;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FormElementController;

Route::get('template/devis',function(){
    return view('sales.estimates.createe');
  });
  //Dashboard Routes
  
  /* Route::get("testing/cat", function(){
    $categories = Categories::get();
    $categories = RolePermissionRessources::collection($categories);
    return $categories;
  });
  Route::get('/testing',function(){
  
    $accesses  = User::where('id', Auth::id())->first()->userRole->role->access;
  
    $menu = array();
  
    foreach ($accesses as $access) {
  
        //$cat = Categories::where("id",$access->categories_id)->pluck("id")->first();
  
        $permissions = User::where("id", Auth::id())->first()->userRole->role->permissions;
  
        $submenu = array();
  
        foreach ($permissions as $permission) {
  
        $subcat = SubCategories::select("title","link","icon","categories_id")->where("id",$permission->sub_categories_id)->first();
        
        if($subcat->categories_id === $access->categories_id){
            array_push($submenu, [
            "title" => $subcat->title,
            "link" => $subcat->link,
            "icon" => $subcat->icon,
            ]);
        };
  
        }
  
        $category = Categories::select("title", "link","icon")->where("id",$access->categories_id)->first();
  
        array_push($menu, [
        "title" => $category->title,
        "link" => $category->link,
        "icon" => $category->icon,
        "submenu" => ($submenu != [])?$submenu:null,
        ]);
  
    }
  
    return $menu;
  }); */
  
  /* Route::get('/password',function(){
    return Hash::make('123456');
  });
  
  Route::get('/list',function(){
    $clients = User::get();
    return $clients;
  }); */

  Route::get('session',function(){
    return Session::all();
  });

//Route::get('/', [DashboardController::class, 'index'])->name('dashboard-1');
Route::get('/dashboard-2', [DashboardController::class, 'dashboardTwo'])->name('dashboard-2');
Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
Route::get('/tracking', [DashboardController::class, 'tracking'])->name('tracking');
Route::get('/web-analytics', [DashboardController::class, 'webAnalytics'])->name('web-analytics');
Route::get('/patient', [DashboardController::class, 'patientDashboard'])->name('patient');
Route::get('/ticket-booking', [DashboardController::class, 'ticketBooking'])->name('ticket-booking');

Route::get('/recover-password', [AuthenticationController::class, 'recoverPassword'])->name('recover-password');
Route::get('/confirm-email', [AuthenticationController::class, 'confirmEmail'])->name('confirm-email');
Route::get('/lock-screen', [AuthenticationController::class, 'lockScreen'])->name('lock-screen');

//UI elements
Route::get('/ui-color', [UIElementController::class, 'color'])->name('ui-color');
Route::get('/ui-typography', [UIElementController::class, 'typography'])->name('ui-typography');
Route::get('/ui-alert', [UIElementController::class, 'alert'])->name('ui-alert');
Route::get('/ui-badges', [UIElementController::class, 'badges'])->name('ui-badges');
Route::get('/ui-breadcrumb', [UIElementController::class, 'breadCrumb'])->name('ui-breadcrumb');
Route::get('/ui-button', [UIElementController::class, 'button'])->name('ui-button');
Route::get('/ui-card', [UIElementController::class, 'card'])->name('ui-card');
Route::get('/ui-carousel', [UIElementController::class, 'carousel'])->name('ui-carousel');
Route::get('/ui-video', [UIElementController::class, 'video'])->name('ui-video');
Route::get('/ui-grid', [UIElementController::class, 'grid'])->name('ui-grid');
Route::get('/ui-images', [UIElementController::class, 'images'])->name('ui-images');
Route::get('/ui-listgroup', [UIElementController::class, 'listGroup'])->name('ui-listgroup');
Route::get('/ui-media', [UIElementController::class, 'medai'])->name('ui-media');
Route::get('/ui-modal', [UIElementController::class, 'modal'])->name('ui-modal');
Route::get('/ui-notifications', [UIElementController::class, 'notifications'])->name('ui-notifications');
Route::get('/ui-pagination', [UIElementController::class, 'pagination'])->name('ui-pagination');
Route::get('/ui-popovers', [UIElementController::class, 'popovers'])->name('ui-popovers');
Route::get('/ui-progressbars', [UIElementController::class, 'progressbars'])->name('ui-progressbars');
Route::get('/ui-tabs', [UIElementController::class, 'tabs'])->name('ui-tabs');
Route::get('/ui-tooltips', [UIElementController::class, 'tooltips'])->name('ui-tooltips');

//form elements
Route::get('/form-layout', [FormElementController::class, 'formLayout'])->name('form-layout');
Route::get('/form-validation', [FormElementController::class, 'formValidation'])->name('form-validation');
Route::get('/form-switch', [FormElementController::class, 'formSwitch'])->name('form-switch');
Route::get('/form-chechbox', [FormElementController::class, 'formChechbox'])->name('form-chechbox');
Route::get('/form-radio', [FormElementController::class, 'formRadio'])->name('form-radio');
Route::get('/form-wizard', [FormElementController::class, 'formWizard'])->name('form-wizard');
Route::get('/validate-wizard', [FormElementController::class, 'formValidateWizard'])->name('validate-wizard');
Route::get('/vertical-wizard', [FormElementController::class, 'formVerticalWizard'])->name('vertical-wizard');

//calnder chat  todo routes
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/chat', [CalendarController::class, 'chat'])->name('chat');
Route::get('/todo', [CalendarController::class, 'todo'])->name('todo');

//Table
Route::get('/e-commerce', [EcommerceController::class, 'index'])->name('e-commerce');
Route::get('/e-commerce/checkout', [EcommerceController::class, 'checkOut'])->name('checkout');
Route::get('/e-commerce/product-detail', [EcommerceController::class, 'productDetail'])->name('productDetail');

Route::get('/basic-table', [TableController::class, 'basicTable'])->name('basic-table');
Route::get('/data-table', [TableController::class, 'dataTable'])->name('data-table');
Route::get('/edit-table', [TableController::class, 'editTable'])->name('edit-table');

//Chart
Route::get('/chart-morris', [ChartController::class, 'chartMorris'])->name('chart-morris');
Route::get('/chart-high', [ChartController::class, 'chartHigh'])->name('chart-high');
Route::get('/chart-am', [ChartController::class, 'chartAm'])->name('chart-am');
Route::get('/chart-apex', [ChartController::class, 'chartApex'])->name('chart-apex');

//Icon
Route::get('/icon-dripicons', [IconController::class, 'dripicons'])->name('icon-dripicons');
Route::get('/icon-fontawesome', [IconController::class, 'fontAwesome'])->name('icon-fontawesome');
Route::get('/icon-lineawesome', [IconController::class, 'lineAwesome'])->name('icon-lineawesome');
Route::get('/icon-remixicon', [IconController::class, 'remixicon'])->name('icon-remixicon');
Route::get('/icon-unicons', [IconController::class, 'unicons'])->name('icon-unicons');

//ExtraPages
Route::get('/timeline', [ExtraPagesController::class, 'timeline'])->name('timeline');
Route::get('/invoice', [ExtraPagesController::class, 'invoice'])->name('invoice');
Route::get('/blank-pages', [ExtraPagesController::class, 'blankPages'])->name('blank-pages');
Route::get('/error-400', [ExtraPagesController::class, 'error400'])->name('error-400');
Route::get('/error-500', [ExtraPagesController::class, 'error500'])->name('error-500');
Route::get('/pricing', [ExtraPagesController::class, 'pricing'])->name('pricing');
Route::get('/pricing-one', [ExtraPagesController::class, 'pricingOne'])->name('pricing-one');
Route::get('/maintenance', [ExtraPagesController::class, 'maintenance'])->name('maintenance');
Route::get('/comingsoon', [ExtraPagesController::class, 'commingSoon'])->name('comingsoon');
Route::get('/faq', [ExtraPagesController::class, 'faq'])->name('faq');

//Map
Route::get('/google-map', [MapController::class, 'googleMap'])->name('google-map');

//email
Route::get('/mail', [MailController::class, 'mail'])->name('mail');
Route::get('/compose-mail', [MailController::class, 'composeMail'])->name('compose-mail');

//User
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/profile-edit', [UserController::class, 'profileEdit'])->name('profile_edit');
Route::get('/add-user', [UserController::class, 'addUser'])->name('add_user');
Route::get('/user-list', [UserController::class, 'userList'])->name('user_list');

//Setting
Route::get('/account-settings', [SettingController::class, 'accountSetting'])->name('account_settings');
Route::get('/privacy-settings', [SettingController::class, 'privacySetting'])->name('privacy_settings');
Route::get('/privacy-policy', [SettingController::class, 'privacyPolicy'])->name('privacy_policy');
Route::get('/terms-of-service', [SettingController::class, 'termsService'])->name('terms_of_service');