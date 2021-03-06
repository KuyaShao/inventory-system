<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use Gate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Gate::denies('manage-users')){
            $inventory = Inventory::paginate(10);
            return view('admin.inventories.index',compact('inventory'));
        }
        $inventory = Inventory::paginate(10);
        return view('admin.inventories.index',compact('inventory'));
    }
}
