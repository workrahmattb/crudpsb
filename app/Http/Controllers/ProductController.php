<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // This method will show products page
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(3);

        return view('products.list', [
            'products' => $products
        ]);
    }

    // This method will show create product page
    public function create()
    {
        return view('products.create');
    }

    // This method will store a product in db
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',

        ];

        //if ($request->image != "") {
        //    $rules['image'] = 'image';
        //}

        //if ($request->image2 != "") {
        //    $rules['image2'] = 'image2';
        //}

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ], [
            'name.required' => 'Silahkan Masukkan Nama Produk',
            'sku.required' => 'Silahkan Masukkan SKU Produk',
            'price.required' => 'Silahkan Masukkan Harga Produk',
            'image.required' => 'Silahkan Upload Bukti Bayar Formulir Pendaftaran',
            'image.image' => 'Silahkan Upload File Gambar Bukti Bayar Formulir Pendaftaran',
            'image.mimes' => 'Silahkan Upload type jpeg, png, jpg, pdf',
            'image.max' => 'File terlalu besar atau kecil, silahkan upload file dengan ukuran maksimal 1MB',
            'image2.required' => 'Silahkan Upload Bukti Bayar Formulir Pendaftaran',
            'image2.image' => 'Silahkan Upload File Gambar Bukti Bayar Formulir Pendaftaran',
            'image2.mimes' => 'Please upload an image of type jpeg, png, jpg, gif, svg',
            'image2.max' => 'File terlalu besar atau kecil, silahkan upload file dengan ukuran maksimal 1MB',
        ]);


        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        // here we will insert product in db
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        //image2
        if ($request->image2 != "") {
            // here we will store image
            $image2 = $request->image2;
            $ext = $image2->getClientOriginalExtension();
            $image2Name = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image2->move(public_path('uploads/products'), $image2Name);

            // Save image name in database
            $product->image2 = $image2Name;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    // This method will show edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    // This method will update a product
    public function update($id, Request $request)
    {

        $product = Product::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
        }

        // here we will update product
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {

            // delete old image
            File::delete(public_path('uploads/products/' . $product->image));

            // here we will store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // This method will delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete image
        File::delete(public_path('uploads/products/' . $product->image));

        // delete product from database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
