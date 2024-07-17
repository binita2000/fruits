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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimonials/</span> Edit Testimonial</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Testimonial</h5>
                                        <small class="text-muted float-end">Update testimonial information</small>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $select = "SELECT * FROM testimonials WHERE id='$id'";
                                            $select_result = mysqli_query($conn, $select);
                                            $select_data = mysqli_fetch_assoc($select_result);
                                        }

                                        if (isset($_POST['save'])) {
                                            $message = $_POST['message'];
                                            $name = $_POST['name'];
                                            $position = $_POST['position'];

                                            if ($message != "" && $name != "" && $position != "") {
                                                if (isset($id)) {
                                                    $update = "UPDATE Testimonials SET message='$message', name='$name', position='$position' WHERE id='$id'";
                                                    $result = mysqli_query($conn, $update);
                                                    if ($result) {
                                                        echo "<div class='alert alert-success'>Testimonial updated successfully.</div>";
                                                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                    } else {
                                                        echo "<div class='alert alert-danger'>Failed to update testimonial.</div>";
                                                    }
                                                } else {
                                                    echo "<div class='alert alert-danger'>Invalid testimonial ID.</div>";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required.</div>";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" action="">
                                            <?php if (isset($id)) { ?>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <?php } ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="message">Message</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-message"></i></span>
                                                        <textarea name="message" class="form-control" id="message" placeholder="Enter testimonial message" aria-label="Enter testimonial message" aria-describedby="basic-icon-default-message" required><?php echo isset($select_data['message']) ? $select_data['message'] : ''; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="name">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" aria-label="Enter name" aria-describedby="basic-icon-default-name" required value="<?php echo isset($select_data['name']) ? $select_data['name'] : ''; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="position">Position</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-briefcase"></i></span>
                                                        <input type="text" name="position" class="form-control" id="position" placeholder="Enter position" aria-label="Enter position" aria-describedby="basic-icon-default-position" required value="<?php echo isset($select_data['position']) ? $select_data['position'] : ''; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" name="save" class="btn btn-primary">Update Testimonial</button>
                                            </div>
                                        </form>
                                    </div>
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
</body>
