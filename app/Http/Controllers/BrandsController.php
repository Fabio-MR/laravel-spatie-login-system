<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // requer autenticação
    }


    //
    public function index()
    {
        $this->check_permission('view_brands');
        $permissions = Permission::all();

        return view('brands.index', compact('permissions'));
    }
}