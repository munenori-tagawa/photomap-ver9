<?php
session_start();
require_once('../funcs.php');
loginCheck();

$title = '';
$content = '';

if (isset($_SESSION['post']['title'])) {
    $title = $_SESSION['post']['title'];
}

if (isset($_SESSION['post']['content'])) {
    $content = $_SESSION['post']['content'];
}

if (isset($_SESSION['post']['lat'])) {
    $content = $_SESSION['post']['lat'];
}

if (isset($_SESSION['post']['lon'])) {
    $content = $_SESSION['post']['lon'];
}




?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>記事管理</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">ブログ画面へ</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="post.php">投稿する</a> -->
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

    <!-- // もしURLパラメータがある場合 -->
    <!--<?php if (isset($_GET['error'])) : ?>
        <p class='text-danger'>記入内容を確認してください。</p>
    <?php endif ?>-->

    <form method="POST" action="confirm.php" enctype="multipart/form-data">
        <div class="mt-3 mb-3 p-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" name="title"
            id="title" aria-describedby="title"
            value="<?= $title ?>">
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mt-3 mb-3 p-3">
            <label for="content" class="form-label">記事内容</label>
            <textArea type="text" class="form-control" name="content"
            id="content" aria-describedby="content"
            rows="4" cols="40"><?= $content ?></textArea>
            <div id="emailHelp" class="form-text">※入力必須</div>
        </div>
        <div class="mt-3 mb-3 p-3">
            <label for="title" class="form-label">画像</label>
            <input type="file" name="img">
        </div>

        <div class="mt-3 mb-3 p-3">
        <label>緯度：<input type="text" name="lat"  id="show_lat" placeholder="緯度が自動入力"></label><br>
        <label>経度：<input type="text" name="lng" id="show_lng" placeholder="経度が自動入力"></label><br>
        </div>
                <!-- <div id="geocode">geocode:data</div> -->
        
<!-- 
        <form method="post" action="post.php"> -->
        

                
    <!-- </form>  -->
       
    <div id="myMap" style="width: 500px; height: 500px;">
    </div>

<!-- jQuery&GoogleMapsAPI -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script
  src="https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Avf2PeZ7yfWNq8UoLP6fCa0PO-wCXFGavFEa31OUzAwOrZPdzu_AU3yIo3kQUiVU"
  async
  defer
></script>
<script src="../js/BmapQuery.js"></script>

<script>
  //Init
  function GetMap() {
    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    const map = new Bmap("#myMap");
    //------------------------------------------------------------------------
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);
    //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside] -->
    //--------------------------------------------------
    map.startMap(43.068619, 141.350811, "load", 17);
    map.onGeocode("click", function (data) {
      console.log(data); //Get Geocode ObjectData
      const lat = data.location.latitude; //Get latitude(緯度)
      const lon = data.location.longitude; //Get longitude(経度)
      // プッシュピンを生成↓
      map.infoboxHtml(
        lat,
        lon,
        '<div style="background:red;">位置を取得！</div>'
      );
      map.pin(lat, lon, "#FF0000");
      // 緯度・経度のテキストボックスにクリックした地点の座標を挿入↓
      document.getElementById("show_lat").value = lat;
      document.getElementById("show_lon").value = lon;
      alert(lat);
    });
  }
</script>

        </div> 

        <button type="submit" class="mt-3 mb-3 ms-5 p-1 btn btn-primary">投稿する</button>
    </form>

</body>
</html>





