
<div class="row pt-5">
  <div class="col-lg-6 m-auto">
    <div class="card">
      <h5 class="card-header">Fines</h5>
      <div class="card-body">
          <?= \Config\Services::validation()->listErrors(); ?>
          <?php if (isset($success_message)) { ?> 
            <div class="alert alert-success"><?= $success_message ?></div>
          <?php } ?>
          <form action="" method="POST"  >
              <div class="form-group">
                <label>Book Quantity</label>
                <input required  type="number" name="quantity" class="form-control" value="<?= $fine['quantity'] ?>" >
              </div> 
              <div class="form-group">
                <label>Fines (PHP)</label>
                <input required  type="number" name="fines" class="form-control" value="<?= $fine['fines'] ?>"  >
              </div>
              <button type="submit" class="btn btn-primary">Save</button> | <a href="<?= base_url().'libraryapp/public/admin/fines'; ?>">Go back to fines</a>
          </form>
      </div>
    </div>
  </div>
</div>