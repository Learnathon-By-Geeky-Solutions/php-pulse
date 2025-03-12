<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where('is_approved', 1)
            ->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return $dataTable->render('admin.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required', 'date'] // Ensure the end_date is a valid date
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Updated Successfully!', 'success', 'Success');

        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required', 'unique:flash_sale_items,product_id'],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ], [
            'product.unique' => 'The product is already in flash sale!'
        ]);

        // Ensure flash sale exists before adding a product
        $flashSaleDate = FlashSale::first();
        if (!$flashSaleDate) {
            return redirect()->back()->withErrors(['flash_sale' => 'No flash sale found. Create one first.']);
        }

        FlashSaleItem::create([
            'product_id' => $request->product,
            'flash_sale_id' => $flashSaleDate->id,
            'show_at_home' => $request->show_at_home,
            'status' => $request->status,
        ]);

        toastr('Product Added Successfully!', 'success', 'Success');

        return redirect()->back();
    }

    public function chageShowAtHomeStatus(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->status === 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response()->json(['message' => 'Status has been updated!']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request->status === 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response()->json(['message' => 'Status has been updated!']);
    }

    public function destroy(string $id)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();

        return response()->json(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
