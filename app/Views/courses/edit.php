
<div class="row pt-5">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <h5 class="card-header">Courses</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Course Title</label>
                <input required  type="text" name="name" class="form-control" placeholder="Enter the title" value="<?= $course['name'] ?>">
              </div>
              <div class="form-group">
                <label>Course Code</label>
                <input required  type="text" name="code" class="form-control" placeholder="Enter the code" value="<?= $course['code'] ?>">
              </div>
              <button type="submit" class="btn btn-primary">Update</button> | <a href="<?= base_url().'libraryapp/public/admin/courses'; ?>">Go back to courses</a>
          </form>
      </div>
    </div>
  </div>
</div>