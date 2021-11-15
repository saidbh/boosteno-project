<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SystemController extends Controller
{
    public function index()
    {
        return view('system.index');
    }

    public function companies()
    {

        return view('system.companies');
    }

    /* public function rolesPermission()
    {
        $rolesList = Roles::get();
        return view('system.role-permission', compact('rolesList'));
    } */

    public function assignRole()
    {
        return view('system.assign-role');
    }

    public function mailngValidation()
    {
        return view('system.mailing-validation');
    }

    public function devise()
    {
        return view('system.devise');
    }
}
