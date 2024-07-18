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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">products /</span>Manage products</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
            <h5 class="card-header"><a class="btn btn-primary btn-sm " href="create.php" role="button"> Add Hero</a></h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>discount</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php
                    // Fetch sliders data from the database
                    $query = "SELECT * FROM products";

                    $result = mysqli_query($conn, $query);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title'] ?> </td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['discount'] ?></td>
                        <td><?php
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $discount = $row['discount'];
                            $sub_total = $price * $qty;
                            echo $total = $sub_total - $discount;
                            ?></td>
                        <td><?php echo htmlspecialchars($row['status'] == 1) ? 'Active' : 'In-Active'; ?></td>
                        <td>
                          <div class='dropdown'>
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                              <i class='bx bx-dots-vertical-rounded'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='edit.php?id=<?php echo $row['id'] ?>'><i class='bx bx-edit-alt me-1'></i> Edit</a>
                              <a class='dropdown-item' href='delete.php?id=<?php $row['id']; ?>'><i class='bx bx-trash me-1'></i> Delete</a>
                              <a class='dropdown-item' href='view.php?id=<?php $row['id']; ?>'><i class='bx bx-eyes me-1'></i> View </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->
          </div>
          <!-- / Content -->

          <?php require('../layouts/footer.php'); ?>