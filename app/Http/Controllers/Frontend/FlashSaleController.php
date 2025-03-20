<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;


class FlashSaleController extends Controller
{
    public function index()
{
    $flashSaleDate = FlashSale::first(); // Get first flash sale record

    // Ensure that $flashSaleDate exists before accessing its properties
    $flashSaleItems = $flashSaleDate ? 
        FlashSaleItem::where('flash_sale_id', $flashSaleDate->id)
                     ->where('status', 1)
                     ->orderBy('id', 'ASC')
                     ->pluck('product_id')
                     ->toArray() 
        : [];

    return view('frontend.pages.flash-sale', compact('flashSaleDate', 'flashSaleItems'));
}

}
