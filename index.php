<!doctype html>
<?php
require "apis/DataBase.php";
$db = new DataBase();
?>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="apis/assets/css/bootstrap.min.css">
    <title>CCASTER</title>

</head>
<body class="d-flex flex-column h-100">
<!--style="background-image: url('apis/assets/img/pubg-m.png'); background-repeat: no-repeat; background-size: cover;"-->
<div class="container">
    <div class="d-flex justify-content-center"
         style="margin-left:-16px !important; margin-right: -16px !important; background-image: url('apis/assets/img/pubg-m.png'); background-repeat: no-repeat; background-size: cover;">
        <img src="apis/assets/img/pubg.png">
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="shadow-sm card bg-white ">
                <div class="card-header bg-white shadow-sm">Create new user</div>
                <div class="card-body">
                    <form class="row g-3 mt-1" action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Access Key</span>
                                <input name="authKey" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Email</span>
                                <input name="username" type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Password</span>
                                <input name="password" type="text" class="form-control" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-dark" value="Submit" name="submit">
                        <?php
                        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['authKey'])) {
                            if ($_POST['authKey'] == "key_Y2Nhc3RlcktleU1haW4") {
                                if ($db->dbConnect()) {
                                    if ($db->signUp($_POST['username'], $_POST['password'])) {
                                        $db->alert('success', "User added.");
                                    }
                                } else $db->alert("danger", "Database failed.");
                            } else $db->alert("danger", "Not authorized.");
                        }
                        ?>
                    </form>
                    <br>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header bg-white shadow-sm">Cheat status</div>
                <div class="card-body">
                    <form class="row g-3 mt-1" action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">Access Key</span>
                                <input name="authKey" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div>
                            <span class="btn btn-success m-2">
                                <label class="mr-2">Enable</label>
                                <input style="transform: scale(2);" type="radio" name="status" value="true" required>
                            </span>
                            <span class="btn btn-danger m-2">
                                <label class="mr-2">Disable</label>
                                <input style="transform: scale(2);" type="radio" name="status" value="false" required>
                            </span>
                        </div>
                        <input type="submit" class="btn btn-dark" value="Submit" name="submitCheat">
                        <?php
                        if (isset($_POST['status']) && isset($_POST['authKey'])) {
                            if ($_POST['authKey'] == "key_Y2Nhc3RlcktleU1haW4") {
                                if ($db->dbConnect()) {
                                    if ($db->putController($_POST['authKey'], $_POST['status'])) {
                                        $db->alert('success', "Status updated.");
                                    }
                                } else $db->alert("danger", "Database failed.");
                            } else $db->alert("danger", "Not authorized.");
                        }
                        ?>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer mt-auto py-3">
    <div class="container-fuild text-center text-dark">
        <span class="font-weight-light text-declaimer text-muted">
            Copyright &copy; 2020
        </span>
    </div>
</footer>
<script src="apis/assets/js/bootstrap.min.js"></script>
</body>
</html>
