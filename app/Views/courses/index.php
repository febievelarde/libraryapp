
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Courses
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($courses) && count($courses) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/courses/create' ?>" class="btn btn-lg btn-primary">Add New Course</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Course Name</th>
            <th>Course Code</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($courses as $course):?>
            <tr>
            <td><?= $course['name']; ?></td>
            <td><?= $course['code']; ?></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/courses/edit/'.$course['id'] ?>">Edit</a></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/courses/destroy/'.$course['id'] ?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Courses not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/courses/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>