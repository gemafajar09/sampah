<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h5>Pengangkutan</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <!-- <button type="button" onclick="jadwal()" class="btn btn-primary"><i class="fa fa-plus"></i></button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="width: 10px;">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php
                    $tanggal = date('Y-m-d');
                        $data = mysqli_query($con,"SELECT * FROM pengaduan ORDER BY id_pengaduan");
                        foreach($data as $i => $a):
                    ?>
                <tr>
                    <td style="text-align: center;"><?= $i+1 ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $a['email'] ?></td>
                    <td><?= $a['komentar'] ?></td>
                    <td><?= $a['tanggal'] ?></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>