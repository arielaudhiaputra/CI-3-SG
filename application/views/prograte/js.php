

    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800 mx-5"><?= $title; ?></h1>

                    <div class="row">
                      <div class="col-lg-6">
                       <?= $this->session->flashdata('message'); ?>
                       <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        
                      </div>
                    </div>


       				<div class="card mx-5" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Prograte</h5>
					    <h6 class="card-subtitle mb-2 text-muted">JavaSript</h6>
					    <p class="card-text">Kerjakan dan kumpulkan prograte tersebut dengan benar dan setelah selesai kirimkan sertifikat progratenya</p>
					    <a href="" class="card-link btn btn-primary" data-toggle="modal" data-target="#newJSModal">Upload</a>
					    <a href="https://progate.com/" class="card-link">Prograte</a>
					  </div>
					</div>


             <div class="row justify-content-end mt-4">
                <div class="col-sm-8">
                    <a href="<?= base_url('progate/tabeljs/'); ?>">Lihat tabel...</a>
                </div>
            </div>

                    

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

  <!-- Modal -->
<div class="modal fade" id="newJSModal"  tabindex="-1" aria-labelledby="newJSModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newJSModalLabel">Prograte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?= form_open_multipart('progate/js'); ?>
      <div class="modal-body">
         <div class="form-group">
			<label for="name">Full Name</label>
    		<input type="text" class="form-control" id="name" name="name">
         </div>
         <div class="form-group">
         	<label for="image">Image</label>
            <div class="custom-file">
            	<label for="image">Image</label>
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add new prograte</button>
      </div>
  	  </form>
    </div>
  </div>
</div>       