
<div class="row">
  <div class="col-lg-12 m-auto">
    <div class="card">
      <h5 class="card-header">Borrowed Books</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST" >
          <?php 
             $Student = new \App\Models\Student();
             $Book = new \App\Models\Book();

             $student = $Student->find($borrowed_book['student_id']);
             $book = $Book->find($borrowed_book['book_id']);
          ?>
              <div class="text-center">
              <div class="form-group">
                <small>Student:</small>
                <code class="badge">
                <?= $student['student_id']; ?> |  <?= $student['name']; ?>
                </code>
              </div>
              <div class="form-group">
                <small>Book:</small>
                <code class="badge">
                <?= $book['name']; ?> |  <?= $book['copies']; ?> Copies 
                </code>
              </div>
              <div class="form-group">
                <small>Date Borrowed:</small>
                <code class="badge">
                <?= $borrowed_book['date_borrowed']; ?> 
                </code>
              </div>
              <div class="form-group">
                <small>Date Expected Return:</small>
                <code class="badge">
                <?= $borrowed_book['date_returned']; ?> 
                </code>
              </div>
              <div class="form-group">
                <small>Quantity of Book Borrowed:</small>
                <code class="badge">
                <?= $borrowed_book['quantity']; ?>  <?= ngettext('copy', 'copies', $borrowed_book['quantity']);?>
                </code>
               
              </div>
              </div>
            
              <hr>
              <div class="form-group">
                <label>Status</label>
                <select id="borrowed-book-status" name="status" class="form-control">
                  <option value="borrowed" <?= $borrowed_book['status'] == 'borrowed' ? 'selected' : '' ?> >Borrowed</option>
                  <option value="borrowed-with-fines" <?= $borrowed_book['status'] == 'borrowed-with-fines' ? 'selected' : '' ?> > Borrowed with Fines</option>
                  <option value="returned" <?= $borrowed_book['status'] == 'returned' ? 'selected' : '' ?> >Returned</option>
                </select>
              </div>
              <div class="form-group">
                <label>Fines</label>
                <?php 
                  $Fine = new \App\Models\Fine();
                  $fines = 0;

                  $fine = $Fine->where('quantity', $borrowed_book['quantity'])->first();
                  if(!is_null($fine)){
                    $fines = $fine['fines'];
                  }
                  
                ?>
                <input type="number" id="borrowed-book-fines" name="fines" class="form-control" value="<?= $fines ?>">
              </div>
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/borrowed_books'; ?>">Go back to Borrowed Books</a>
          </form>
      </div>
    </div>
  </div>
</div>