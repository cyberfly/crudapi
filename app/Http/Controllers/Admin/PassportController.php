<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PassportController extends AdminController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.passports.index');
    }
}
