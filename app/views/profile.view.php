<?php include 'partials/head.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 profile-header">
			<h1><?= $user['user_name']; ?></h1>
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
			<div class="col-md-12">No Images Found</div>
			<?php else: ?>
      <?php foreach($images as $image): ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="/<?= $image->image_url; ?>/<?= $image->image_path; ?>">
          <div class="card-body">
            <p class="card-text">Likes: 0 | Comments: 0</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">9 mins</small>
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
