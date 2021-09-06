@extends('main')
@section('title', 'Edit Bahan Baku')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Bahan Baku</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('bahanbaku.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Kode Bahan</label>
                        <input type="text" name="kode" value="{{ $get->kode }}" class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Bahan Baku</label>
                        <input type="text" name="bahan" value="{{ $get->bahan }}" class="form-control {{ $errors->has('bahan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('bahan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-3">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" value="{{ $get->satuan }}" class="form-control {{ $errors->has('satuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('satuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Jumlah Persediaan</label>
                        <input type="number" name="jumlah" value="{{ $get->jumlah }}" class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('jumlah', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('bahanbaku.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
