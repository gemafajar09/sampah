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
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>System Architect</td>
                    <td>System Architect</td>
                    <td class="text-center">
                        <a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
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
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Wilayah</label>
                        <input type="text" class="form-control" name="wilayah" placeholder="Input Wilayah">
                    </div>
                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <input type="text" class="form-control" name="jadwal" placeholder="Input Jadwal">
                    </div>
                    <div align="right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
</script>