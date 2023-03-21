<?php
session_start();
require_once('funcs.php');
require_once('common/footer.php');

$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM photo_memory_table');
$status = $stmt->execute();

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

    <title>photomap</title>
</head>

<body id="main">
<header>
        
        <nav class="navbar navbar-expand-lg nav navbar navbar-dark bg-primary">
        <div class="container-fluid"> 
            <div class="collapse navbar-collapse justify-content-around" id="navbarNav4">
                <ul class="navbar-nav navbar-light me-auto mb-2 mb-lg-0">
                
                    <li class="nav-item"> 
                    <a class="nav-link active" aria-current="page" href="index.php">ブログ画面へ</a>
                    
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a> -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin/index.php">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin/logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">photo map</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="post.php">poment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav> -->
    </header>

    <div class="album py-5 bg-info">
        <figure class="text-center mt-1 mb-5">
            <h1>photomap</h1>
        </figure>
        <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <?php foreach ($contents as $content): ?>
                <!-- <a href="#"> -->

                    <div class="col(-4)">
                        <div class="card shadow-sm">
                        <span class="border border-secondary">
                            <?php if($content['img']) : ?>

                                <img src="./images/<?= $content['img'] ?>" alt="" class="bd-placeholder-img card-img-top img-thumbnail" style="width: 357px; height: 357px; object-fit: cover;" >
                            <?php else : ?>

                            <img src="images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
                            <?php endif ?>
                            
                            <div class="card-body">

                            
                                <h3><?= $content['title'] ?></h3>
                                <p class="card-text"><?=nl2br($content['content'])?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- <small class="text-muted">登録日:<?= $content['date'] ?></small> -->
                                </div>
                                <?php if (!is_null($content['update_time'])): ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- <small class="text-muted">更新日:<?= $content['update_time'] ?></small> -->
                                </div>
                                
                                <?php endif ?>
                                <a href="comment.php?id=<?=$content['id']?>" class=".btn-outline-{primary}.bg-{light}- stretched-link">コメントする</a> 
                            </span>
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?= $footer ?>
</body>
</html>
