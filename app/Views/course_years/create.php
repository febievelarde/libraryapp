
<div class="row pt-5">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <h5 class="card-header">Course Years</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Course Year Title</label>
                <input required  type="text" name="name" class="form-control" placeholder="Enter the title">
              </div>
              <div class="form-group">
                <label>Course Year Slug</label>
                <input required  type="text" name="slug" class="form-control" placeholder="Enter the slug">
              </div>
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/course_years'; ?>">Go back to course years</a>
          </form>
      </div>
    </div>
  </div>
</div>