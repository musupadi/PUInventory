
<section class="content-header">
      <h1>
        News
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i>News</a></li>
        <li class="active">news</li>
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
            <div class="box-body">
            <?php echo form_open_multipart('News/addNews')?>
              <div class="form-group mb-5">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
              </div>
              <div class="form-group mb-5">
                <label for="text">Select Category</label>
                  <select class="form-control" name="category">
                    <?php foreach($news as $data) : ?>
                      <option value="<?= $data->id ?>"><?= $data->category ?></option>
                    <?php endforeach ?>    
                  </select>
              </div>
              <div class="form-group mb-5">
                <label for="description" class="form-label">Description</label>
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
