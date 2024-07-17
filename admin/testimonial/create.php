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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">testimonials/</span> Add testimonial
                        </h4>

                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic with Icons -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0"><a class="btn btn-primary btn-sm " href="index.php" role="button"> Manage testimonial</a></h5>
                                    <small class="text-muted float-end">Merged input group</small>
                                    </div>
                                    <div class="card-body">

                                        <?php



                                        if (isset($_POST['save'])) {

                                           
                                            $message = $_POST['message'];
                                            $image = $_POST['image'];
                                            $name = $_POST['name'];
                                            $profession = $_POST['profession'];
                                            
                                           

                                            if ($message != "" && $image != "" && $name != "" && $profession !="") {
                                                $insert = "INSERT INTO testimonial (message, image,  name, profession) 
                                                VALUES ('$message', '$image', '$name','$profession')";
                                                $result = mysqli_query($conn, $insert);

                                                if ($result) {
                                                    echo "<div class='alert alert-success'>Data is submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                                                } else {
                                                    echo "<div class='alert alert-danger'>Data is not submitted</div>";
                                                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                                                }
                                            } else {
                                                echo "<div class='alert alert-danger'>All fields are required</div>";
                                            }

                                            // Redirect after 0 seconds
                                            echo "<meta http-equiv=\"refresh\" content=\"4;URL=create.php\">";
                                        }
                                        ?>

                                        <form class="row" method="POST" enctype="multipart/form-data" action="">


                                            

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">message</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"><i class="bx bx-message-square-dots"></i></span>
                                                        <textarea name="message" class="form-control" id="basic-icon-default-description" placeholder="Enter message" aria-label="Enter description" aria-describedby="basic-icon-default-description2"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">Image</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"><i class="bx bx-image"></i></span>
                                                        <input type="text" name="image" class="form-control" id="basic-icon-default-image" placeholder="Enter image URL from Flies" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-description">name</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-description2" class="input-group-text"></span>
                                                        <input type="text" name="name" class="form-control" id="basic-icon-default-image" placeholder="Enter name" aria-label="" aria-describedby="basic-icon-default-image2" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                                <label class="col-form-label" for="basic-icon-default-image">profession</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-image2" class="input-group-text"></span>
                                                        <input type="text" name="profession" class="form-control" id="basic-icon-default-image" placeholder="Enter profession" aria-label="" aria-describedby="basic-icon-default-image2" />
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