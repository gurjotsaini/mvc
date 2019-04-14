<div class="container h-100 d-flex justify-content-center">
    <div class="text-center my-auto">
        <br>
        <div class="card text-center">
            <div class="card-header">
                Login User
            </div>
            <div class="card-body">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    <a class="btn btn-success" href="<?php echo ROOT_PATH; ?>users/register">Register</a>
                </form>
            </div>
        </div>
    </div>
</div>