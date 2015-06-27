<?php

namespace Fuellog\Http\Controllers;

use Illuminate\Http\Request;
use Fuellog\Http\Requests;
use Fuellog\Http\Controllers\Controller;
use Auth;
use Fuellog\Vehicle;

class PagesController extends Controller
{
    public function home()
    {
        if (Auth::guest()) {
            return $this->showLandingpage();
        }


        return $this->showDashboard();
    }

    protected function showLandingpage()
    {
        return view('landingpage');
    }

    protected function showDashboard()
    {
        $vehicles = Vehicle::allowed()->get();
        return view('dashboard', compact('vehicles'));
    }
}
