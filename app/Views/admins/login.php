
<div class="row pt-5">
  <div class="col"></div>
  <div class="col">
    <div class="card">
      <h5 class="card-header">Librarian Login</h5>
      <div class="card-body">
          <form action="login" method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Username</label>
                <input required  type="text" name="username" class="form-control" placeholder="Enter your username">
              </div>
              
              <div class="form-group">
                <label>Password</label>
                <input required type="password" name="password" class="form-control"  placeholder="Enter your password">
              </div>
              <?php if (isset($error_message)) { ?> 
                <div class="alert alert-danger"><?= $error_message ?></div>
              <?php } ?>
              <button type="submit" class="btn btn-primary">Login</button>
              
          </form>
      </div>
    </div>
  </div>
  <div class="col"></div>
</div>