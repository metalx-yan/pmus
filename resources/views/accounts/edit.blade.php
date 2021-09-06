@extends('main')
@section('title', 'Edit Bahan Baku')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Akun</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('account.update', $get->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="name" value="{{ $get->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{ $get->username }}" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Password</label>
                        <input type="text" name="password" value="{{ $get->password }}" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Hak Akses</label>
                        <select name="role_id" id="" class="form-control">
                            @foreach ($role as $ite)
                                <option value="{{ $ite->id }}" {{ $ite->id == $get->role_id ? 'selected' : '' }}>{{ $ite->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('account.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
