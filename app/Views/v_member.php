<?php
	if(session()->get('role')!='admin') {
		return redirect()->to(base_url('/'));
	}
?>
<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
if(session()->getFlashData('success')){
?> 
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(session()->getFlashData('failed')){
?> 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session()->getFlashData('failed') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
Tambah Data
</button> -->
<!-- Table with stripped rows -->
<table class="table datatable">
<thead>
	<tr>
	<th scope="col">#</th>
	<th scope="col">Username</th>
	<th scope="col">Role</th>
	<th scope="col">Status</th> 
	<th scope="col"></th> 
	</tr>
</thead>
<tbody>
	<?php foreach($members as $index=>$member): ?>
	<tr>
	<th scope="row"><?php echo $index+1?></th>
	<td><?php echo $member['username'] ?></td> 
	<td><?php echo $member['role'] ?></td> 
	<td>
        <?php
            if($member['is_aktif']==0){
                echo "Nonaktif";
            } else {
                echo "Aktif";
            }
        ?>
    </td> 
	<td>
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $member['id'] ?>">
			Ubah
		</button>
		<a href="<?= base_url('member/delete/'.$member['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
			Hapus
		</a>
	</td>
	</tr>
	<!-- Edit Modal Begin -->
	<div class="modal fade" id="editModal-<?= $member['id'] ?>" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?= base_url('member/edit/'.$member['id']) ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<div class="modal-body">
				<div class="form-group mb-3">
					<label for="name">Username</label>
					<input readonly type="text" name="username" class="form-control" id="username" value="<?= $member['username'] ?>" placeholder="Nama Pengguna" required>
				</div>
				<div class="form-group mb-3">
					<label for="name">Role</label>
					<!-- <input type="text" name="role" class="form-control" id="role" value="<?= $member['role'] ?>" placeholder="Role" required> -->
                    <div class="form-check">
                        <input type="radio" name="role" class="form-check-input" id="role" value="user" <?php if($member['role']=="user"){?>checked <?php } ?>>
                        <label class="form-check-label" for="exampleRadio1">User</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="radio" name="role" class="form-check-input" id="role" value="admin"<?php if($member['role']=="admin"){?>checked <?php } ?>>
                        <label class="form-check-label" for="exampleRadio2">Admin</label>
                    </div>
                </div>
				<div class="form-group mb-3">
					<!-- <label for="name">Status</label>
					<input type="text" name="is_aktif" class="form-control" id="is_aktif" value="<?= $member['is_aktif'] ?>" placeholder="Status Akun" required> -->
                    <div class="mb-3 form-check form-switch align-right">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_aktif" name="is_aktif" value="1" <?php if($member['is_aktif']==1){?>checked <?php } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status keaktifan akun</label>
                    </div>
                </div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal End -->
	<?php endforeach ?>   
</tbody>
</table>
<!-- End Table with stripped rows -->
<!-- Add Modal Begin -->

<!-- <div class="modal fade" id="addModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form action="<?= base_url('member') ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>

				<div class="modal-body">
					<div class="form-group">
						<label for="name">Username</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
					</div>

					<div class="form-group">
						<label for="name">Role</label>
						<input type="text" name="role" class="form-control" id="role" placeholder="Role" required>
					</div>

					<div class="form-group">
						<label for="name">Status</label>
						<input type="text" name="is_aktif" class="form-control" id="is_aktif" placeholder="Status Akun" required>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

			</form>
		</div>
	</div>
</div> -->

<!-- Add Modal End -->
<?= $this->endSection() ?>