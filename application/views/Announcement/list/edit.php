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
            <?php foreach($announcement as $data) : ?>
            <?php echo form_open_multipart('Announcement/updateAnnouncement/' . $data->id)?>
              <div class="form-group mb-5">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $data->title ?>">
              </div>
              <div class="form-group mb-5">
                <label for="text">Select Category</label>
                  <select class="form-control" name="category">
                    <?php foreach($announcementCategory as $data2) : ?>
                      <option value="<?= $data2->id ?>"><?= $data2->category ?></option>
                    <?php endforeach ?>    
                  </select>
              </div>
              <div class="form-group mb-5">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control summernote" id="description" name="description"><?= $data->description ?></textarea>
              </div>
          </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Announcement</button>
              </div>
        <?php endforeach ?>
        </form>
      </div>
    </section>
    <!-- /.content -->
