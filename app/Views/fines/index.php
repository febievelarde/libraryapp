
<div class="row">
<div class="col-lg-12">
  <div class="card">
    <h5 class="card-header">
      Fines
    </h5>
    <div class="card-body">
      <?php if (isset($success_message)) { ?> 
        <div class="alert alert-success"><?= $success_message ?></div>
      <?php } ?>
      <?php if(isset($fines) && count($fines) != 0): ?>
        <a href="<?= base_url().'libraryapp/public/admin/fines/create' ?>" class="btn btn-lg btn-primary">Add New Fines</a>
        <br><br>
        <table class='table '>
          <thead>
            <th>Book Quantity</th>
            <th>Fines</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
      
          <?php foreach ($fines as $fine):?>
            <tr>
            <td><?= $fine['quantity']; ?></td>
            <td>₱<?= number_format($fine['fines'], 2); ?></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/fines/edit/'.$fine['id'] ?>">Edit</a></td>
            <td width="80"><a href="<?= base_url().'libraryapp/public/admin/fines/destroy/'.$fine['id'] ?>">Delete</a></td>
            </tr>
          <?php endforeach;?>
        
          </tbody>
          </table>
        <?php else:?>
          <header class="jumbotron my-4 col-lg-12">
            <h1 class="display-3">Fines not added yet.</h1>
            <br>
            <a href="<?= base_url().'libraryapp/public/admin/fines/create'; ?>" class="btn btn-primary btn-lg">Add One Now</a>
          </header>
        <?php endif;?>

    </div>
  </div>
     
</div>


</div>