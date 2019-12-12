
<div class="row pt-5">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <h5 class="card-header">Students</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Student ID</label>
                <input required  type="text" name="student_id" class="form-control" placeholder="Enter the student id" value="<?= $student['student_id'] ?>" >
              </div>
              <div class="form-group">
                <label>Student Name</label>
                <input required  type="text" name="name" class="form-control" placeholder="Enter the student name" value="<?= $student['name'] ?>">
              </div>

              <div class="form-group">
                <label>Student Course</label>
                <select name="course_id" class="form-control">
                <?php foreach ($courses as $course) { ?>
                  <option value="<?= $course['id'] ?>" <?= $course['id'] == $student['course_id'] ? 'selected' : '' ?> ><?= $course['code']; ?></option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Student Course Year</label>
                <select name="course_year_id" class="form-control">
                <?php foreach ($course_years as $course_year) { ?>
                  <option value="<?= $course_year['id'] ?>" <?= $course_year['id'] == $student['course_year_id'] ? 'selected' : '' ?> ><?= $course_year['slug']; ?></option>
                <?php } ?>
                </select>
              </div>
              
  
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/students'; ?>">Go back to students</a>
          </form>
      </div>
    </div>
  </div>
</div>