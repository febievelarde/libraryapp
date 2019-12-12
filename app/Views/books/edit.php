
<div class="row pt-5">
  <div class="col-lg-12 m-auto">
    <div class="card">
      <h5 class="card-header">Books</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Book Title</label>
                <input required  type="text" name="name" class="form-control" placeholder="Enter the title" value="<?= $book['name'] ?>" >
              </div>
              <div class="form-group">
                <label>Book ISBN</label>
                <input required  type="text" name="isbn" class="form-control" placeholder="Enter the isbn" value="<?= $book['isbn'] ?>">
              </div>
              <div class="form-group">
                <label>Book Description</label>
                <textarea required name="description" rows="5" class="form-control"><?= $book['description'] ?></textarea>
              </div>
              <div class="form-group">
                <label>Book Date Published</label>
                <input required  type="date" name="date_published" class="form-control" value="<?= $book['date_published'] ?>">
              </div>
              <div class="form-group">
                <label>Book Copies</label>
                <input required  type="number" name="copies" class="form-control" value="<?= $book['copies'] ?>">
              </div>
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/books'; ?>">Go back to books</a>
          </form>
      </div>
    </div>
  </div>
</div>