<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.admin')
@section('content')
<!-- Begin Page Content -->
<title>Supplier Obat</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Supplier Obat</h6>
            <div>
                <a 
                    href="#" 
                    data-toggle="modal"
                    data-target="#myModal"
                    type="submit" 
                    class="btn btn-sm btn-success">
                    <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Supplier</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table
                    class="table"
                    id="tableSupplier"
                    width="100%"
                    cellspacing="0"
                    style="font-size:0.75rem;">
                    <thead class="table-bordered">
                        <tr>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Supplier Obat</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Alamat</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">No.hp</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Banyak Obat</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-bordered">
                        @foreach($dataset as $d)
                        <?php
                        $jumlah = DB::table('alternatif')->where('supplier',$d->id)->count();
                        ?>
                        <tr>
                            <td class="text-center">{{$d->nama}}</td>
                            <td class="text-center">{{$d->alamat}}</td>
                            <td class="text-center">{{$d->no_hp}}</td>
                            <td class="text-center">{{$jumlah}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('supplier/update',[$d->id])}}">
                                    <i class="fas fa-edit fa-sm"></i></a>
                                @if($jumlah == 0)
                                &nbsp;
                                <a
                                    href="{{url('supplier/delete',[$d->id])}}">
                                    <i class="fas fa-trash fa-sm"></i></a>
                                @endif
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="{{url('supplier/add')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        Nama
                        <input
                            required="required"
                            type="text"
                            style="text-transform: capitalize;"
                            name="nama"
                            maxlength="20"
                            class="form-control form-control-user"
                            id="nama"
                            placeholder="Nama Farmasi"><br>
                        Alamat
                        <input
                            required="required"
                            type="text"
                            style="text-transform: capitalize;"
                            name="alamat"
                            maxlength="25"
                            class="form-control form-control-user"
                            id="alamat"
                            placeholder="Tangerang, Banten"><br>
                        No.hp
                        <input
                            required="required"
                            type="tel"
                            name="no_hp"
                            maxlength="13"
                            class="form-control form-control-user"
                            id="no_hp"
                            placeholder="0878xxxx">
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
            '#tableSupplier'
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
<script>
$('[type=tel]').on('change', function(e) {
  $(e.target).val($(e.target).val().replace(/[^\d\.]/g, ''))
})
$('[type=tel]').on('keypress', function(e) {
  keys = ['0','1','2','3','4','5','6','7','8','9','.']
  return keys.indexOf(event.key) > -1
})
</script>
@endsection