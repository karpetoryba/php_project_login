<?php require_once './parts/header.php';?>
<div class="container">
        <form class="text-center m-4"  action="./scripts/check.php" method="POST">
        <div class="container">
        <h1>Welcome</h1>
        <h2>It's my web cite for recipes<h2/>
        <div class="login">
            <input type="text" class="form-control m-2" id="username" name="username" placeholder="Enter username">
            <button class="btn btn-success center m-2" type="submit">Enter</button>
            </div>
</div>
        </form>  
</div>


<?php require_once './parts/footer.php';?>