<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h5>Jadwal</h5>
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
                    <th>Wilayah</th>
                    <th>Jadwal</th>
                    <th style="width: 160px; text-align: center;">Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Jadwal</th>
                    <th style="width: 160px; text-align: center;">Action</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php
                        $data = mysqli_query($con,"SELECT * FROM jadwal");
                        foreach($data as $i => $a):
                    ?>
                <tr>
                    <td style="text-align: center;"><?= $i+1 ?></td>
                    <td><?= $a['wilayah'] ?></td>
                    <td><?= $a['jadwal'] ?></td>
                    <td class="text-center">
                        <button type="button" onclick="edit('<?= $a['id_jadwal'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="?page=jadwal/hapus&id=<?= $a['id_jadwal'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="jadwal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
            <div class="card-header">
                Data Jadwal
            </div>
            <div class="card-body">
                <form action="?page=jadwal/action" method="POST">
                    <div class="form-group">
                        <label for="">Wilayah</label>
                        <input type="text" class="form-control" name="wilayah" id="wilayah" placeholder="Input Wilayah">
                    </div>
                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <input type="text" class="form-control" name="jadwal" id="jadwals" placeholder="Input Jadwal">
                        <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal">
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
        $('#jadwal').modal()
    }

    function edit(id)
    {
        $.ajax({
            url: 'jadwal/jadwal.php',
            type: 'POST',
            data: {'id_jadwal':id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#jadwals').val(data.jadwal)
                $('#wilayah').val(data.wilayah)
                $('#id_jadwal').val(data.id_jadwal)
                $('#jadwal').modal()
            }
        })
    }
</script>