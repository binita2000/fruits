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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">sliders/</span> Add Slider</h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Basic with Icons</h5>
                                        <small class="text-muted float-end">Merged input group</small>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset($_POST['save'])) {
                                            $category_id = $_POST['category_id'];
                                            $image = $_FILES['image']['name'];
                                            $image_temp = $_FILES['image']['tmp_name'];
                                            $image_folder = '../uploads/sliders/' . $image;
                                            $status = $_POST['status'];

                                            if ($category_id != "" && $status != "" && $image != "") {
                                                move_uploaded_file($image_temp, $image_folder);
                                                $insert = "INSERT INTO sliders (category_id, image, status) VALUES ('$category_id', '$image', '$status')";
                                                $result = mysqli_query($conn, $insert);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Slider is added</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Slider is not added</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-category_id">Category Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-category_id2" class="input-group-text"><i class="bx bx-category"></i></span>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <?php 
                                                            
                                                            
                                                            ?>
                                                            <option selected>Open this select menu</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="basic-icon-default-status" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="file" name="image" class="form-control" id="basic-icon-default-image" aria-label="Upload image" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <button type="submit" name="save" class="btn btn-primary">Submit</button>
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