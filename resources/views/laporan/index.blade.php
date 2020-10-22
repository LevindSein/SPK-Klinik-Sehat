<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
    $pecahkan = explode('-', $tanggal);
	return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<?php
$role = Session::get('role');
?>
@extends($role == 'master' ? 'layout.master' : 'layout.admin')
@section('content')
<!-- Begin Page Content -->
<title>Cetak Laporan</title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body py-2 d-sm-flex align-items-center justify-content-between">
            <!--Print Form-->
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    class="table display table-bordered"
                    id="tableLaporan"
                    width="100%"
                    cellspacing="0"
                    style="font-size:1rem;">
                    <thead>
                        <tr>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Bulan</th>
                            <th style="background-color:rgba(255, 212, 71, 0.2);">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($dataset as $d)
                        <tr>
                            <td class="text-center" <?php $bulan = tgl_indo($d->bulan);?>>{{$bulan}}</td>
                            <td class="text-center">
                                <a
                                    href="{{url('laporan/print',[$d->bulan])}}"
                                    target="_blank">
                                    <i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(
            '#tableLaporan'
        ).DataTable({
            "processing": true,
            "bProcessing": true,
            "language": {
                'loadingRecords': '&nbsp;',
                'processing': '<i class="fas fa-spinner"></i>'
            },
            "deferRender": true,
            "scrollX": true,
            "bSortable": false,
            "ordering": false
        });
    });
</script>
@endsection