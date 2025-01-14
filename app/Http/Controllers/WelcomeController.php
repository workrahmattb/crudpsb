<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::orderBy('created_at', 'DESC')->paginate(50);
        return view('welcome', compact('pendaftarans'));
    }
}
