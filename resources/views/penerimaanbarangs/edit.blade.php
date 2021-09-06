@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Penerimaan Bahan</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('penerimaanbarang.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Kode Bahan</label>
                        <select name="kode" id="" required class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Kode Bahan</option>
                            @foreach (App\BahanBaku::all() as $item)
                                <option value="{{ str_replace(' ','_',$item->kode) }}" {{ str_replace('_',' ',$get->kode) == $item->kode ? 'selected' : '' }}>{{ $item->kode }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Bahan Baku</label>
                        <select name="bahan" id="" required class="form-control {{ $errors->has('bahan') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Bahan Baku</option>
                            @foreach (App\BahanBaku::all() as $items)
                                <option value="{{ str_replace(' ','_',$items->bahan) }}" {{ str_replace('_',' ',$get->bahan) == $items->bahan ? 'selected' : '' }}>{{ $items->bahan }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('bahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Qty</label>
                        <select name="qty" id="" required class="form-control {{ $errors->has('qty') ? 'is-invalid' : ''}}">
                            <option value="">Pilih Qty</option>
                            @foreach (App\Bpb::all() as $itemss)
                                <option value="{{ str_replace(' ','_',$itemss->qty) }}" {{ str_replace('_',' ',$get->qty) == $itemss->qty ? 'selected' : '' }}>{{ $itemss->qty }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('qty', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" value="{{ $get->satuan }}" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Nama Penerima</label>
                        <input type="text" name="nama" value="{{ $get->nama }}" class="form-control {{ $errors->has('nama') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('nama', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Keterangan OK/TDK</label>
                        <input type="text" name="keterangan" value="{{ $get->keterangan }}" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('penerimaanbarang.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
