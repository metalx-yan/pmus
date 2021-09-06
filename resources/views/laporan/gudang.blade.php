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
            <br>
            <table class="table border" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Supplier</th>
                        <th>No PO</th>
                        <th>Bahan Baku</th>
                        <th>QTY</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>DPP (qty * harga)</th>
                        <th>PPN 10% (qty * harga*10%)</th>
                        <th>Total ((qty * harga) + (qty * harga*10%))</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ str_replace('_',' ',$item->kode) }}</td>
                            <td>{{ str_replace('_',' ',$item->supplier) }}</td>
                            <td>{{ $item->po }}</td>
                            <td>{{ str_replace('_',' ',$item->bahan) }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->dpp }}</td>
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
            $('#myTable').DataTable({
                "scrollX" : true
            });
        } );
    </script>

@endsection
