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
                  <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($history as $data) {

                ?>
                <tr style="text-align: center">
                  <td style="text-align: left"><?php echo $id++?></td>
                  <td style="text-align: left"><?php echo $data->item_name?></td>
                  <td style="text-align: left"><?php echo $data->warehouse?></td>
                  <td style="text-align: left"><?php echo $data->qty1 ?></td>
                  <td style="text-align: left"><?php echo $data->qty2?></td>
                    <?php if ( $data->description == 1 ) : ?>
                      <td class="btn btn-success" style="font-size: 1.2rem; padding: 7px; margin-top: 3px; padding: 7px 11.5px">In</td>
                    <?php endif ;?>
                    <?php if ( $data->description == 0 ) : ?>
                      <td class="btn btn-warning" style="font-size: 1.2rem; padding: 7px; margin-top: 3px">Out</td>
                    <?php endif ;?>
                    <td style="text-align: left"><?= date_format(date_create($data->created_at),"d M Y - H:i:s")?></td>
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
                  <th>Time</th>
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
