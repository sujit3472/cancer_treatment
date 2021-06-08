<?php

namespace App\Http\Controllers;

use App\Model\CancerType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arrCancerType = CancerType::get()->pluck('name', 'id')->toArray();
        return view('frontend.patient-enquiry', compact('arrCancerType'));
    }
}
