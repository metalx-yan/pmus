<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bpb;

class BpbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bpb::all();
        return view('bpbs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bpbs.create');
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
            'kode' => 'required',
            'bahan' => 'required',
            'sisa' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);

        Bpb::create($vali);

        return redirect()->route('bpb.index');
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
        $get = Bpb::find($id);
        return view('bpbs.edit', compact('get'));
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
            'bahan' => 'required',
            'sisa' => 'required',
            'qty' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);

        $update = Bpb::findOrFail($id);
        $update->kode = $request->kode;
        $update->bahan = $request->bahan;
        $update->sisa = $request->sisa;
        $update->qty = $request->qty;
        $update->satuan = $request->satuan;
        $update->keterangan = $request->keterangan;
        $update->save();

        return redirect()->route('bpb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Bpb::find($id);
        $get->delete();

        return redirect()->back();
    }
}
