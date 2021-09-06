@extends('main')
@section('title', 'Order')
@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Order</li>
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
            <br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Material ID</th>
                        <th>Nama Material</th>
                        <th>Colour</th>
                        <th>QTY</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                        <th>PPN 10%</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->colour }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->sub_total }}</td>
                            <td>{{ $item->ppn }}</td>
                            <td>{{ $item->total }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection
