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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sliders /</span> Manage Sliders</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
              <h5 class="card-header">Slider List</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Slider Image</th>
                      <th>Category ID</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    // Fetch sliders data from the database
                    $query = "SELECT sliders.*, categories.title AS categories_title 
                    FROM sliders 
                    INNER JOIN categories 
                    ON sliders.category_id = categories.id";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                      $statusBadgeClass = $row['status'] == 1 ? 'bg-label-primary' : 'bg-label-warning';
                      $statusText = $row['status'] == 1 ? 'Active' : 'Inactive';
                      echo "
                      <tr>
                        <td><img src='../uploads/{$row['image']}' alt='Slider Image' class='rounded-circle' width='50' height='50'></td>
                        <td>{$row['categories_title']}</td>
                        <td><span class='badge {$statusBadgeClass} me-1'>{$statusText}</span></td>
                        <td>
                          <div class='dropdown'>
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='edit_slider.php?id={$row['id']}'><i class='bx bx-edit-alt me-1'></i> Edit</a>
                              <a class='dropdown-item' href='delete_slider.php?id={$row['id']}'><i class='bx bx-trash me-1'></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      ";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->

          </div>
          <!-- / Content -->

          <?php require('../layouts/footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>