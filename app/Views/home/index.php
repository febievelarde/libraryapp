
<?php 
  $Student = new \App\Models\Student();
  $Course = new \App\Models\Course();
  $CourseYear = new \App\Models\CourseYear();
  $Book = new \App\Models\Book();
  $Fine = new \App\Models\Fine();
  $BorrowedBook = new \App\Models\BorrowedBook();
?>

<div class="row  p-4">
   <h1 class="col-lg-12">Dashboard</h1>
    <div class="col-lg-2">
      <div class="card text-center bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Students</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($Student->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/students'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="card text-center bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Courses</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($Course->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/courses'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="card text-center bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Course Years</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($CourseYear->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/course_years'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="card text-center  bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Fines</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($Fine->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/fines'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="card text-center bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Books</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($Book->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/books'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-2">
      <div class="card text-center  bg-default mb-3">
        <div class="card-body">
          <h5 class="card-title">Borrowed Books</h5>
          <p class="card-text badge badge-info" style="font-size:50px">
            <?= count($BorrowedBook->findAll()); ?>
          </p>
          <p class="card-text ">
            <a href="<?= base_url().'libraryapp/public/admin/borrowed_books'; ?>" class="btn btn-default">See more Details</a>
          </p>
        </div>
      </div>
    </div>
  </div>