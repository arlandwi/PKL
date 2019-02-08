<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kepala;

class KepalaController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:kepala');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kepala');
    }
}
