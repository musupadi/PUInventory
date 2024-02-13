
<section class="content-header">
      <h1>
        Inventory
      </h1>
      <div class="lg-5">
            <h4><a href="<?= base_url('Stock') ?>"> <i class="fa fa-arrow-circle-o-left" style="font-size:18px;"></i> Back</a></h4>
        </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Stock</a></li>
        <li class="active">Stock Item Main Warehouse</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock Item Main Warehouse</h3>
            </div>
            <!-- /.box-header -->
           
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
                  <th>Category</th>
                  <th>Warehouse</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($transaction as $data) {

                ?>
                <tr>
                  <td><?php echo $id++?></td>
                  <td style="height: 50px; vertical-align: middle;"><img class="profile-user-img img-responsive" src="<?php echo base_url()?>img/item/<?php echo $data->photo?>" alt="Image Item"></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->item_name?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->type?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->asset_no?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->description?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->category?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->warehouse_name?></td>
                  <td style="height: 50px; vertical-align: middle;"><?php echo $data->qty?></td>  
                  <td style="height: 50px; vertical-align: middle;"><a data-toggle="modal" data-target="#modal-stock" class="btn btn-success btn-sm" style="width: 150px; margin-left: 10px"><i class="fa fa-fw fa-plus" onclick="accept_data('<?=$data->id ?>')"></i>Add Quantity Stock</a></td>  
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
                  <th>Category</th>
                  <th>Warehouse</th>
                  <th>Qty</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php echo $this->session->flashdata('pesan');?>
            <!-- /.box-body -->

             <!-- INPUT -->
             <div class="modal modal-success fade" id="modal-stock">
            <?php echo form_open_multipart('Stock/AddStockItem/')?>
                <form role="form" action="<?php echo base_url('Stock/AddStockItem/')?>" method="post" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add Stock</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="text">Name Item</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $data->item_name ?>" disabled>
                            <p class="text-red"><?php echo form_error('name')?></p>
                        </div>
                        <div class="form-group">
                          <label for="text">Qty</label>
                            <input type="number" class="form-control" name="qty" placeholder="Qty" value="<?= $data->qty ?>" required>
                            <input type="hidden" id="id_add" name="id" value="" style="color:black">
                          <p class="text-red"><?php echo form_error('qty')?></p>
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

<script>
  function accept_data(id)
  {
    console.log(id);
    document.getElementById('id_add').value = id;
  }
</script>