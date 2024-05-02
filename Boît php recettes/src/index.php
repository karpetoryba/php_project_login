<?php require_once './parts/header.php';?>

        <form class="text-center m-3" action="./scripts/check.php" method="POST">
        <div class="container mt-4">
        <h1>Login Page</h1>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            <button class="btn btn-success" type="submit">Enter</button>
            </div>
        </form>  

        <?php require_once './parts/footer.php';?>