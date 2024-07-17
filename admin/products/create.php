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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">products/</span> Add products</h4>

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
                                            $title = $_POST['title'];
                                            $description = $_POST['description'];
                                            $price = $_POST['price'];
                                            $rating_id = $_POST['rating_id'];
                                            $qty = $_POST['qty'];
                                            $discount = $_POST['discount'];

                                            $productname = $_PRODUCTS['dataproducts']['name'];
                                            $productsize = $_PRODUCTS['dataproducts']['size'];

                                            $explode = explode('.', $productsname);
                                            $products = strtolower($explode[0]);
                                            $ext = strtolower($explode[1]);

                                            $rep = str_replace(' ', '', $products);
                                            $finalname = $rep . time() . '.' . $ext;

                                            if ($title != "" && $description != "" && $productsname != "") {
                                                if ($productsize < 2 * 1024 * 1024) { // Less than 2 MB
                                                    if (in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
                                                        if (move_uploaded_file($_products['dataproducts']['tmp_name'], '../uploads/' . $finalname)) {
                                                            $insert = "INSERT INTO products (title, description, image, price, rating_id, qty, discount, status, created_at, updated_at) VALUES ('$title', '$description', '$image', '$price', '$rating_id', '$qty', '$discount', 1, NOW(), NOW())";
                                                            $result = mysqli_query($conn, $insert);
                                                            if ($result) {
                                                                echo "products is submitted";
                                                                echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
                                                            } else {
                                                                echo "products is not submitted";
                                                            }
                                                        } else {
                                                            echo "products is not uploaded";
                                                        }
                                                    } else {
                                                        echo "products extension does not match";
                                                    }
                                                } else {
                                                    echo "products size must be less than 2 MB";
                                                }
                                            } else {
                                                echo "All fields are required";
                                            }
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <!-- Title -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-fullname">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                        <input type="text" name="title" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the title" aria-label="Enter the title" aria-describedby="basic-icon-default-fullname2" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Description -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-email">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"></span>
                                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                                    </div>
                                                    <div class="form-text">You can use letters & numbers</div>
                                                </div>
                                            </div>
                                            <!-- Image -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-phone">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="file" name="dataFile" accept="image/*" class="form-control" id="file_link" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Price -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-price">Price</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-dollar"></i></span>
                                                        <input type="number" name="price" class="form-control" id="basic-icon-default-price" placeholder="Enter the price" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rating ID -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-rating_id">Rating ID</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-star"></i></span>
                                                        <input type="number" name="rating_id" class="form-control" id="basic-icon-default-rating_id" placeholder="Enter the rating ID" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Quantity -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-qty">Quantity</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-layer"></i></span>
                                                        <input type="number" name="qty" class="form-control" id="basic-icon-default-qty" placeholder="Enter the quantity" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Discount -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-discount">Discount</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"><i class="bx bx-percent"></i></span>
                                                        <input type="number" name="discount" class="form-control" id="basic-icon-default-discount" placeholder="Enter the discount" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Status -->
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-status">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0">Pending</option>
                                                        <option value="1">In Progress</option>
                                                        <option value="2">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Submit Button -->
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- / Content -->

                                        <?php require('../layouts/footer.php'); ?>
                                    </div>
                                </div>
                            </div>
</body>