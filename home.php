<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Data Pengaduan</h4>
            </div>
            <div class="card-body">
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
                <h4>Data Pengangkutan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Wilayah</th>
                                <th>Jadwal</th>
                                <th style="width: 160px; text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Wilayah</th>
                                <th>Jadwal</th>
                                <th style="width: 160px; text-align: center;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $tanggal = date('Y-m-d');
                                $data = mysqli_query($con,"SELECT * FROM penjadwalan a LEFT JOIN jadwal b ON a.id_jadwal=b.id_jadwal WHERE a.tanggal = '$tanggal'");
                                foreach($data as $i => $a):
                            ?>
                            <tr>
                                <td style="text-align: center;"><?= $i+1 ?></td>
                                <td><?= $a['tanggal'] ?></td>
                                <td><?= $a['jam'] ?></td>
                                <td><?= $a['wilayah'] ?></td>
                                <td><?= $a['jadwal'] ?></td>
                                <td class="text-center">
                                    <?php
                                        if($a['status'] == 'sudah'):
                                    ?>
                                        <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                    <?php else: ?>
                                        <button type="button" onclick="edit('<?= $a['id_penjadwalan'] ?>')" class="btn btn-warning"><i class="fa fa-check-square"></i></button>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>