<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        return view('Dashboard.index');
    }
    
    /* function dashboardTwo(){
        return view('Dashboard.dashboard_two');
    }
    function analytics(){
        return view('Dashboard.analytics');
    }
    function tracking(){
        return view('Dashboard.tracking');
    }
    function webAnalytics(){
        return view('Dashboard.web-analytics');
    }
    function patientDashboard(){
        return view('Dashboard.patient-dashboard');
    }
    function ticketBooking(){
        return view('Dashboard.ticket-booking');
    } */
   
}
