
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Course Years
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($course_years) && count($course_years) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/course_years/create' ?>" class="btn btn-lg btn-primary">Add New Course Year</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Course Year Title</th>
            <th>Course Year Slug</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($course_years as $course_year):?>
            <tr>
            <td><?= $course_year['name']; ?></td>
            <td><?= $course_year['slug']; ?></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/course_years/edit/'.$course_year['id'] ?>">Edit</a></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/course_years/destroy/'.$course_year['id'] ?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Course Years not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/course_years/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>