<div>
    <?php if(isset($_SESSION['is_logged_in'])): ?>
    <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>share/add">Share something</a>
    <?php endif; ?>


    <?php foreach ($viewmodel as $item):?>
        <div class="well">
            <h3><?php echo $item['title']; ?> </h3>
            <small><?php echo $item['date']?></small><hr>
            <p><?php echo $item['body']?></p>
            <?php echo '<h2>'.$item['link'].'</h2>';?>

        </div>
    <?php endforeach; ?>
</div>