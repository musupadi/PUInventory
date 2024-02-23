<section class="content-header">
      <h1>
        History Transaction
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History Transaction</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">History</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Name</th>
                  <th>Warehouse</th>
                  <th>Qty Stock</th>
                  <th>Qty Now</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($history as $data) {

                ?>
                <tr>
                  <td><?php echo $id++?></td>
                  <td><?php echo $data->item_name?></td>
                  <td><?php echo $data->warehouse?></td>
                  <td>-</td>
                  <td><?php echo $data->qty2?></td>
                  <td class ="btn btn-success" style="margin:0 45%;">
                    <?php if ( $data->description == 1 ) : ?>
                    Masuk
                    <?php endif ;?>
                    <?php if ( $data->description == 0 ) : ?>
                    Keluar
                    <?php endif ;?>
                  </td>
                </tr>
                <?php  } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Name</th>
                  <th>Warehouse</th>
                  <th>Qty Stock</th>
                  <th>Qty Now</th>
                  <th>Description</th>
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
