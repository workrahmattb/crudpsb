<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Ambil semua data produk
        return view('welcome', compact('products'));
    }
}
