@extends('main')
@section('title', 'Buat Pembelian')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Pembelian</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
        </div>
        <div class="card-body">
            <form action="{{ route('pembelian.store') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-md-3">
                        <label for="">Kode Supplier</label>
                        <input type="text" name="kode" class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">No PO</label>
                        <input type="text" name="po" class="form-control {{ $errors->has('po') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('po', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Bahan Baku</label>
                        <input type="text" name="bahan" class="form-control {{ $errors->has('bahan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('bahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
<br>
                <div class="row">

                    <div class="col-md-3">
                        <label for="">Qty</label>
                        <input type="number" name="qty" class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('harga', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">DPP</label>
                        <input type="text" name="dpp" class="form-control {{ $errors->has('dpp') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('dpp', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
                <br>
                <div class="row">

                    <div class="col-md-3">
                        <label for="">PPN 10%</label>
                        <input type="text" name="ppn" class="form-control {{ $errors->has('ppn') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('ppn', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Total</label>
                        <input type="number" name="total" class="form-control {{ $errors->has('total') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('total', '<span class="invalid-feedback">:message</span>') !!}
                    </div>


                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('pembelian.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
