<?php include 'partials/head.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      <h3>Sign Up</h3>
      <form action="/users" method="post">
        <div class="form-group row">
          <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="user_name" placeholder="User Name">
          </div>
        </div>
        <div class="form-group row">
          <label for="email_address" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email_address" placeholder="email@example.com">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
