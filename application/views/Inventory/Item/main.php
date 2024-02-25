
    <section class="content-header">
      <h1>
        Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Inventory</a></li>
        <li class="active">Item</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item</h3>
            </div>
            <!-- /.box-header -->
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Item</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Asset No</th>
                  <th>Description</th>
                  <th>Vendor</th>
                  <th>Brand</th>
                  <th>Warranty</th>
                  <th>Serial Number</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($item as $data) {

                ?>
                <tr>
                  <td><?php echo $id++?></td>
                  <td><img class="profile-user-img img-responsive" src="<?php echo base_url()?>img/item/<?php echo $data->photo?>" alt="Image Item"></td>
                  <td><?php echo $data->name?></td>
                  <td><?php echo $data->type?></td>
                  <td><?php echo $data->asset_no?></td>
                  <td><?php echo $data->description?></td>
                  <td><?php echo $data->vendor?></td>
                  <td><?php echo $data->brand?></td>
                  <td><?php echo $data->warranty?></td>
                  <td><?php echo $data->serial_number?></td>
                  <td style="text-align: center;">
                    <a href="<?php echo base_url('Inventory/Itemedit/'.$data->id);?>">
                      <i class="fa fa-fw fa-pencil"></i>
                    </a> 
                    <a href="<?php echo base_url('Inventory/HapusItem/'.$data->id);?>" onclick="return confirm('Data akan dihapus')">
                      <i class="fa fa-fw fa-trash"></i>
                    </a>
                    </div>
                    </div>
                  </td>
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Asset No</th> 
                  <th>Description</th>
                  <th>Vendor</th>
                  <th>Brand</th>
                  <th>Warranty</th>
                  <th>Serial Number</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->

            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
            <?php echo form_open_multipart('Inventory/TambahItem/')?>
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Item</h4>
                    </div>
                    <div class="modal-body">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="text">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                            <p class="text-red"><?php echo form_error('name')?></p>
                        </div>
                        <div class="form-group">
                          <label for="text">Select Type</label>
                          <select class="form-control" name="id_type">
                            <?php foreach ($type as $data){ ?>
                                <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                            <?php }?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="text">Asset No</label>
                            <input type="text" class="form-control" name="asset_no" placeholder="Asset No" required>
                          <p class="text-red"><?php echo form_error('asset_no')?></p>
                        </div>
                      <div class="form-group">
                        <label for="text">Description</label>
                          <input type="text" class="form-control" name="description" placeholder="description" required>
                        <p class="text-red"><?php echo form_error('description')?></p>
                      </div>
                      <div class="form-group">
                          <label for="text">Select Vendor</label>
                          <select class="form-control" name="id_vendor">
                            <?php foreach ($vendor as $datas){ ?>
                                <option value="<?php echo $data->id?>"><?php echo $datas->label ?></option>
                            <?php }?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="text">Select Brand</label>
                          <select class="form-control" name="id_brand">
                            <?php foreach ($brand as $data){ ?>
                                <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                            <?php }?>
                          </select>
                        </div>
                      <div class="form-group">
                        <label for="text">Warranty</label>
                          <input type="text" class="form-control" name="warranty" placeholder="Warranty" required>
                        <p class="text-red"><?php echo form_error('warranty')?></p>
                      </div>
                      <div class="form-group">
                        <label for="text">Serial Number</label>
                          <input type="text" class="form-control" name="serial_number" placeholder="Serial Number" required>
                        <p class="text-red"><?php echo form_error('serial_number')?></p>
                      </div>
                      <div class="form-group">
                        <label for="text">Gambar</label>
                        <input type="file" name="photo" size="20" />
                        <p class="text-red"><?php echo form_error('photo')?></p>
                      </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

