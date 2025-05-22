<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Revenue;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = Revenue::orderBy('date', 'desc')->get();
        return view('revenues.index', compact('revenues'));
    }

    public function create()
    {
        return view('revenues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        Revenue::create($request->all());
        return redirect()->route('revenues.index')->with('success', 'Thêm doanh thu thành công!');
    }
}