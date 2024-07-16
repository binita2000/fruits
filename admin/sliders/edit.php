<?php require('../layouts/header.php'); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php require('../layouts/sidebar.php'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php require('../layouts/navbar.php'); ?>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sliders/</span> Edit Slider</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
              <!-- Basic with Icons -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Slider</h5>
                    <small class="text-muted float-end">Merged input group</small>
                  </div>
                  <div class="card-body">
                    <?php
                      // Fetch slider data from the database using slider ID
                      $sliderId = $_GET['id'];
                      $query = "SELECT * FROM sliders WHERE id = $sliderId";
                      $result = mysqli_query($conn, $query);
                      $slider = mysqli_fetch_assoc($result);
                    ?>
                    <form class="row" action="update_slider.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $slider['id']; ?>" />
                      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="col-form-label" for="basic-icon-default-name">Name</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-name2" class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="basic-icon-default-name" name="name" value="<?php echo $slider['name']; ?>" placeholder="John Doe" aria-label="John Doe" aria-describedby="basic-icon-default-name2" />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="col-form-label" for="basic-icon-default-category">Category ID</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-category2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" id="basic-icon-default-category" class="form-control" name="category_id" value="<?php echo $slider['category_id']; ?>" placeholder="ACME Inc." aria-label="ACME Inc." aria-describedby="basic-icon-default-category2" />
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="col-form-label" for="basic-icon-default-image">Image</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-image"></i></span>
                            <input type="file" id="basic-icon-default-image" class="form-control" name="image" aria-describedby="basic-icon-default-image2" />
                          </div>
                          <div class="mt-2">
                            <img src="../uploads/sliders/<?php echo $slider['image']; ?>" alt="Slider Image" class="rounded-circle" width="100" height="100">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <label class="col-form-label" for="basic-icon-default-status">Status</label>
                        <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-status2" class="input-group-text"><i class="bx bx-check"></i></span>
                            <select class="form-control" id="basic-icon-default-status" name="status" aria-describedby="basic-icon-default-status2">
                              <option value="1" <?php echo $slider['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                              <option value="0" <?php echo $slider['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <?php require('../layouts/footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
