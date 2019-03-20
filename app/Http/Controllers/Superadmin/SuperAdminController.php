<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\SuperAdmin;
use App\Model\Buyer;
use App\Model\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellers = Seller::all();
        $buyers = Buyer::all();
        return view('superadmin.index', compact('sellers', 'buyers'));
    }

}
