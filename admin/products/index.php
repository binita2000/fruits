<?php require ('../layouts/header.php'); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php require ('../layouts/sidebar.php'); ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php require ('../layouts/navbar.php'); ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <!-- $select_query = "SELECT * FROM files ORDER BY id DESC";
          $result = mysqli_query($conn, $select_query);

          if (!$result) {
          die("Query failed: " . mysqli_error($conn));
          } -->
          
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">products /</span> Basic products</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
    <h5 class="card-header">Products Basic</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Image Link</th>
                    <th>Price</th>
                    <th>Rating ID</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php
                $select = "SELECT * FROM products";
                $select_result = mysqli_query($conn, $select);
                $i = 1;
                while ($data = mysqli_fetch_array($select_result)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo htmlspecialchars($data['title']); ?></td>
                        <td><?php echo htmlspecialchars($data['description']); ?></td>
                        <td><img src="<?php echo "../uploads/" . htmlspecialchars($data['image']); ?>" width="100" height="100" alt="Product Image"></td>
                        <td><?php echo htmlspecialchars($data['image']); ?></td>
                        <td><?php echo htmlspecialchars($data['price']); ?></td>
                        <td><?php echo htmlspecialchars($data['rating_id']); ?></td>
                        <td><?php echo htmlspecialchars($data['qty']); ?></td>
                        <td><?php echo htmlspecialchars($data['discount']); ?></td>
                        <td><?php echo $data['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="edit.php?id=<?php echo $data['id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Do you want to delete this product?');"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

          <!-- / Content -->

          <?php require ('../layouts/footer.php'); ?>
        </div>
      </div>
    </div>
  </div>
</body>