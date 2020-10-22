<?php
$role = Session::get('role');
?>

@php
    $view = '';
    if ($role == 'master') {
        $view = 'layout.master';
    } 
    else if($role == 'admin'){
        $view = 'layout.admin';
    }
    else{
        $view = 'layout.dokter';
    }
@endphp

@extends($view)
@section('content')
<!-- Begin Page Content -->
<title>Data Nilai</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Nilai</h6>
        </div>
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-start">
            <form class="user" action="{{url('nilai')}}" method="GET">
                <div class="form-group" style="display:inline-block">
                    <select class="form-control btn-sm" name="kategori" id="kategori" required>
                        <option value="">{{$name}}</option>
                        @foreach($kategori as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                    <input style="display:none" name="id" value="1">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table
                    class="table"
                    id="tableKriteria"
                    width="100%"
                    cellspacing="0"
                    style="font-size:0.75rem;">
                    <thead class="table-bordered">
                        <tr>
                            <th style="background-color:rgba(255, 212, 71, 0.2);" rowspan="2">Nama Obat</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);" rowspan="2">Satuan</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);" rowspan="2">Supplier</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);" colspan="5">Nilai Kriteria</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);" rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th style="background-color:rgba(50, 212, 71, 0.2);">Khasiat</th>
                            <th style="background-color:rgba(212, 50, 212, 0.2);">E.Samping</th>
                            <th style="background-color:rgba(50, 71, 212, 0.2);">Garansi</th>
                            <th style="background-color:rgba(212, 50, 212, 0.2);">Merk</th>
                            <th style="background-color:rgba(50, 212, 71, 0.2);">Harga</th>
                        </tr>
                    </thead>

                    <tbody class="table-bordered">
                        @foreach($dataset as $d)
                        <?php 
                        $supplier = DB::table('supplier')->where('id',$d->supplier)->select('nama')->first();
                        ?>
                        <tr>
                            <td class="text-center">{{$d->nama}}</td>
                            <td class="text-center">{{$d->satuan}}</td>
                            <td class="text-center">{{$supplier->nama}}</td>
                            <td class="text-center">{{$d->khasiat}}</td>
                            <td class="text-center">{{$d->efek}}</td>
                            <td class="text-center">{{$d->garansi}}</td>
                            <td class="text-center">{{$d->merk}}</td>
                            <td class="text-center">{{$d->harga}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('nilai/update',[$d->id])}}">
                                    <i class="fas fa-edit fa-sm"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(
            '#tableKriteria'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "fixedColumns":   {
                "leftColumns": 3,
                "rightColumns": 1,
            },
            "scrollCollapse": true,
        });
    });
</script>
@endsection