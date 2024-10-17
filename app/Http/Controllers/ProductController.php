<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class ProductController extends Controller   
{
    public function __construct()
    {
        $this->middleware(['auth','verified'])->only(['store','create','edit','destroy','update','index']);
 

    }
    public function index()
    {

        $product = Product::latest()->paginate(3);
        return view('product.index', compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        echo ($request);
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,pang,jpg,gifsvg',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destiationPath = 'images/';
            $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destiationPath, $profilImage);
            $input['image'] = "$profilImage";
        }
        Product::create($input);
        return redirect()->route('product.index')
            ->with('success', 'Product added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {


        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destiationPath = 'images/';
            $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destiationPath, $profilImage);
            $input['image'] = "$profilImage";
        } else {
            unset($input['image']);
        }
        $product->update($input);
        return redirect()->route('product.index')
            ->with('success', 'Product update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfuly');
    }


    public function users()
    {
        $products = Product::all();

        // Adding a new field 'double_name' to each product
        $jjj = $products->map(function ($p) {
            $p->name = $p->name. " ". "Alhaeba    "; // Assuming 'name' is a field in the Product model
            return $p;
        });

        return response()->json($products);
    }
}