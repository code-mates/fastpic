<?php include 'partials/head.php'; ?>
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

      <h3>Register your user</h3>

      <form action="/users" method="post">
        <label for="user_name">User Name:</label>
        <input type="text" name="user_name" value="">
        <label for="email_address">Email Address:</label>
        <input type="text" name="email_address" value="">
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
<?php include 'partials/footer.php'; ?>
