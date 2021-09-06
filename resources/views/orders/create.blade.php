@extends('main')
@section('title', 'Buat Order')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Order</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">
        </div>
        <div class="card-body">
            <form action="{{ route('order.store') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-md-3">
                        <label for="">Kode Supplier</label>
                        <select name="kode" id="" required class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Kode Bahan</option>
                            @foreach (App\Supplier::all() as $item)
                                <option value="{{ str_replace(' ','_',$item->kode) }}">{{ $item->kode }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Supplier</label>
                        <select name="supplier" id="" required class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Supplier</option>
                            @foreach (App\Supplier::all() as $items)
                                <option value="{{ str_replace(' ','_',$items->supplier) }}">{{ $items->supplier }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">No PO</label>
                        <input type="text" name="po" class="form-control {{ $errors->has('po') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('po', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Bahan Baku</label>
                        <select name="bahan" id="" required class="form-control {{ $errors->has('bahan') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Bahan Baku</option>
                            @foreach (App\BahanBaku::all() as $itemss)
                                <option value="{{ str_replace(' ','_',$itemss->bahan) }}">{{ $itemss->bahan }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('bahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>
<br>
                <div class="row">

                    <div class="col-md-3">
                        <label for="">Qty</label>
                        <select name="qty" id="" required class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Qty</option>
                            @foreach (App\Bpb::all() as $itemss)
                                <option value="{{ $itemss->qty }}">{{ $itemss->qty }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('harga', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('order.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
