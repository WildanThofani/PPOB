<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>

			<h2 class="panel-title">Data Pelanggan</h2>
		</header>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-condensed mb-none table table-hover">
					<thead>
						<tr>
							<th>NO</th>
							<th>ID</th>
							<th>Username</th>
							<th>Name</th>
							<th>Email</th>
							<th>Passsword</th>
							<th>Alamat</th>
							<th class="text-left">Aksi</th>
						</tr>
					</thead>
					<?php
					$no = 0;
					foreach ($dataPelanggan as $pmbl) {
						$no++;
						echo '
                <tbody>
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . $pmbl->id . '</td>
                        <td>' . $pmbl->username . '</td>
                        <td>' . $pmbl->name . '</td>
                        <td>' . $pmbl->email . '</td>
                        <td>' . $pmbl->password . '</td>
                        <td>' . $pmbl->alamat . '</td>
                        <td class="text-left"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn btn-sm" data-toggle="modal" data-target="#up_pembeli" onclick="tm_detail(' . $pmbl->id . ')"><i class="fa fa-pencil"></i> UPDATE</button><a href=' . base_url('index.php/users_admin/deletePel/' . $pmbl->id) . ' class="mb-xs mt-xs mr-xs btn btn-danger btn btn-sm" onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Ini ?\')"><i class="fa fa-trash-o"></i> DELETE</a></td>
                    </tr>
                </tbody>
                ';
					}
					?>
				</table>
				<?php if ($this->session->flashdata('pesan') != null) : ?>
					<div class="alert alert-danger">
						<?= $this->session->flashdata('pesan'); ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</section>

	<div class="modal fade" id="up_pembeli">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Update pembeli</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('index.php/users_admin/updatePelanggan') ?>" method="post">
						<input type="hidden" name="id" id="id" class="form-control">
						<div class="form-group">
							<label for="">Nama Pelanggan</label>
							<input type="text" name="name" id="nm_pel" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" id="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="text" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<br>
							<textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
						</div>
						<div class="modal-footer">
							<div class="col-md-12 text-right">
								<button class="btn btn-primary">Confirm</button>
								<button class="btn btn-default " data-dismiss="modal">Cancel</button>
							</div>
						</div>
				</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script>
		function tm_detail($id) {
			$.getJSON("<?= base_url() ?>index.php/users_admin/getDataDetail/" + $id, function(data) {
				$("#id").val(data['id']);
				$("#nm_pel").val(data['name']);
				$("#email").val(data['email']);
				$("#username").val(data['username']);
				$("#password").val(data['password']);
				$("#alamat").val(data['alamat']);
			})
		}
	</script>

</body>

</html>
