<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.admin')
@section('content')
<!-- Begin Page Content -->
<title>Update Alternatif</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Alternatif</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('alternatif/store',[$dataset->id])}}" method="POST">
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
                                Nama Alternatif
                                <input
                                    required
                                    name="nama"
                                    style="text-transform: Capitalize;"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="nama"
                                    value="{{$dataset->nama}}"
                                    placeholder="{{$dataset->nama}}"><br>
                                Kategori
                                <select class="form-control" name="kategori" id="kategori" required>
                                    <option value="{{$dataset->kategori}}"><?php $kat = DB::table('kategori')->where('id',$dataset->kategori)->first()?> {{$kat->nama}}</option>
                                    @foreach($kategori as $k)
                                    <option value="{{$k->id}}">{{$k->nama}}</option>
                                    @endforeach
                                </select><br>
                                Supplier
                                <select class="form-control" name="supplier" id="supplier" required>
                                    <option value="{{$dataset->supplier}}"><?php $sup = DB::table('supplier')->where('id',$dataset->supplier)->first()?> {{$sup->nama}}</option>
                                    @foreach($supplier as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                </select><br>
                                Satuan
                                <select class="form-control" name="satuan" id="satuan" required>
                                    <option value="{{$dataset->satuan}}">{{$dataset->satuan}}</option>
                                    <option value="Box">Box</option>
                                    <option value="Botol">Botol</option>
                                </select><br>
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