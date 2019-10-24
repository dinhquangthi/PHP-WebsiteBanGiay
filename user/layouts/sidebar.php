<?php 

$sqlNew = "SELECT * FROM news ORDER BY created_at DESC";
$new = $db->fetchsql($sqlNew); 

?>
<div class="row">
    <div class="list-product__news">
        <h4><i class="far fa-newspaper" style="margin-right:10px;"></i>Tin Tức</h4>
        <?php $countNew=1; foreach($new as $value) : ?>
        <div class="row news">
            <?php foreach (unserialize(base64_decode($value['image'])) as $key => $val ) : ?>
            <?php 
                           if($key == 0) {
                            $thumb = $val;
                           }
                           ?>
            <?php endforeach ?>
            <a href="<?php echo url_home()?>/news.php?id=<?php echo $value['id'] ?>">
            <img src="<?php echo url_home() ?>/public/uploads/uploads-new/<?php echo $thumb ?>">
            </a>

            <a href="<?php echo url_home()?>/news.php?id=<?php echo $value['id'] ?>">
                <p><?php echo $value['title'] ?></p>
            </a>
        </div>
        <?php if($countNew > 3) : ?><?php break; endif ?>
        <?php $countNew++; endforeach ?>
    </div>
</div>