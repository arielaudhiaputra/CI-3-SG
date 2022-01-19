
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                    	<div class="col-lg-8">
                    		 <?= $this->session->flashdata('message'); ?>
                    		<table class="table">
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Image</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $i = 1; ?>
							  	<?php foreach($table as $t): ?>
								    <tr>
								      <th scope="row"><?= $i; ?></th>
								      <td><?= $t['name']; ?></td>
								      <td><img src="<?= base_url('assets/img/php/') . $t['image']; ?>" class="img-thumbnail" width="50" height="50"></td>
								      <td>
								      	<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editPhpModal<?= $t['id']; ?>">Edit</button>
								      	<a href="<?= base_url('progate/hapusphp/') . $t['id']; ?>" class="badge badge-danger">Delete</a>
								      </td>
								    </tr>
								<?php $i++ ?>
								<?php endforeach; ?>
							  </tbody>
							</table>
                    	</div>
                    </div>

                   <div class="row justify-content-end mt-4">
                      <div class="col-sm-4">
                          <a href="<?= base_url('progate'); ?>">Kembali...</a>
                      </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<!-- Modal -->
<?php foreach($table as $t): ?>
<div class="modal fade" id="editPhpModal<?= $t['id']; ?>"  tabindex="-1" aria-labelledby="editPhpModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPhpModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <?= form_open_multipart('progate/edit'); ?>
      <div class="modal-body">
         <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $t['name']; ?>" readonly>
                </div>
            </div>
      </div>
      <div class="modal-body">
        <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/php/') . $t['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" required>
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add new menu</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>







