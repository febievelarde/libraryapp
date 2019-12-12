
<div class="row">
  <div class="col-lg-12 m-auto">
    <div class="card">
      <h5 class="card-header">Borrowed Books</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <?php if (isset($error_message)) { ?> 
            <div class="alert alert-danger"><?= $error_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Student ID</label>
                <select name="student_id" class="form-control">
                <?php foreach ($students as $student) { ?>
                  <option value="<?= $student['id'] ?>"><?= $student['student_id']; ?> | <?= $student['name'] ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Book</label>
                <select name="book_id" class="form-control">
                <?php foreach ($books as $book) { ?>
                  <option value="<?= $book['id'] ?>"><?= $book['name']; ?> | <?= $book['copies']." Copies" ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Quantity</label>
                <input required  type="number" name="quantity" class="form-control" value="1">
              </div>
              <div class="form-group">
                <label>Date Borrowed</label>
                <input required  type="date" name="date_borrowed" id="date_borrowed" class="form-control" >
              </div>
              <div class="form-group">
                <label>Date Expected Return</label>
                <input required  type="date" name="date_returned" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/borrowed_books'; ?>">Go back to Borrowed Books</a>
          </form>
      </div>
    </div>
  </div>
</div>

  