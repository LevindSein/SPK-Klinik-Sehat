@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Data Kriteria</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Kriteria</h6>
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
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Kode</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Kriteria</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Bobot</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-bordered">
                        @foreach($dataset as $d)
                        <tr>
                            <td class="text-center">{{$d->kode}}</td>
                            <td class="text-center">{{$d->nama}}</td>
                            <td class="text-center">{{$d->bobot}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('kriteria/update',[$d->id])}}">
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
        });
    });
</script>
@endsection