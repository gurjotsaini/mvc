<div class="container h-100 d-flex justify-content-center">
    <div class="text-center my-auto">
        <br>
        <div class="card text-center">
            <div class="card-header">
                Share Something
            </div>
            <div class="card-body">
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="title">Share Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="body">Share Body</label>
                        <textarea name="body" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">Share Link</label>
                        <input type="text" name="link" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>Shares">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>