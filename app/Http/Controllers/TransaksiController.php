<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
        return view('transaksis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $vali = $request->validate([
        //     'kode' => 'required',
        //     'supplier' => 'required',
        //     'tgl_invoice' => 'required',
        //     'no_invoice' => 'required',
        //     'tgl_terima_invoice' => 'required',
        //     'pajak' => 'required',
        //     'dpp' => 'required',
        //     'keterangan' => 'required'
        // ]);

        Transaksi::create([
            'kode' => $request->kode,
            'supplier' => $request->supplier,
            'tgl_invoice' => $request->tgl_invoice,
            'no_invoice' => $request->no_invoice,
            'tgl_terima_invoice' => $request->tgl_terima_invoce,
            'pajak' => $request->pajak,
            'dpp' => $request->dpp,
            'ppn' => $request->dpp * 0.1,
            'total' => $request->dpp + ($request->dpp * 0.1),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index');
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
        $get = Transaksi::find($id);
        return view('transaksis.edit', compact('get'));
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
        // dd($request->all());
        // $vali = $request->validate([
        //     'kode' => 'required',
        //     'supplier' => 'required',
        //     'tgl_invoice' => 'required',
        //     'no_invoice' => 'required',
        //     'tgl_terima_invoice' => 'required',
        //     'pajak' => 'required',
        //     'dpp' => 'required',
        //     'keterangan' => 'required',
        // ]);

        $update = Transaksi::findOrFail($id);
        $update->kode = $request->kode;
        $update->supplier = $request->supplier;
        $update->tgl_invoice = $request->tgl_invoice;
        $update->no_invoice = $request->no_invoice;
        $update->tgl_terima_invoice = $request->tgl_terima_invoice;
        $update->pajak = $request->pajak;
        $update->dpp = $request->dpp;
        $update->ppn = $request->dpp * 0.1;
        $update->total = $request->dpp + ($request->dpp * 0.1);
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Transaksi::find($id);
        $get->delete();

        return redirect()->back();
    }
}
