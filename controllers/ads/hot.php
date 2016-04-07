<?php
require_once __DIR__ . '/../../prime.php';
session_start();

$hottest_ads = Ad::show_hottest();




?>
<?php require_once __DIR__ . '/../../views/partials/header.php'; ?>

    <div class="row">
            <?php foreach($hottest_ads as $key => $ad): ?>
                <div class="individualPictureHome col-md-4">
                    <a href="/ads/info?ad=<?=$ad['id'];?>"><img class="img-thumbnail indexPicture" src="<?=$ad['image'];?>" alt="test"></a>
                    <p id="imageTitle"><?=$ad['title'];?></p>
                </div>
                <?php if(($key + 1) % 2 == 0): ?>
                    <div class="col-md-offset-4">
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
    </div>




<?php require_once __DIR__ . '/../../views/partials/footer.php'; ?>

        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
