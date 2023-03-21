<?php
session_start();
require_once('./funcs.php');
loginCheck();

$id = $_GET['id'];
// $comment_id = implode(",", $id);
$comment_id = $id;
$pdo = db_conn();

var_dump($comment_id);
var_dump($id);

// ２．データ登録SQL作成
// $stmt = $pdo->prepare('SELECT * FROM photo_memory_table WHERE id=:id');
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

$pdo = db_conn();
$stmt2 = $pdo->prepare('SELECT * FROM photo_memory_table WHERE id = :id');
$stmt2->bindValue(':id', $id,PDO::PARAM_INT);
$status2 = $stmt2->execute();

$view = '';
if ($status2 == false) {
    sql_error($stmt2);
} else {
    $contents = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}


$pdo = db_conn();
$stmt3 = $pdo->prepare('SELECT * FROM comment_table WHERE comment_id = :id');
$stmt3->bindValue(':id', $id,PDO::PARAM_INT);
$status3 = $stmt3->execute();

$view = '';
if ($status3 == false) {
    sql_error($stmt3);
} else {
    $comment_list = $stmt3->fetchAll(PDO::FETCH_ASSOC);
}

// $pdo = db_conn();
// $stmt4 = $pdo->prepare('SELECT * FROM comment_table WHERE comment_id = :id');
// $stmt4->bindValue(':id', $id,PDO::PARAM_INT);
// $status4 = $stmt3->execute();

// $view = '';
// if ($status4 == false) {
//     sql_error($stmt4);
// } else {
//     $comment_list = $stmt4->fetchAll(PDO::FETCH_ASSOC);
// }

//３．データ表示
// if ($status == false) {
//     sql_error($stmt);
//     return;
// } else {
//     $row = $stmt->fetch();
// }
//     $data = "row";
//     var_dump($id); 
if(isset($_POST["addComment"])){


$comment_title = $_POST['comment_title'];
$comment = $_POST['comment'];  

$stmt = $pdo->prepare('INSERT INTO comment_table(
                             comment_id,
                             comment_title,
                             comment
                             )VALUES(
                             :comment_id,
                             :comment_title,
                             :comment
                                )');


$stmt->bindValue(':comment_id', $comment_id,PDO::PARAM_INT);
$stmt->bindValue(':comment_title', $comment_title, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute(); //実行
    
if (!$status){
    sql_error($stmt);
}else{
    redirect('index.php');
}
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>コメント入力</title>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./index.php">ブログ画面へ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="album py-5 bg-danger">
        <figure class="text-center mt-1 mb-5">
            <h1>comment page</h1> 
        </figure>   
    <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($contents as $content): ?>
                <!-- <a href="#"> -->
                    <div class="col">
    
    


                        <div class="card shadow-sm">
                        <span class="border border-secondary">
                            <?php if($content['img']) : ?>

                                <img src="./images/<?= $content['img'] ?>" alt="" class="bd-placeholder-img card-img-top" style="width: 357px; height: 357px; object-fit: cover;" >
                            <?php else : ?>

                            <img src="images/default_image/no_image_logo.png" alt="" class="bd-placeholder-img card-img-top" >
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


    <?php if (isset($_GET['error'])): ?>
        <p class="text-success">記入内容を確認してください</p>
    <?php endif;?>
    <form method="POST" action="comment.php?id=<?=$id?>" class="mb-3">
        <div class="mb-5">
            <label for="comment_title" class="form-label">タイトル</label>
            <input type="text" class="form-control" name="comment_title" id="comment_title" aria-describedby="comment_title" value="">
        </div>
        <div class="mb-1">
            <label for="comment" class="form-label">コメント</label>
            <textArea type="text" class="form-control" name="comment" id="comment" aria-describedby="comment" rows="4" cols="40"></textArea>
        </div>
        
  <!-- <button class="btn btn-primary" type="button">修正</button>
  <button class="btn btn-danger" type="button">削除</button> -->

        <div class="d-grid gap-2 col-6 mx-auto">
        <input type="hidden" name="comment_id" id="id" aria-describedby="id" value="<? $id ?>">
        <button type="submit" class="btn btn-dark" type="button" name="addComment">コメントします</class>
    </form>
    <form method="POST" action="delete.php?id=<?= $row['comment'] ?>" class="mb-3 bg-dark">
        <button type="submit" class="btn btn-info" type="button">コメント消します</class>
        </div>
    </form>

    <!-- <div class="mt-1 mb-1">
            <label for="allComment" class="form-label">コメント一覧</label>
            <textArea type="text" class="form-control" name="allComment" id="allComment" aria-describedby="allComment" rows="4" cols="40"></textArea> -->

            <?php foreach ($comment_list as $comment_list): ?>
                <!-- <a href="#"> -->
                    <div class="col">
    
    


                        <div class="card shadow-sm">
                        <span class="border border-secondary">
                                <h3><?= $comment_list['comment_title'] ?></h3>
                                <p class="card-text"><?=nl2br($comment_list['comment'])?></p>
                                
                                <a href="comment.php?id=<?=$content['id']?>" class=".btn-outline-{primary}.bg-{light}- stretched-link"></a> 
                            </span>
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>

        </div>
</body>

</html>
