<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h5>Penjadwalan</h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <button type="button" onclick="jadwal()" class="btn btn-primary"><i class="fa fa-plus"></i></button>
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
                        $data = mysqli_query($con,"SELECT * FROM penjadwalan a LEFT JOIN jadwal b ON a.id_jadwal=b.id_jadwal");
                        foreach($data as $i => $a):
                    ?>
                <tr>
                    <td style="text-align: center;"><?= $i+1 ?></td>
                    <td><?= $a['tanggal'] ?></td>
                    <td><?= $a['jam'] ?></td>
                    <td><?= $a['wilayah'] ?></td>
                    <td><?= $a['jadwal'] ?></td>
                    <td class="text-center">
                        <button type="button" onclick="edit('<?= $a['id_penjadwalan'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="?page=penjadwalan/hapus&id=<?= $a['id_penjadwalan'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
            <div class="card-header">
                Data Penjadwalan
            </div>
            <div class="card-body">
                <form action="?page=penjadwalan/action" method="POST">
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="">Jam</label>
                        <input type="text" class="form-control" name="jam" id="jam">
                    </div>
                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <select name="jadwal" id="jadwal" class="form-control">
                            <option value="">-PILIH JADWAL-</option>
                            <?php
                                $data = mysqli_query($con,"SELECT * FROM jadwal");
                                foreach($data as $a):
                            ?>
                            <option value="<?= $a['id_jadwal'] ?>"><?= $a['wilayah'] ?>-<?= $a['jadwal'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <input type="hidden" class="form-control" id="id_penjadwalan" name="id_penjadwalan">
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
    function jadwal()
    {
        $('#penjadwalan').modal()
    }

    function edit(id)
    {
        $.ajax({
            url: 'penjadwalan/penjadwalan.php',
            type: 'POST',
            data: {'id_penjadwalan':id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#jadwal').val(data.id_jadwal)
                $('#tanggal').val(data.tanggal)
                $('#jam').val(data.jam)
                $('#id_penjadwalan').val(data.id_penjadwalan)
                $('#penjadwalan').modal()
            }
        })
    }
</script>