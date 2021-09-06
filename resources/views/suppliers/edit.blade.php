@extends('main')
@section('title', 'Edit Supplier')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Supplier</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Kode Supplier</label>
                        <input type="text" name="kode" value="{{ $get->kode }}" class="form-control {{ $errors->has('kode') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('kode', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" value="{{ $get->supplier }}" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('supplier', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Alamat Supplier</label>
                        <input type="text" name="alamat" value="{{ $get->alamat }}" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('alamat', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">No. Telepon</label>
                        <input type="text" name="telepon" value="{{ $get->telepon }}" class="form-control {{ $errors->has('telepon') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('telepon', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Email</label>
                        <input type="text" name="email" value="{{ $get->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('email', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">No. Rekening</label>
                        <input type="text" name="rekening" value="{{ $get->rekening }}" class="form-control {{ $errors->has('rekening') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('rekening', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
