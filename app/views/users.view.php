<?php include 'partials/head.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
			<h1>All Users</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email Address</th>
          </tr>
        </thead>
      <?php
      foreach($users as $user):
      ?>
        <tr>
          <?php
            echo '<td><a href="/users/' . $user->user_id .'">' . $user->user_name . '</a></td>';
            echo '<td>' . $user->email_address . '</td>';
           ?>
        </tr>
      <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
