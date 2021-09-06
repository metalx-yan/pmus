@extends('main')
@section('title', 'BPB')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">BPB</li>
            </ol>
        </div>
    </div>

    <div class="card">
        <div class="card-title">

        </div>
        @php
            $no = 1;
        @endphp
        <div class="card-body">
            <a href="{{ route('bpb.create') }}" class="btn btn-primary btn-sm">Tambah BPB</a>
            <br>
            <br>
            <table class="table border" id="myTable" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Bahan</th>
                        <th>Bahan Baku</th>
                        <th>Sisa Di Gudang</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ str_replace('_',' ',$item->kode) }}</td>
                            <td>{{ str_replace('_', ' ',$item->bahan) }}</td>
                            <td>{{ $item->sisa }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="{{ route('bpb.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('bpb.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> --}}

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                // dom: 'Bfrtip',
                // buttons: [
                //     'print'
                // ],
                // "scrollX": true
            });
        } );
    </script>

@endsection
