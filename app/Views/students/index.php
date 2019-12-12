
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Students
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($students) && count($students) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/students/create' ?>" class="btn btn-lg btn-primary">Add New Student</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Course</th>
            <th>Student Course Year</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($students as $student):?>
          <?php 
            $Course = new \App\Models\Course();
            $course = $Course->find($student['course_id']); 

            $CourseYear = new \App\Models\CourseYear();
            $course_year = $CourseYear->find($student['course_year_id']);
            
          ?>
            <tr>
            <td><?= $student['student_id']; ?></td>
            <td><?= $student['name']; ?></td>
            <td><?= $course['code']; ?></td>
            <td><?= $course_year['slug']; ?></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/students/edit/'.$student['id'] ?>">Edit</a></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/students/destroy/'.$student['id'] ?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Students not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/students/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>