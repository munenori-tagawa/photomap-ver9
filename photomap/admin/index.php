<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM photo_memory_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>master's page</title>
    <? head_parts('masters page')?>
    
    <!-- <style>
        .img-size{
            width: 1000px;
            height: 1000px;
            object-fit: cover;   
    }
    </style> 
     -->
         <!-- <style>
.img-size{
    width: 30px;
    height: 30px;
    object-fit: cover;   
}
    </style>-->    
        <!-- <div class="img-size"> -->
<!-- <style>
    .alfa { color: purple;
     }
    .beta {
     color: yellow-300;
     background-color: indigo-900;
    }
</style> -->

</head>

<body id="main">
    <header>
        
        <nav class="navbar navbar-expand-lg nav navbar navbar-dark bg-primary">
            <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-around" id="navbarNav4">
                <ul class="navbar-nav navbar-light me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ブログ画面へ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">投稿一覧</a> -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    


        
        <div class="album py-5 bg-light">
        <figure class="text-center mt-1 mb-5">
            <h1>master's page</h1> 
        </figure>      

        <div class="container text-center">

            <!--写真のサイズはここで変える-->
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-5 g-1">
            <!---------------------------->
                <?php foreach ($contents as $content): ?>
                <!-- <a href="#"> -->
                    <div class="col(-3)">
                        <div class="card shadow-sm">
                       
                            <span class="border border-light">
                            <?php if($content['img']) : ?>

                            <img src="../images/<?= $content['img'] ?>" alt="" class="bd-placeholder-img card-img-top img-thumbnail" style="width: 358px; height: 358px; object-fit: cover;" >
                            <?php else : ?>
                            <img src="../images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                            <?php endif ?>

                            <div class="card-body">
                                <h3><?= $content['title'] ?></h3>
                                <p class="card-text"><?=nl2br($content['content'])?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">登録日:<?= $content['date'] ?></small>
                                </div>
                                
                                <?php if (!is_null($content['update_time'])): ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">更新日:<?= $content['update_time'] ?></small>
                                </div>
                                <?php endif ?>
                                <a href="detail.php?id=<?=$content['id']?>" class=".btn-outline-{primary}.bg-{light}- stretched-link">編集する</a> 
                                </span>
                            </div>
                        </div>
                    </div>
        
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('sw.js').then(function(registration) {
          console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
          console.log('ServiceWorker registration failed: ', err);
        });
      });
    }
  </script> -->
</body>
</html>
