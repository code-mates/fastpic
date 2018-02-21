<?php include 'partials/head.php'; ?>
  <div class="row">
    <div class="col">
      <table>
      <?php
      foreach($users as $user):
      ?>
        <tr>
          <?php
            echo '<td>' . $user->user_id . '</td>';
            echo '<td>' . $user->name . '</td>';
            echo '<td>' . $user->email_address . '</td>';
           ?>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
<?php include 'partials/footer.php'; ?>
