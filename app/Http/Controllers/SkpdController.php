<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skpd;

class SkpdController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:skpd');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skpd');
    }

    public function pengaduan()
    {
        return view('post.pengaduanSkpd');
    }
}
