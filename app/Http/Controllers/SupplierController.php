<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
        return view('suppliers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');

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
            'supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'rekening' => 'required',
        ]);

        Supplier::create($vali);

        return redirect()->route('supplier.index');
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
        $get = Supplier::find($id);
        return view('suppliers.edit', compact('get'));
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
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'rekening' => 'required',
        ]);

        $update = Supplier::findOrFail($id);
        $update->kode = $request->kode;
        $update->supplier = $request->supplier;
        $update->alamat = $request->alamat;
        $update->telepon = $request->telepon;
        $update->email = $request->email;
        $update->rekening = $request->rekening;
        $update->save();

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Supplier::find($id);
        $get->delete();

        return redirect()->back();
    }
}
