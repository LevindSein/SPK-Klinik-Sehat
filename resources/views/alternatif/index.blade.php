@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Data Alternatif</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
            <div>
                <a 
                    href="#" 
                    data-toggle="modal"
                    data-target="#myModal"
                    type="submit" 
                    class="btn btn-sm btn-success">
                    <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Alternatif</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table
                    class="table"
                    id="tableAlternatif"
                    width="100%"
                    cellspacing="0"
                    style="font-size:0.75rem;">
                    <thead class="table-bordered">
                        <tr>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Kode</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Nama</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Kategori</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Supplier</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Satuan</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-bordered">
                        @foreach($dataset as $d)
                        <tr>
                            <td class="text-center">{{$d->kode}}</td>
                            <td class="text-center">{{$d->nama}}</td>
                            <td class="text-center">{{$d->kat_nama}}</td>
                            <td class="text-center">{{$d->sup_nama}}</td>
                            <td class="text-center">{{$d->satuan}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('alternatif/update',[$d->id])}}">
                                    <i class="fas fa-edit fa-sm"></i></a>
                                &nbsp;
                                <a
                                    href="{{url('alternatif/delete',[$d->id])}}">
                                    <i class="fas fa-trash fa-sm"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div
    class="modal fade"
    id="myModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="{{url('alternatif/add')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        Nama
                        <input
                            required="required"
                            type="text"
                            style="text-transform: capitalize;"
                            name="alternatif"
                            class="form-control form-control-user"
                            id="alternatif"
                            placeholder="Nama Obat">
                    </div>
                    <div class="form-group">
                        Kategori
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="">None</option>
                            @foreach($kategori as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Supplier
                        <select class="form-control" name="supplier" id="supplier" required>
                            <option value="">None</option>
                            @foreach($supplier as $s)
                            <option value="{{$s->id}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Satuan
                        <select class="form-control" name="satuan" id="satuan" required>
                            <option value="">None</option>
                            <option value="Box">Box</option>
                            <option value="Botol">Botol</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(
            '#tableAlternatif'
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