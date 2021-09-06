@extends('main')
@section('title', 'Edit Transaksi')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Transaksi</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kode Supploer</label>
                        <select name="kode" id="" required class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Kode Supplier</option>
                            @foreach (App\Supplier::all() as $items)
                                <option value="{{ str_replace(' ','_',$items->kode) }}" {{ str_replace('_',' ',$get->kode) == $items->kode ? 'selected' : '' }}>{{ $items->kode }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        <select name="supplier" id="" required class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Supplier</option>
                            @foreach (App\Supplier::all() as $itemss)
                                <option value="{{ str_replace(' ','_',$itemss->supplier) }}" {{ str_replace('_',' ',$get->supplier) == $itemss->supplier ? 'selected' : '' }}>{{ $itemss->supplier }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Tgl Invoice</label>
                        <input type="date" name="tgl_invoice" value="{{ $get->tgl_invoice }}" class="form-control {{ $errors->has('tgl_invoice') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tgl_invoice', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">No Invoice</label>
                        <input type="text" name="no_invoice" value="{{ $get->no_invoice }}" class="form-control {{ $errors->has('no_invoice') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('no_invoice', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Tgl Terima Invoice</label>
                        <input type="date" name="tgl_terima_invoice" value="{{ $get->tgl_terima_invoice }}" class="form-control {{ $errors->has('tgl_terima_invoice') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tgl_terima_invoice', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">No Faktur Pajak</label>
                        <input type="number" name="pajak" value="{{ $get->pajak }}" class="form-control {{ $errors->has('pajak') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('pajak', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">DPP</label>
                        <input type="number" name="dpp" value="{{ $get->dpp }}" class="form-control {{ $errors->has('dpp') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('dpp', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" value="{{ $get->keterangan }}" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
