<section class="content-header">
      <h1>
        Edit Item
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Edit Item</a></li>
        <li class="active">Edit Item</li>
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
                <?php foreach ($item as $data){

                ?>    
                  <?php echo form_open_multipart('Inventory/Itemedit/'.$data->id)?>
                <form role="form" action="<?php echo base_url('Inventory/Itemedit/'.$data->id)?>" method="post" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="text">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $data->name ?>">
                     <p class="text-red"><?php echo form_error('name')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Type</label>
                      <select class="form-control" name="id_type">
                        <?php foreach ($type as $dataType){ ?>
                            <option value="<?php echo $dataType->id?>"><?php echo $dataType->label ?></option>
                          <?php }?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="text">Asset No</label>
                        <input type="text" class="form-control" name="asset_no" placeholder="Asset No" value="<?php echo $data->asset_no ?>">
                     <p class="text-red"><?php echo form_error('asset_no')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Qty</label>
                        <input type="text" class="form-control" name="qty" placeholder="Qty" value="<?php echo $data->qty ?>">
                     <p class="text-red"><?php echo form_error('qty')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" value="<?php echo $data->description ?>">
                     <p class="text-red"><?php echo form_error('description')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Warranty</label>
                        <input type="text" class="form-control" name="warranty" placeholder="Warranty" value="<?php echo $data->warranty ?>">
                     <p class="text-red"><?php echo form_error('warranty')?></p>
                    </div>
                    <div class="form-group">
                      <label for="text">Serial Number</label>
                        <input type="text" class="form-control" name="serial_number" placeholder="Serial Number" value="<?php echo $data->serial_number ?>">
                     <p class="text-red"><?php echo form_error('serial_number')?></p>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    <a href="<?php echo base_url('Inventory/Type')?>">Batal</a>
                  </div>
                  <?php } ?>
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </section>  