@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Update Penilaian Alternatif</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Penelitian Alternatif</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('nilai/store',[$nilai->id])}}" method="POST">
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
                                    readonly
                                    name="nama"
                                    style="text-transform: Capitalize;"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="nama"
                                    value="{{$dataset->nama}}"
                                    placeholder="{{$dataset->nama}}"><br>
                                Khasiat
                                <input
                                    required
                                    name="khasiat"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="khasiat"
                                    value="{{$dataset->khasiat}}"
                                    placeholder="{{$dataset->khasiat}}"><br>
                                Efek Samping
                                <input
                                    name="efek"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="efek"
                                    value="{{$dataset->efek}}"
                                    placeholder="{{$dataset->efek}}"><br>
                                Garansi (hari)
                                <input
                                    name="garansi"
                                    min="0"
                                    type="number"
                                    class="form-control form-control-user"
                                    id="garansi"
                                    value="{{$dataset->garansi}}"
                                    placeholder="{{$dataset->garansi}}"><br>
                                Merk
                                <input
                                    name="merk"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="merk"
                                    value="{{$dataset->merk}}"
                                    placeholder="{{$dataset->merk}}"><br>
                                Harga (Rp)
                                <input
                                    required
                                    name="harga"
                                    min="0"
                                    type="number"
                                    class="form-control form-control-user"
                                    id="harga"
                                    value="{{$dataset->harga}}"
                                    placeholder="{{$dataset->harga}}">
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