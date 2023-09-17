<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // requer autenticação
    }

    //
    public function index()
    {
        $this->check_permission('view_categories');
        $permissions = Permission::all();

        return view('categories.index', compact('permissions'));
    }
}