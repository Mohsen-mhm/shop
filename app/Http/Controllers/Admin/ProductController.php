<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validDate = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'inventory' => ['required', 'numeric'],
        ]);

        if ($request->picture) {
            $imgValidated = $request->validate([
                'picture' => 'file|max:512'
            ]);
            $validDate['picture'] = "/storage/" . Storage::disk('public')->putFile('products', $imgValidated['picture']);
        } else {
            $validDate['picture'] = '';
        }

        Product::create($validDate);

        return redirect(route('admin.products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validDate = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'inventory' => ['required', 'numeric'],
        ]);

        if ($request->picture) {
            $imgValidated = $request->validate([
                'picture' => 'file|max:512'
            ]);
            $validDate['picture'] = "/storage/" . Storage::disk('public')->putFile('products', $imgValidated['picture']);
        } else {
            $validDate['picture'] = '';
        }

        Product::find($id)->update($validDate);

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
