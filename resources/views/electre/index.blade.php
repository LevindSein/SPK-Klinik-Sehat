@extends('layout.master')
@section('content')
<!-- Begin Page Content -->
<title>Keputusan Metode Electre</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Temukan Hasil Keputusan</h6>
        </div>
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-start">
            <form class="user" action="{{url('electre')}}" method="GET">
                <div class="form-group" style="display:inline-block">
                    <select class="form-control btn-sm" name="kategori" id="kategori" required>
                        <option value="">{{$name}}</option>
                        @foreach($kategori as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                    <input style="display:none" name="id" value="1">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Temukan</button>
            </form>
        </div>
        @if($value == 1)
        <div class="card-body">
        <div class="form-group">
                <label for="sel1">Keputusan berdasarkan Metode Electre :</label>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Hasil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Rincian</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!--HASIL-->
                    <div id="home" class="container tab-pane active">
                        <br>
                        Berikut adalah Agregat untuk Obat Kategori <b><u>{{$data}}</u></b> :<br><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="tableHasil"
                                width="70%"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 212, 71, 0.2);">Poin</th>
                                        <th style="background-color:rgba(255, 212, 71, 0.2);">Nama Obat</th>
                                        <th style="background-color:rgba(255, 212, 71, 0.2);">Supplier</th>
                                        <th style="background-color:rgba(255, 212, 71, 0.2);">Ajukan</th>
                                    </tr>
                                </thead>

                                <tbody class="table-bordered">
                                    <tr>
                                        <td class="text-center">50</td>
                                        <td class="text-center">Bodrex</td>
                                        <td class="text-center">Colmex</td>
                                        <td class="text-center">
                                            <a
                                                href="{{url('#')}}"><i class="fas fa-paper-plane"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--END HASIL-->
                    <!--RINCIAN-->
                    <div id="menu1" class="container tab-pane fade">
                        <br>
                        Berikut adalah Rincian Metode Electre untuk Obat Kategori <b><u>{{$data}}</u></b> :<br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Data Nilai Awal</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi Terbobot</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Himpunan Concordance & Discordance</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Concordance</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Discordance</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Dominan Concordance</h6><br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Matriks Dominan Discordance</h6><br><br>
                    </div>
                    <!--END RINCIAN-->
                </div>
                <!--END Tab Panes-->
            </div>
        </div>
        @endif
    </div>
</div>
<!-- /.container-fluid -->

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(
            '#tableHasil'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "paging":false,
            "searching":false,
            "bInfo": false,
        });
    });
</script>
@endsection