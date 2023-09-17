<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // requer autenticação
    }

    //
    public function index()
    {
        $this->check_permission('view_products');
        $permissions = Permission::all();

        return view('products.index', compact('permissions'));
    }
}
