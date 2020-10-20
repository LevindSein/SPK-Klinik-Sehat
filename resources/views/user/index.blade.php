@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Data Pengguna</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
            <div>
                <a 
                    href="#" 
                    data-toggle="modal"
                    data-target="#myModal"
                    type="submit" 
                    class="btn btn-sm btn-success">
                    <i class="fas fa-fw fa-plus fa-sm text-white-50"></i> Pengguna</a>
            </div>
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
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Username</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Role</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-bordered">
                        @foreach($dataset as $d)
                        <tr>
                            <td class="text-center">{{$d->username}}</td>
                            <td class="text-center">{{$d->role}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('#')}}">
                                    <i class="fas fa-edit fa-sm"></i></a>
                                &nbsp;
                                <a
                                    href="{{url('user/reset',[$d->id])}}">
                                    <i class="fas fa-key"></i></a>
                                &nbsp;
                                <a
                                    href="{{url('user/delete',[$d->id])}}">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="user" action="{{url('user/add')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        Nama
                        <input
                            required="required"
                            type="text"
                            name="nama"
                            class="form-control form-control-user"
                            id="nama"
                            placeholder="Nama Pengguna">
                    </div>
                    <div class="form-group">
                        Role
                        <select class="form-control" name="role" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="dokter">Dokter</option>
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

<script>
$("input#nama").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
</script>
@endsection