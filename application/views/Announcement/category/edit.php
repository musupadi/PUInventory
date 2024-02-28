<section class="content-header">
      <h1>
        Edit Location
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Edit Location</a></li>
        <li class="active">Edit Location</li>
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
                <?php foreach ($category as $data){

                ?>    
                  <?php echo form_open_multipart('Announcement/updateCategory/'.$data->id)?>
                  <div class="box-body">
                    <div class="form-group">
                        <label for="text">Category</label>
                        <input type="text" class="form-control" name="label" placeholder="Label" value="<?php echo $data->label ?>">
                      <p class="text-red"><?php echo form_error('label')?></p>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                    <a href="<?php echo base_url('Announcement/category')?>">Batal</a>
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