@extends('main')
@section('title', 'Tambah Akun')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Tambah Akun</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
            <form action="{{ route('account.store' ) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('username', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-3">
                        <label for="">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="">Verify Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Hak Akses</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">Pilih Hak Akses</option>
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
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
