<?php

namespace App\Http\Controllers\Factory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function __construct()
    {}
    
    public function index()
    {
        return view('factory/training/register');
    }
}
