
    <section class="content-header">
      <h1>
        Master Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Master Data</a></li>
        <li class="active">Brand</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brand</h3>
            </div>
            <!-- /.box-header -->
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Brand</a>

            <?= $this->session->flashdata('Pesan') ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Name</th>
                  <th>Origin</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                <?php
                foreach ($brand as $data){

                ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?php echo $data->brand?></td>
                  <td><?php echo $data->origin?></td>
                  <td style="text-align: center;">
                    <a href="<?php echo base_url('Vendor/EditBrand/'.$data->id);?>">
                      <i class="fa fa-fw fa-pencil"></i>
                    </a> 
                    <a href="<?php echo base_url('Vendor/HapusBrand/'.$data->id);?>" onclick="return confirm('yakin?');">
                      <i class="fa fa-fw fa-trash"></i>
                    </a>
                    </div>
                    </div>
                  </td>
                </tr>
                <?php echo form_open_multipart('User/EditRole/')?>
                <form role="form" action="<?php echo base_url('User/EditBrand/'.$data->id)?>" method="post" >
                    <div class="modal modal-info fade" id="modal-info">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><b><?php echo $data->kategori?></b></h4>
                            </div>
                            <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                <label for="text">Edit Data</label>
                                <input type="text" class="form-control" name="beli" placeholder="Kategori" value="<?php echo $data->kategori ?>">
                                <p class="text-red"><?php echo form_error('nama')?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline">Beli</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                    <!-- /.modal-dialog -->
                </form>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Name</th>
                  <th>Origin</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->
            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
            <?php echo form_open_multipart('Vendor/TambahBrand/')?>
                <form role="form" action="<?php echo base_url('Vendor/TambahBrand/')?>" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Brand</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="text"><span style="color: red; margin-right: 3px">*</span>Brand Name</label>
                              <input type="text" class="form-control" name="label" placeholder="Nama Brand" required>
                              <p class="text-red"><?php echo form_error('label')?></p>
                            </div>
                            <div class="form-group">
                          <label for="text"><span style="color: red; margin-right: 3px">*</span>Select Origin</label>
                          <select class="form-control" name="id_origin">
                            <?php foreach ($origin as $data){ ?>
                                <option value="<?php echo $data->id?>"><?php echo $data->label ?></option>
                            <?php }?>
                          </select>
                        </div>
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

