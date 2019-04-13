<div class="container h-100 d-flex justify-content-center">
    <div class="text-center my-auto">
        <br>
        <a class="btn btn-success text-center btn-share" href="<?php echo ROOT_PATH; ?>Shares/add">Share Something</a>
        <?php foreach ($viewModel as $item) : ?>
            <div class="jumbotron">
                <h3><?php echo $item['title']; ?></h3>
                <small><?php echo $item['create_date']; ?></small>
                <hr>
                <p><?php echo $item['body']; ?></p>
                <br>
                <a class="btn btn-primary" href="<?php echo $item['link']; ?>" target="_blank">Go to website</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>