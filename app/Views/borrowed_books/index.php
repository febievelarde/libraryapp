
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Borrowed Books
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($borrowed_books) && count($borrowed_books) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/borrowed_books/create' ?>" class="btn btn-lg btn-primary">Add New Borrower</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Student Course|ID|Name</th>
            <th>Book ISBN|Copies</th>
            <th>Qty</th>
            <th>Date Borrowed</th>
            <th>Status</th>
            <th>Fines</th>
            <th colspan="3">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($borrowed_books as $borrowed_book):?>
          <?php 
            $Student = new \App\Models\Student();
            $Course = new \App\Models\Course();
            $Book = new \App\Models\Book();
            
            $student = $Student->find($borrowed_book['student_id']);
            $book = $Book->find($borrowed_book['book_id']);
            $course = $Course->find($student['course_id']);
          ?>
            <tr>
            <td ><?= $course['code'] ?> | <?= $student['student_id']; ?> | <?= $student['name']; ?> </td>
            <td title='<?= $book['name']; ?> | <?= $book['copies']." ".ngettext("copy", "copies", $book['copies'])." avaiable"; ?>'><?= $book['isbn']; ?> | <?= $book['copies']." ".ngettext("copy", "copies", $book['copies']); ?></td>
            <td><?= $borrowed_book['quantity'] ?></td>
            <td>
              <small><?= $borrowed_book['date_borrowed'] ?> TO</small> 
              
              
              <?php 
            
                $date =date('m/d/Y');
          
                $color = "black";
                if( $borrowed_book['status'] == 'returned'){
                  $color = "green";
                }else{
                  if($date == $borrowed_book['date_returned']){
                    $color = "orange";
                  }else if($borrowed_book['status'] == 'borrowed-with-fines'){
                    $color = "red";
                  }
                }
              ?>
              <span style="color:<?= $color ?>; font-weight:bold">
                <?= $borrowed_book['date_returned'] ?>
              </span>
              <p>
             
             
              </p>
              
            </td>
            <td>
                <?php 
                  $badge_default = "badge-dark";
                  $status_display = $borrowed_book['status'];
                  if ($borrowed_book['status'] == 'returned') {
                    $badge_default = "badge-success";
                  }else if($borrowed_book['status'] == 'borrowed-with-fines'){
                    $badge_default = "badge-danger";
                    $status_display = "Borrowed with Fines";
                  }
                ?>
                <span class="badge <?= $badge_default; ?>"><?= ucfirst($status_display) ?></span>
            </td>
            <td>
            
            

            <?php if($borrowed_book['status'] != 'returned'): ?>
              <?php if($borrowed_book['status'] == 'borrowed-with-fines'): ?>
                <span style="color:red">₱<?= number_format($borrowed_book['fines'], 2) ?></span>
              <?php else: ?>
                ₱<?= number_format($borrowed_book['fines'], 2) ?>
              <?php endif; ?>
              
            <?php else: ?>
             <strike>₱<?= number_format($borrowed_book['fines'], 2) ?></strike>
            <?php endif; ?>
              
            </td>
            
            
            <?php if($borrowed_book['status'] != 'returned'): ?>
              <td width="80"><a href="<?= base_url().'libraryapp/public/admin/borrowed_books/return/'.$borrowed_book['id'] ?>">Return</a></td>
              <?php if($borrowed_book['status'] == 'borrowed'): ?>
                <td width="80"><a href="<?= base_url().'libraryapp/public/admin/borrowed_books/edit/'.$borrowed_book['id'] ?>">Edit</a></td>
                <td width="80"><a href="<?= base_url().'libraryapp/public/admin/borrowed_books/destroy/'.$borrowed_book['id'] ?>">Delete</a></td>
              <?php endif; ?>
            <?php else: ?>
              <td width="80"><a href="javascript:void(0);"><strike>Delete</strike></a></td>
            <?php endif; ?>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Borrowed Books not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/borrowed_books/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>