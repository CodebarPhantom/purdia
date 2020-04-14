<?php

namespace Anggagewor\Purdia\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $routes = json_decode(json_encode(Route::getRoutes()->get(), true), true);
        return view('purdia::home', compact('routes'));
    }
}
