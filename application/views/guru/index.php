
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

                    <div class="row">
                    	<div class="col-lg">
                    		<table class="table">
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Menu</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php $i = 1; ?>
							  	<?php foreach($murid as $m): ?>
								    <tr>
								      <th scope="row"><?= $i; ?></th>
								      <td><?= $m['name']; ?></td>
								      <td><?= $m['email']; ?></td>
								      <td><?= $m['role']; ?></td>
								    </tr>
								<?php $i++ ?>
								<?php endforeach; ?>
							  </tbody>
							</table>
                    	</div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->