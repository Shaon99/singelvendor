<?php

namespace App\Http\Controllers\Backend;

use App\FeaturedProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturedProductsController extends Controller
{
    public function index() {
        $featured_area = FeaturedProduct::first();

        return view('admin.featured-area.featured-area-index', [
            'featured_area' => $featured_area
        ]);
    }

    public function edit() {
        $featured_area = FeaturedProduct::first();

        return view('admin.featured-area.featured-area-edit', [
            'featured_area' => $featured_area
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'product_1' => 'required|numeric',
            'product_2' => 'required|numeric',
            'product_3' => 'required|numeric',
        ]);

        $featured_area = FeaturedProduct::first();

        $featured_area->update([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'product_1' => $request->product_1,
            'product_2' => $request->product_2,
            'product_3' => $request->product_3
        ]);

        return redirect()->route('featured-area.index')->with('success_msg', 'Featured Area Updated Successfully.');
    }
}
