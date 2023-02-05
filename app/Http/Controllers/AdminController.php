<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        
        return view('admin.index', $data);
    }
}

