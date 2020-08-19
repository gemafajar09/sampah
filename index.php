<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Pengolahan Sampah</title>

  <!-- Bootstrap core CSS -->
  <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/css/scrolling-nav.css" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Aplikasi Pengolahan Sampah</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#laporan">Pengaduan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to Scrolling Nav</h1>
      <p class="lead">A landing page template freshly redesigned for Bootstrap 4</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
            <center>
                <h3>
                    Jadwal Pengangkutan Sampah
                </h3>
            </center>
            <hr>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Wilayah</th>
                        <th>Jadwal</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Wilayah</th>
                        <th>Jadwal</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            $data = mysqli_query($con,"SELECT * FROM penjadwalan a LEFT JOIN jadwal b ON a.id_jadwal=b.id_jadwal");
                            foreach($data as $i => $a):
                        ?>
                    <tr>
                        <td style="text-align: center;"><?= $i+1 ?></td>
                        <td><?= $a['tanggal'] ?></td>
                        <td><?= $a['jam'] ?></td>
                        <td><?= $a['wilayah'] ?></td>
                        <td><?= $a['jadwal'] ?></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </section>

  <section id="laporan" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  Pengaduan Masyarakat
              </div>
              <div class="card-body" style="overflow: auto;">
                <?php
                    $datas = mysqli_query($con,"SELECT * FROM pengaduan ORDER BY id_pengaduan DESC LIMIT 6");
                    foreach($datas as $a):
                ?>
                  <div class="alert alert-primary" style="font-size:12px">
                      <div class="row">
                          <div class="col-md-12">
                            <i>tanggal : <?= $a['tanggal'] ?></i>
                          </div>
                          <div class="col-md-6">
                            <i>Email : <?= $a['email'] ?></i>
                          </div>
                          <div class="col-md-6">
                            <i>nama : <?= $a['nama'] ?></i>
                          </div>
                          <div class="col-md-12">
                              <?= $a['komentar'] ?>
                          </div>
                      </div>
                  </div>
                <?php endforeach ?>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  Masukan Laporan
              </div>
              <div class="card-body">
                  <form action="komentar.php" method="POST">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Email</label>
                                  <input type="email" name="email" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="">Nama</label>
                                  <input type="text" name="nama" class="form-control">
                              </div>
                          </div>
                          <div class="col-md-12">
                              <textarea name="komentar" id="" class="form-control"></textarea>
                          </div>
                          <div class="col-md-12">
                              <button type="submit" name="kirim" class="btn btn-primary btn-block">Kirim</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;Agusmia Susanti 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="css/vendor/jquery/jquery.min.js"></script>
  <script src="css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="css/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="css/js/scrolling-nav.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
