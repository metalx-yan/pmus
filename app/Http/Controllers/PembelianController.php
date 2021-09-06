<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pembelian::all();
        return view('pembelians.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vali = $request->validate([
            'name_office' => 'required',
            'tanggal_invoice' => 'required',
            'no_invoice' => 'required',
            'no_faktur' => 'required',
            'barang' => 'required|integer',
            'ppn' => 'required|integer',
            'pph' => 'required|integer',
            'total' => 'required|integer',
            'no_po' => 'required',
            'nama_barang' => 'required',
        ]);

        Pembelian::create($vali);

        return redirect()->route('pembelian.index');
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
        $get = Pembelian::find($id);
        return view('pembelians.edit', compact('get'));
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
        $request->validate([
            'name_office' => 'required',
            'tanggal_invoice' => 'required',
            'no_invoice' => 'required',
            'no_faktur' => 'required',
            'barang' => 'required|integer',
            'ppn' => 'required|integer',
            'pph' => 'required|integer',
            'total' => 'required|integer',
            'no_po' => 'required',
            'nama_barang' => 'required',
        ]);

        $update = Pembelian::findOrFail($id);
        $update->name_office = $request->name_office;
        $update->tanggal_invoice = $request->tanggal_invoice;
        $update->no_invoice = $request->no_invoice;
        $update->no_faktur = $request->no_faktur;
        $update->barang = $request->barang;
        $update->ppn = $request->ppn;
        $update->pph = $request->pph;
        $update->total = $request->total;
        $update->no_po = $request->no_po;
        $update->nama_barang = $request->nama_barang;
        $update->save();

        return redirect()->route('pembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Pembelian::find($id);
        $get->delete();

        return redirect()->back();
    }
}
