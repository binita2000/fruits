
<?php require('config/config.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Title</title>
    <meta name="description" content="" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!-- Template customizer & Theme config files -->
    <script src="../assets/js/config.js"></script>
</head>


<body>

    <section>
        <div class="container w-25 mx-auto py-5 my-5 shadow">
            <div class="title">
                <h3>Create an Account</h3>
            </div>
            <?php
            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($name != "" && $username != "" && $email != "" && $password != "") {
                    // Check for duplicate email or username
                    $duplicate_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
                    $duplicate_query->bind_param("ss", $email, $username);
                    $duplicate_query->execute();
                    $result = $duplicate_query->get_result();

                    if ($result->num_rows == 0) {
                        // Insert the new user
                        $insert_query = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
                        $insert_query->bind_param("ssss", $name, $username, $email, $password);
                        if ($insert_query->execute()) {
                            echo "<div class='alert alert-success'>Data is submitted</div>";
                            echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email or Username already exists</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>All fields are required</div>";
                }
            }
            ?>
             <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>

              <form id="formAuthentication" class="mb-3" action="index.php" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="../auth/login.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
            <?php
            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($name != "" && $username != "" && $email != "" && $password != "") {
                    // Check for duplicate email or username
                    $duplicate_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
                    $duplicate_query->bind_param("ss", $email, $username);
                    $duplicate_query->execute();
                    $result = $duplicate_query->get_result();

                    if ($result->num_rows == 0) {
                        // Insert the new user
                        $insert_query = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
                        $insert_query->bind_param("ssss", $name, $username, $email, $password);
                        if ($insert_query->execute()) {
                            echo "<div class='alert alert-success'>Data is submitted</div>";
                            echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                        } else {
                            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Email or Username already exists</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>All fields are required</div>";
                }
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" name="register">Submit</button>
                <p> Don't have an account <a href="index.php">Sign In</a></p>
            </form>
        </div>
      </div>
    </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

        </html>