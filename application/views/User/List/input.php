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
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Name</label>
                          <?php $data_id = count($id_user) - 1 ?>
                          <input type="hidden" value="<?= $id_user[$data_id]->id ?>" name="id_user" id="id_user" disabled>
                      <input type="text" class="form-control" name="name" placeholder="Name">
                      <p class="text-red"><?php echo form_error('name')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username">
                      <p class="text-red"><?php echo form_error('username')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <p class="text-red"><?php echo form_error('password')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text"><span style="color: red; margin-right: 3px">*</span>Email</label>
                      <input type="text" class="form-control" name="email" placeholder="Email">
                      <p class="text-red"><?php echo form_error('email')?></p>
                    </div>
                    <div class="form-group">
                        <label><span style="color: red; margin-right: 3px">*</span>Select Role</label>
                        <select class="form-control" name="id_role" onchange="pilihlevel(this)">
                          <?php foreach ($role as $data){ ?>
                              <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                          <?php }?>
                        </select>
                    </div>
                    <div class="form-group" id="listwr" style="display: none">
                        <label><span style="color: red; margin-right: 3px">*</span>Pilih Warehouse</label>
                          <select class="form-control" name="id_warehouse" id="id_warehouse" disabled>
                            <?php foreach ($warehouse as $dataWarehouse) :?>
                                <option name="option" value="<?php echo $dataWarehouse->id?>"><?php echo $dataWarehouse->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="text">Photo</label>
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
<script>

let divSelect = document.getElementById('listwr');
let select = document.getElementById('id_warehouse');
let id_user = document.getElementById('id_user');

function pilihlevel(obj)
{
 var idlevel = obj.value;

 if (idlevel == 3){
   divSelect.style.display = 'block';
   select.removeAttribute('disabled');
   id_user.removeAttribute('disabled');
 } else {
   divSelect.style.display = 'none';
   select.setAttribute('disabled', '')
   id_user.setAttribute('disabled', '')
 }
}

</script>