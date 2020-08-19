<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h5>User</h5>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th style="width: 160px; text-align: center;">Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th style="width: 160px; text-align: center;">Action</th>
                </tr>
                </tfoot>
                <tbody>
                    <?php
                        $data = mysqli_query($con,"SELECT * FROM user");
                        foreach($data as $i => $a):
                    ?>
                <tr>
                    <td style="text-align: center;"><?= $i+1 ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $a['username'] ?></td>
                    <td class="text-center">
                        <button type="button" onclick="edit('<?= $a['id_user'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="?page=jadwal/hapus&id=<?= $a['id_user'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="users">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
            <div class="card-header">
                User
            </div>
            <div class="card-body">
                <form action="?page=user/action" method="POST">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Input Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Input Password">
                        <input type="hidden" class="form-control" id="id_user" name="id_user">
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
        $('#users').modal()
    }

    function edit(id)
    {
        $.ajax({
            url: 'user/user.php',
            type: 'POST',
            data: {'id_user':id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#nama').val(data.nama)
                $('#username').val(data.username)
                $('#password').val(data.password)
                $('#id_user').val(data.id_user)
                $('#users').modal()
            }
        })
    }
</script>