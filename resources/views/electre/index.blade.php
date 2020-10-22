<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.dokter')
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
                        <option value="">{{$data}}</option>
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
                                    @for($i=0; $i < count($id); $i++)
                                    <?php
                                    $obat = DB::table('alternatif')
                                    ->leftJoin('supplier','alternatif.supplier','=','supplier.id')
                                    ->where('alternatif.id',$id[$i])
                                    ->select('alternatif.id as obatId','alternatif.nama as alt','supplier.nama as sup')
                                    ->first();
                                    ?>
                                    <tr>
                                        <td class="text-center">{{$agregat[$i]}}</td>
                                        <td class="text-center">{{$obat->alt}}</td>
                                        <td class="text-center">{{$obat->sup}}</td>
                                        <td class="text-center">
                                            <a
                                                href="{{url('laporan/store',[$obat->obatId])}}" target="_blank"><i class="fas fa-paper-plane"></i></a>
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--END HASIL-->
                    <!--RINCIAN-->
                    <div id="menu1" class="container tab-pane fade">
                        <br>
                        Berikut adalah Rincian Metode Electre untuk Obat Kategori <b><u>{{$data}}</u></b> :<br><br>
                        <h6 class="m-0 font-weight-bold text-primary">Data Nilai Awal</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="nilaiAwal"
                                width="100%"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  rowspan="2">No.</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  rowspan="2">Nama Obat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  colspan="5">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Khasiat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >E.Samping</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Garansi</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Merk</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Harga</th>
                                    </tr>
                                </thead>

                                <tbody class="table-bordered"><?php $no = 1;?>
                                @foreach($nilaiAwal as $nilai)
                                    <tr>
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$nilai->nama}}</td>
                                        <td class="text-center">{{$nilai->khasiat}}</td>
                                        <td class="text-center">{{$nilai->efek}}</td>
                                        <td class="text-center">{{$nilai->garansi}}</td>
                                        <td class="text-center">{{$nilai->merk}}</td>
                                        <td class="text-center">{{$nilai->harga}}</td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="matriksNormalisasi"
                                width="100%"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" rowspan="2">No.</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" rowspan="2">Nama Obat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" colspan="5">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);">Khasiat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);">E.Samping</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);">Garansi</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);">Merk</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);">Harga</th>
                                    </tr>
                                </thead>

                                <tbody class="table-bordered"><?php $no = 1;?>
                                @for($i=0 ; $i < count($matriksNormalisasi) ; $i++)
                                    <tr>
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$matriksNormalisasi[$i][5]}}</td>
                                        <td class="text-center">{{number_format((float)$matriksNormalisasi[$i][0], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$matriksNormalisasi[$i][1], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$matriksNormalisasi[$i][2], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$matriksNormalisasi[$i][3], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$matriksNormalisasi[$i][4], 3, '.', '')}}</td>
                                    </tr>
                                    <?php $no++; ?>
                                @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Normalisasi Terbobot</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="bobotNormalisasi"
                                width="100%"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  rowspan="2">No.</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  rowspan="2">Nama Obat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);"  colspan="5">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Khasiat</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >E.Samping</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Garansi</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Merk</th>
                                        <th style="background-color:rgba(0, 212, 71, 0.2);" >Harga</th>
                                    </tr>
                                </thead>

                                <tbody class="table-bordered"><?php $no = 1;?>
                                @for($i=0 ; $i < count($bobotNormalisasi) ; $i++)
                                    <tr>
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$bobotNormalisasi[$i][5]}}</td>
                                        <td class="text-center">{{number_format((float)$bobotNormalisasi[$i][0], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$bobotNormalisasi[$i][1], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$bobotNormalisasi[$i][2], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$bobotNormalisasi[$i][3], 3, '.', '')}}</td>
                                        <td class="text-center">{{number_format((float)$bobotNormalisasi[$i][4], 3, '.', '')}}</td>
                                    </tr>
                                    <?php $no++; ?>
                                @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Himpunan Index Concordance & Discordance</h6><br>
                        <h8 class="m-0 font-weight-bold text-primary">Index Concordance</h8><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="cIndex"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($cIndex); $i++)
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @foreach($cIndex as $c)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 0, 255, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($i=0; $i < count($c); $i++)
                                        <td class="text-center">
                                        @if($c[$i] == NULL)
                                        &mdash;
                                        @else
                                        { {{$c[$i]}} }
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h8 class="m-0 font-weight-bold text-primary">Index Discordance</h8><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="dIndex"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($dIndex); $i++)
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @foreach($dIndex as $d)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 255, 71, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($i=0; $i < count($d); $i++)
                                        <td class="text-center">
                                        @if($d[$i] == NULL)
                                        &mdash;
                                        @else
                                        { {{$d[$i]}} }
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Concordance</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="cMatriks"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($cMatriks); $i++)
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @for($i=0; $i < count($cMatriks); $i++)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 0, 255, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($j=0; $j < count($cMatriks); $j++)
                                        <td class="text-center">
                                        @if($i == $j)
                                        &mdash;
                                        @else
                                        {{$cMatriks[$i][$j]}}
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Discordance</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="dMatriks"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($dMatriks); $i++)
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @for($i=0; $i < count($dMatriks); $i++)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 255, 71, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($j=0; $j < count($dMatriks); $j++)
                                        <td class="text-center">
                                        @if($i == $j)
                                        &mdash;
                                        @else
                                        {{number_format((float)$dMatriks[$i][$j], 3, '.', '')}}
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Dominan Concordance</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="cThreshold"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($cThreshold); $i++)
                                        <th style="background-color:rgba(255, 0, 255, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @for($i=0; $i < count($cThreshold); $i++)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 0, 255, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($j=0; $j < count($cThreshold); $j++)
                                        <td class="text-center">
                                        @if($i == $j)
                                        &mdash;
                                        @else
                                        {{$cThreshold[$i][$j]}}
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Matriks Dominan Discordance</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="dThreshold"
                                cellspacing="0"
                                style="font-size:0.75rem;">
                                <thead class="table-bordered">
                                    <tr>
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">&nbsp;</th>
                                        @for($i=0; $i < count($dThreshold); $i++)
                                        <th style="background-color:rgba(255, 255, 71, 0.2);">Obat {{$i+1}}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @for($i=0; $i < count($dThreshold); $i++)
                                    <tr>
                                        <td class="text-center" style="background-color:rgba(255, 255, 71, 0.2);"><b>Obat {{$no}}</b></td>
                                        @for($j=0; $j < count($dThreshold); $j++)
                                        <td class="text-center">
                                        @if($i == $j)
                                        &mdash;
                                        @else
                                        {{$dThreshold[$i][$j]}}
                                        @endif
                                        </td>
                                        @endfor
                                    </tr>
                                    <?php $no++; ?>
                                    @endfor
                                </tbody>
                            </table>
                        </div><br>

                        <h6 class="m-0 font-weight-bold text-primary">Dominan Conclusion</h6><br>
                        <div class="table-responsive ">
                            <table
                                class="table"
                                id="dominasi"
                                cellspacing="0"
                                style="font-size:0.75rem;width:50%">
                                <thead class="table-bordered">
                                    <tr>
                                        <th>&nbsp;</th>
                                        @for($i=0; $i < count($dominasi); $i++)
                                        <th>Obat {{$i+1}}</th>
                                        @endfor
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="table-bordered"><?php $no = 1;?>
                                    @for($i=0; $i < count($dominasi); $i++)
                                    <tr>
                                        <?php $total = 0; ?>
                                        <td class="text-center"><b>Obat {{$no}}</b></td>
                                        @for($j=0; $j < count($dominasi); $j++)
                                        <td class="text-center">
                                        @if($i == $j)
                                        &mdash;
                                        @else
                                        {{$dominasi[$i][$j]}}
                                        <?php
                                        $total = $total + $dominasi[$i][$j];
                                        ?>
                                        @endif
                                        </td>
                                        @endfor
                                        <td class="text-center"><b>{{$total}}</b></td>
                                    </tr>
                                    <?php $no++; ?>
                                    @endfor
                                </tbody>
                            </table>
                        </div><br>
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
            "order": [[0, 'desc']]
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#nilaiAwal'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "order":false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#matriksNormalisasi'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "order":false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#bobotNormalisasi'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "order":false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#cIndex'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#dIndex'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#cMatriks'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#cThreshold'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#dMatriks'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#dThreshold'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "bSortable": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(
            '#dominasi'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "scrollY": "450px",
            "paging":false,
            "searching":false,
            "bInfo": false,
            "ordering":false,
            "fixedColumns":   {
                "leftColumns": 1,
            },
        });
    });
</script>
@endsection