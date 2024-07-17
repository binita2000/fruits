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
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM products WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    $select_data = mysqli_fetch_assoc($select_result);
}

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $rating_id = $_POST['rating_id'];
    $qty = $_POST['qty'];
    $discount = $_POST['discount'];
    $status = $_POST['status'];

    $productsname = $_productsS['dataproducts']['name'];
    $productssize = $_productsS['dataproducts']['size'];

    if ($productsname != "") {
        $explode = explode('.', $productsname);
        $products = strtolower(@$explode['0']);
        $ext = strtolower(@$explode['1']);

        $rep = str_replace(' ', '', $products);
        $finalname = $rep . time() . '.' . $ext;

        if ($productssize < 2 * 1024 * 1024) { // Less than 2 MB
            if (in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
                if (move_uploaded_products($_productsS['dataproducts']['tmp_name'], '../uploads/' . $finalname)) {
                    $products_link = $finalname;
                } else {
                    echo "products is not uploaded";
                    exit;
                }
            } else {
                echo "products extension does not match";
                exit;
            }
        } else {
            echo "products size must be less than 2 MB";
            exit;
        }
    } else {
        $products_link = isset($select_data['image']) ? $select_data['image'] : '';
        $ext = isset($select_data['type']) ? $select_data['type'] : '';
    }

    if ($title != "" && $description != "" && $price != "" && $rating_id != "" && $qty != "" && $discount != "") {
        if (isset($id)) {
            $update = "UPDATE products SET title='$title', description='$description', image='$products_link', price='$price', rating_id='$rating_id', qty='$qty', discount='$discount', status='$status', updated_at=NOW() WHERE id='$id'";
            $result = mysqli_query($conn, $update);
            if ($result) {
                echo "Product is updated";
                echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
            } else {
                echo "Product is not updated";
            }
        } else {
            $insert = "INSERT INTO products (title, description, image, price, rating_id, qty, discount, status, created_at, updated_at) VALUES ('$title', '$description', '$file_link', '$price', '$rating_id', '$qty', '$discount', '$status', NOW(), NOW())";
            $result = mysqli_query($conn, $insert);
            if ($result) {
                echo "Product is submitted";
                header("Refresh:2; URL=index.php");
            } else {
                echo "Product is not submitted";
            }
        }
    } else {
        echo "All fields are required";
    }
}
?>


                                        <form class="row" method="POST" enctype="multipart/form-data" action="">
                                            <?php if (isset($id)) { ?>
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <?php } ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-fullname">Title</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                        <input type="text" name="title" class="form-control" id="basic-icon-default-fullname" placeholder="Enter the title" aria-label="Enter the title" aria-describedby="basic-icon-default-fullname2" required value="<?php echo isset($select_data['title']) ? $select_data['title'] : ''; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-email">Description</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"></span>
                                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required><?php echo isset($select_data['description']) ? $select_data['description'] : ''; ?></textarea>
                                                    </div>
                                                    <div class="form-text">You can use letters & numbers</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-phone">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                                        <input type="file" name="dataFile" accept="image/*" class="form-control" id="file_link" <?php echo isset($id) ? '' : 'required'; ?> />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="form-label" for="basic-icon-default-message">Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status" class="form-control" id="status" required>
                                                        <option value="0" <?php echo (isset($select_data['status']) && $select_data['status'] == '0') ? 'selected' : ''; ?>>Pending</option>
                                                        <option value="1" <?php echo (isset($select_data['status']) && $select_data['status'] == '1') ? 'selected' : ''; ?>>In Progress</option>
                                                        <option value="2" <?php echo (isset($select_data['status']) && $select_data['status'] == '2') ? 'selected' : ''; ?>>Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <?php require ('../layouts/footer.php'); ?>
            </div>
        </div>
    </div>
</body>
