<?php include 'partials/head.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col titles">
      <h1>Welcome to Fastpic</h1>
      <h2>Share your photos with others</h2>
    </div>
  </div>
</div>

<div class="latest py-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3>Latest Photos</h3>
      </div>
    </div>
    <div class="row">
			<?php if (!$images): ?>
			<div class="col-md-12 text-center">No Images Found</div>
			<?php else: ?>
      <?php foreach($images as $image):
				$image->ext = pathinfo($image->image_path, PATHINFO_EXTENSION);
				$image->filename = pathinfo($image->image_path, PATHINFO_FILENAME);
				$image->url = "/{$image->image_url}/{$image->filename}_resize.{$image->ext}";
				$image->since = ago($image->created_date);
			?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="<?= $image->url; ?>">
          <div class="card-body">
            <p class="card-text">
							<i class="far fa-heart"></i><span class="likes">123,000</span> |
							<i class="far fa-comments"></i><span class="comments">87</span>
						</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted"><?= $image->since ?></small>
            </div>
          </div>
        </div>
      </div>
			<?php endforeach; ?>
			<?php endif; ?>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
