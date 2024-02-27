
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">New User</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- <a href="<?php echo base_url('User/Postuser');?>" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus" ></i>New User</a> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user as $data){

                ?>
                <tr>
                  <td><img class="profile-user-img img-responsive" src="<?php echo base_url()?>img/profile/<?php echo $data->photo?>" alt="User profile picture"></td>
                  <td style="vertical-align: middle;"><?php echo $data->name?></td>
                  <td style="vertical-align: middle;"><?php echo $data->username?></td>
                  <?php if ( $data->id_role == 1 ) { ?>
                    <td style="vertical-align: middle;">
                      Super Admin
                    </td>
                  <?php } ?>
                  <?php if ( $data->id_role == 2 ) { ?>
                    <td style="vertical-align: middle;">
                      Admin
                    </td>
                  <?php } ?>
                  <?php if ( $data->id_role == 3 ) { ?>
                    <td style="vertical-align: middle;">
                      Admin Warehouse
                    </td>
                  <?php } ?>
                  <?php if ( $data->id_role == 4 ) { ?>
                    <td style="vertical-align: middle;">
                      User
                    </td>
                  <?php } ?>
                  <td style="text-align: center; vertical-align: middle;">
                    <a href="<?php echo base_url('User/Edit/'.$data->id);?>" class="btn btn-primary">
                      <i class="fa fa-fw fa-pencil"></i> Edit
                    </a> 
                    </div>
                    </div>
                  </td>
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

