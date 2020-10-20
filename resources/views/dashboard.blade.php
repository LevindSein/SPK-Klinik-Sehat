<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sistem Pendukung Keputusan Metode Electre</h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">1. Normalisasi Matriks</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">2. Pembobotan Matriks</div>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">3. Concordance Discordance</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">4. Agregat Dominan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-6 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Information</h6>
      </div>
      <div class="card-body">
        <p>
          Dalam penggunaan Sistem Pendukung Keputusan (SPK) metode electre ini, ada beberapa informasi yang perlu diketahui pengguna, yaitu :<br>
          <br>
          <b>1. Bobot Kriteria (Keuntungan):</b><br>
          &emsp;1 = Sangat Tidak Penting<br>
          &emsp;2 = Tidak Penting<br>
          &emsp;3 = Cukup Penting<br>
          &emsp;4 = Penting<br>
          &emsp;5 = Sangat Penting<br>
          Bobot Kriteria terdapat pada data kriteria <a href="{{url('kriteria')}}">disini</a>.<br><br>

          <b>2. Garansi :</b><br>
          &emsp;0 = Tidak Ada<br>
          &emsp;1 = Ada<br>
          Garansi terdapat pada penambahan data nilai <a href="{{url('nilai')}}">disini</a>.<br><br>
          
          <b>3. Efek Samping (Keuntungan) :</b><br>
          &emsp;1 = Berat<br>
          &emsp;2 = Sedang<br>
          &emsp;3 = Ringan<br>
          Efek Samping terdapat pada penambahan data nilai <a href="{{url('nilai')}}">disini</a>.<br><br>
        </p>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Creator Profile</h6>
      </div>
      <div class="card-body">
        <div class="text-center">
          <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 250px;" src="{{asset('img/profil.png')}}" alt="">
        </div>
        <p>
            Nama&ensp;&ensp;: Aa Mulyana<br>
            NIM&ensp;&ensp;&ensp; : 1167050058<br>
            Sekolah Tinggi Teknologi Wastukencana Purwakarta
        </p>
      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->