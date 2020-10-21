@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Users</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Update Users</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <form autocomplete="off" class="user" action="{{url('user/store',[$dataset->id])}}" method="POST">
                            @csrf
                            <div class="autocomplete">
                                Nama User
                                <input
                                    required
                                    name="nama"
                                    type="text"
                                    class="form-control form-control-user"
                                    id="nama"
                                    value="{{$dataset->username}}"
                                    placeholder="{{$dataset->username}}">
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