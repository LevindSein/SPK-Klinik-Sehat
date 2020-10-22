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
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Supplier Obat</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('supplier/store',[$dataset->id])}}" method="POST">
                            @csrf
                            <div class="autocomplete">
                                Nama Supplier
                                <input
                                    required
                                    name="nama"
                                    style="text-transform: uppercase;"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="nama"
                                    value="{{$dataset->nama}}"
                                    placeholder="{{$dataset->nama}}"><br>
                                Alamat
                                <input
                                    required
                                    type="text"
                                    style="text-transform: capitalize;"
                                    name="alamat"
                                    maxlength="25"
                                    class="form-control form-control-user"
                                    id="alamat"
                                    value="{{$dataset->alamat}}"
                                    placeholder="{{$dataset->alamat}}"><br>
                                No.hp
                                <input
                                    required
                                    type="tel"
                                    name="no_hp"
                                    maxlength="13"
                                    class="form-control form-control-user"
                                    id="no_hp"
                                    value="{{$dataset->no_hp}}"
                                    placeholder="{{$dataset->no_hp}}">
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

@section('js')
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