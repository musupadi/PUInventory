<section class="content-header">
      <h1>
        Input User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>User</a></li>
        <li class="active">Input User</li>
      </ol>
    </section>

    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open_multipart('User/Postuser/')?>
                <form role="form" action="<?php echo base_url('User/Postuser/')?>" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="text">Nama</label>
                      <input type="text" class="form-control" name="name" placeholder="Nama">
                      <p class="text-red"><?php echo form_error('name')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username">
                      <p class="text-red"><?php echo form_error('username')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <p class="text-red"><?php echo form_error('password')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Email">
                      <p class="text-red"><?php echo form_error('email')?></p>
                    </div>
                    <div class="form-group">
                        <label>Pilih Role</label>
                        <select class="form-control" name="id_role">
                        <?php foreach ($role as $data){

                        ?>
                            <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                        <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="text">Gambar</label>
                      <input type="file" name="gambar" size="20" />
                      <p class="text-red"><?php echo form_error('nama')?></p>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="<?php echo base_url('User')?>">Batal</a>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>  