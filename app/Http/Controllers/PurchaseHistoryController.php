<?php
namespace App\Http\Controllers;

use App\Models\PurchaseHistory;

class PurchaseHistoryController extends Controller
{
    public function index()
    {
        $histories = PurchaseHistory::orderBy('purchase_date', 'desc')->get();
        return view('purchase_histories.index', compact('histories'));
    }
}