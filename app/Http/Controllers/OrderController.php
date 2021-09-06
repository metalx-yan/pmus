<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        $data = Order::all();

        return view('orders.pimpinanlaporan',compact('data'));
    }
    public function index()
    {
        $data = Order::all();
        return view('orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all(),$request->bahan);
        $vali = $request->validate([
            'kode' => 'required',
            'supplier' => 'required',
            'po' => 'required',
            'bahan' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        Order::create([
            'kode' => $request->kode,
            'supplier' => $request->supplier,
            'po' => $request->po,
            'bahan' => $request->bahan,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'dpp' => $request->qty * $request->harga,
            'ppn' => ($request->qty * $request->harga)/0.01,
            'total' => ($request->qty * $request->harga)+($request->qty * $request->harga)/0.01,
        ]);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = Order::find($id);
        return view('orders.edit', compact('get'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vali = $request->validate([
            'kode' => 'required',
            'supplier' => 'required',
            'po' => 'required',
            'bahan' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        $update = Order::findOrFail($id);
        $update->kode = $request->kode;
        $update->supplier = $request->supplier;
        $update->po = $request->po;
        $update->bahan = $request->bahan;
        $update->qty = $request->qty;
        $update->satuan = $request->satuan;
        $update->harga = $request->harga;
        $update->dpp = $request->qty * $request->harga;
        $update->ppn = ($request->qty * (($request->harga*0.1)/0.01))/1000;
        $update->total = ($request->qty * $request->harga)+($request->qty * (($request->harga*0.1)/0.01))/1000;
        $update->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Order::find($id);
        $get->delete();

        return redirect()->back();
    }
}
