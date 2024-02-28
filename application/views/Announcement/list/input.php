
<section class="content-header">
      <h1>
        Announcement
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>Announcement</a></li>
        <li class="active">announcement</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Announcement</h3>
            </div>
            <div class="box-body">
            <?php echo form_open_multipart('Announcement/addAnnouncement')?>
              <div class="form-group mb-5">
                <label for="title" class="form-label"><span style="color: red; margin-right: 3px">*</span>Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
              </div>
              <div class="form-group mb-5">
                <label for="text">Select Category</label>
                  <select class="form-control" name="category">
                    <?php foreach($category as $data) : ?>
                      <option value="<?= $data->id ?>"><?= $data->category ?></option>
                    <?php endforeach ?>    
                  </select>
              </div>
              <div class="form-group mb-5">
                <label for="description" class="form-label"><span style="color: red; margin-right: 3px">*</span>Description</label>
                <textarea class="form-control summernote" id="description" name="description"></textarea>
              </div>
          </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add News</button>
              </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
