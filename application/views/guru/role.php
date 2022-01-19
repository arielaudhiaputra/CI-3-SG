

    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                    	<div class="col-lg-6">
                    		 <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

						     <?= $this->session->flashdata('message'); ?>


                    		<a href="" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#newRoleModal">Add Role Menu</a>

                    		<table class="table">
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Role</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $i = 1; ?>
							  	<?php foreach($role as $r): ?>
							    <tr>
							      <th scope="row"><?= $i; ?></th>
							      <td><?= $r['role']; ?></td>
							      <td>
                     <a href="<?= base_url('guru/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
							      	<button type="button" class="badge badge-success" data-toggle="modal" data-target="#editRoleModal<?= $r['id']; ?>">Edit</button>
							      	<a href="<?= base_url('guru/hapusrole/') . $r['id']; ?>" class="badge badge-danger">Delete</a>
							      </td>
							    </tr>
							  </tbody>
							  <?php $i++; ?>
							<?php endforeach; ?>
							</table>


                    	</div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal"  tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">New Role title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?= base_url('guru/role'); ?>" method="post">
      <div class="modal-body">
         <div class="form-group">
      			<input type="text" class="form-control" id="role" name="role" placeholder="Role name">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add New Role</button>
      </div>
  	  </form>
    </div>
  </div>
</div>


<!-- Modal -->
<?php foreach($role as $r): ?>
<div class="modal fade" id="editRoleModal<?= $r['id']; ?>"  tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRoleModalLabel">Edit Role title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?= base_url('guru/edit'); ?>" method="post">
        <input type="hidden" name="id" id="id" value="<?= $r['id']; ?>">
      <div class="modal-body">
         <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" placeholder="Role name">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Role</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>







