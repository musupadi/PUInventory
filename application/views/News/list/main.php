
<section class="content-header">
      <h1>
        News
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>News</a></li>
        <li class="active">News</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">News</h3>
            </div>
            <!-- /.box-header -->
            <a href="<?= base_url('News/addNews') ?>" class="btn btn-success btn-sm" style="width: 100px; margin-left: 10px"><i class="fa fa-fw fa-plus"></i>Add News</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th style="width: 40px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id = 1;
                foreach ($news as $data) {

                ?>
                <tr>
                  <td><?php echo $id++?></td>
                  <td><?php echo $data->title?></td>
                  <td><?php echo $data->category?></td>
                  <td><?php echo $data->description?></td>
                  <td style="text-align: center;">
                    <a href="<?= base_url('news/updateNews/' . $data->id) ?>">
                      <i class="fa fa-fw fa-pencil"></i>
                    </a> 
                    <a href="<?= base_url('news/deleteNews/' . $data->id) ?>" onclick="return confirm('Data akan dihapus')">
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
                  <th>Title</th>
                  <th>Category</th>
                  <th>Description</th>
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



