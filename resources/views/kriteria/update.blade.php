<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.admin')
@section('content')
<!-- Begin Page Content -->
<title>Bobot Kriteria</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Bobot Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('kriteria/store',[$dataset->id])}}" method="POST">
                            @csrf
                            <div class="autocomplete">
                                Kode
                                <input
                                    readonly
                                    name="kode"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="kode"
                                    value="{{$dataset->kode}}"
                                    placeholder="{{$dataset->kode}}"><br>
                                Kriteria
                                <input
                                    readonly
                                    name="kriteria"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="kriteria"
                                    value="{{$dataset->nama}}"
                                    placeholder="{{$dataset->nama}}"><br>
                                Bobot (1-5)
                                <input
                                    required
                                    name="bobot"
                                    min="1"
                                    max="5"
                                    type="number"
                                    class="form-control form-control-user"
                                    id="bobot"
                                    value="{{$dataset->bobot}}"
                                    placeholder="{{$dataset->bobot}}">
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