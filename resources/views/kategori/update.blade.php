<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.admin')
@section('content')
<!-- Begin Page Content -->
<title>Kategori Obat</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Kategori Obat</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('kategori/store',[$dataset->id])}}" method="POST">
                            @csrf
                            <div class="autocomplete">
                                Nama Kategori
                                <input
                                    required
                                    name="nama"
                                    style="text-transform: Capitalize;"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="nama"
                                    value="{{$dataset->nama}}"
                                    placeholder="{{$dataset->nama}}">
                            </div><br>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection