<?php
function bln($tanggal){
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
	return $bulan[(int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function tgl($tanggal){
	$bulan = array (
		1 =>   'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agu',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
    $pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rekap Pengajuan</title>
    <link rel="icon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/style-bulanan.css')}}" media="all" />
  </head>
  
    <body onload="window.print()">
        <h2 style="text-align:center;">REKAP PENGAJUAN</h2>
        <h2 style="text-align:center;">{{bln($bln)}}</h2>
        <main>
        <table class="tg">
            <tr>
                <th class="tg-r8fv">No.</th>
                <th class="tg-r8fv">Tanggal</th>
                <th class="tg-r8fv">Supplier</th>
                <th class="tg-r8fv">Nama Obat</th>
                <th class="tg-r8fv">Merk</th>
                <th class="tg-r8fv">Diajukan</th>
                <th class="tg-r8fv">Kategori</th>
            </tr>
            <?php $x = 1; ?>
            @foreach($dataset as $d)
            <tr>
                <td class="tg-cegc">{{$x}}</td>
                <td class="tg-g25h" style="text-align:center;">{{tgl($d->tanggal)}}</td>
                <td class="tg-g25h" style="text-align:left;">{{$d->supplier}}</td>
                <td class="tg-g25h" style="text-align:left;">{{$d->nama}}</td>
                <td class="tg-g25h" style="text-align:left;">{{$d->merk}}</td>
                <td class="tg-g25h" style="text-align:left;">{{$d->dokter}}</td>
                <td class="tg-g25h" style="text-align:left;">{{$d->kategori}}</td>
            </tr>
            <?php $x++; ?>
            @endforeach
            </table>
        </main>
    </body>
</html>