<?php

namespace App\Http\Controllers;

class AdminController extends controller
{
    public function index()
    {
        return view("administration.admin");
    }
}
