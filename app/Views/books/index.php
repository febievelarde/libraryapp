
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Books
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($books) && count($books) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/books/create' ?>" class="btn btn-lg btn-primary">Add New Book</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Book ISBN</th>
            <th>Book Title</th>
            <th>Copies</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($books as $book):?>
            <tr>
            <td><?= $book['isbn']; ?></td>
            <td><?= $book['name']; ?></td>
            <td>
              <?= $book['copies']; ?>
              <?php if ($book['copies'] <= 0 ): ?>
              <small style="color:red">(Out of Stock)</small>
              <?php endif; ?>
            </td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/books/edit/'.$book['id'] ?>">Edit</a></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/books/destroy/'.$book['id'] ?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Books not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/books/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>