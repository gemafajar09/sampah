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

<!-- The Modal -->
<div class="modal" id="penjadwalan">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
            <div class="card-header">
                Data Pengangkutan
            </div>
            <div class="card-body">
                <form action="?page=pengangkutan/action" method="POST">
                    <div class="form-inline text-center">
                        <input type="radio" name="ya" value="sudah">&nbsp;&nbsp;<label for="">Sudah</label>&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="ya" value="belum">&nbsp;&nbsp;<label for="">Belum</label>
                        <input type="hidden" id="id" name="id_penjadwalan">
                    </div>
                    <div align="right">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
    function edit(id)
    {
        $('#id').val(id)
        $('#penjadwalan').modal()
    }
</script>