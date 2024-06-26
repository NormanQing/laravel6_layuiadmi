<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function layout()
    {
        $admin = Auth::guard('backend')->user();
        return view('backend.layout',compact('admin'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.index.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index1()
    {
        return view('backend.index.index1');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index2()
    {
        return view('backend.index.index2');
    }

}
