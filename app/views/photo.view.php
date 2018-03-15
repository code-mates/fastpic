<?php include 'partials/head.php'; ?>
<?php
$image->ext = pathinfo($image->image_path, PATHINFO_EXTENSION);
$image->filename = pathinfo($image->image_path, PATHINFO_FILENAME);
$image->url = "/{$image->image_url}/{$image->filename}.{$image->ext}";
$image->since = ago($image->created_date);
?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="photo-container box-shadow">
        <img class="photo" alt="" src="<?= $image->url; ?>">
        <div class="photo-meta d-flex justify-content-between">
          <div class="user d-flex justify-content-start">
            <span>by</span> <?= $user->user_name ?>
          </div>
          <div class="photo-data">
              <i class="far fa-heart"></i><span class="likes">123,000</span> |
            <i class="far fa-comments"></i><span class="comments">87</span>
          </div>
          <div class="photo-created">
            <small class="text-muted"><?= $image->since ?></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
