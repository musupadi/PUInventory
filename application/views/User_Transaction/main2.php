
<section class="content-header">
      <h1>
        Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Inventory</a></li>
        <li class="active">Warehouse</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Warehouse</h3>
            </div>
            <!-- /.box-header -->
            <a data-toggle="modal" data-target="#modal-success" class="btn btn-success btn-sm" style="width: 130px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add Warehouse</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Item</th>
                  <th>Warehouse</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($transaction as $data) {

                ?>
                <tr>
                  <td><?php echo $id++?></td>
                  <th><?php echo $data->name?></th>
                  <td><?php echo $data->warehouse?></td>
                  <td><?php echo $data->warehouse_description?></td>
                  <td><?php echo $data->qty?></td>
                  <td style="text-align: center;">
                      <a class="btn btn-success btn-sm" style="width: 130px; margin-left: 10px" data-toggle="modal" data-target="#modal-success">Request</a>
                    </div>
                    </div>
                  </td>
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Item</th>
                  <th>Warehouse</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->

            <!-- INPUT -->
            <div class="modal modal-success fade" id="modal-success">
            <?php echo form_open_multipart('Inventory/TambahWarehouse/')?>
                <form role="form" action="<?php echo base_url('Inventory/TambahWarehouse/')?>" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Input Warehouse</h4>
                    </div>
                    <div class="modal-body">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="text">Quantity</label>
                            <input type="number" class="form-control" name="qty" placeholder="Quantity" required>
                          <p class="text-red"><?php echo form_error('name')?></p>
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

