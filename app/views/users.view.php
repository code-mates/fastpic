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
      if (!$users) {
        echo '<tr><td colspan="2">0 Users found</td></tr>';
      }
      foreach($users as $user):
      ?>
        <tr>
          <?php
            echo '<td><a href="/profile/' . $user->user_name .'">' . $user->user_name . '</a></td>';
            echo '<td>' . $user->email_address . '</td>';
           ?>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
