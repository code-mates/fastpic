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
      <?php for($i = 1; $i <= 6; $i++): ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <img class="card-img-top" alt="" style="height: 225px; width: 100%; display: block;" src="http://via.placeholder.com/348x225">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
              </div>
              <small class="text-muted">9 mins</small>
            </div>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</div>
<?php include 'partials/footer.php'; ?>
