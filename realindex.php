<!DOCTYPE html>
<html>
<head>
<title> MOODSIC Tracker:: </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/entirestyle.css">
<link rel="stylesheet" type="text/css" href="css/framestyle.css">
<link rel="stylesheet" type="text/css" href="css/bar.css">
</head>
<body>
  <div id="app">
    <!--왼쪽-->
    <div id="leftside">
      <!--로고-->
      <div id="logo">
          <a href="realindex.php?user=<?php print $_GET['user']?>"><img src = "img/leftsideicon\로고.png" width="71%"></a>
      </div>

      <!--프로필-->
      <div id="profile">
        <a href="mypage.html"><img class="primage" src = "https://cdnimg.melon.co.kr/cm2/artistcrop/images/002/61/143/261143_20200508100949_500.jpg?8671d10093fd10038301e96ebcd9a8fd62/melon/resize/416/quality/100/optimize" width="100px" ><br></a>
        <p id="user-name" style="letter-spacing:0; font-size:17px; padding-top:12px; opacity:0.7"></p>
        <p id="times" style="font-size:14px; padding-top:5px;opacity:0.4; padding-bottom:10px;"></p>

          <!-- 드롭다운 파트 -->
            <a class="dropdown-item" href="#">프로필 편집</a>
            <a class="dropdown-item" href="#" onclick="logout();">로그아웃</a>

      </div>

      <!--메뉴-->
      <div id="menu">
        <img src = "img/leftsideicon\메뉴_선.png" width="70%" style="opacity:0.5">
        <div class="menu">
        </div>
        <div class="menu">
          <img id="home" src = "img/leftsideicon\메뉴_1.png" width="83%">
          <img id="diary"src = "img/leftsideicon\메뉴_2.png" width="83%">
          <img src = "img/leftsideicon\메뉴_3.png" width="83%">
        </div>
          <img src = "img/leftsideicon\메뉴_선.png" width="70%" style="opacity:0.5">
        <div class="menu">
          <img src = "img/leftsideicon\메뉴_4.png" width="83%">
        <img src = "img/leftsideicon\메뉴_5.png" width="83%">
        </div>
        <img src = "img/leftsideicon\메뉴_선.png" width="70%" style="opacity:0.5">
        <div class="menu">
            <img id="share" src = "img/leftsideicon\메뉴_6.png" width="83%">
        </div>

      </div>
    </div>

    <!--페이지 내용-->
    <div id="container">
      <iframe id="frame" <?php print "src=php/home.php?user=".$_GET['user']?> width=100% height=100% frameborder=0px>
      </iframe>
    </div>

    <!--밑에 재생바-->
    <div id="player">
      <div id="playerBlur">  <!--블러필터-->
      <div id="albumartarea">
        <a href="album_info.html"><img id="p_albumart" src= "img/playericon/none.png"  width=70px ></a>
      </div>

      <div id="songarea">
        <div id="songname"><a href="song_info.html"> - </a></div>

        <div id="artistname"><a href="artist_info.html"> - </a></div>
      </div>

      <div id="playlist"><img src="img/playericon/playlist.png" height=60px></div>

      <div id="controller">
        <img id="prev" src="img/playericon/앞으로.png" style="opacity:0.6" onmouseover="this.style.opacity='0.9'" onmouseout = "this.style.opacity='0.6'" >
        <img id="play" src="img/playericon/재생.png" height=95px style="opacity:0.8" onmouseover="this.style.opacity='1'" onmouseout = "this.style.opacity='0.9'">
        <img id="next" src="img/playericon/뒤로.png" style="opacity:0.6" onmouseover="this.style.opacity='0.9'" onmouseout = "this.style.opacity='0.6'">
      </div>

      <div id="volume"   style="opacity:0.7" onmouseover="this.style.opacity='0.8'" onmouseout = "this.style.opacity='0.7'">
        <img id="volumeicon" src="img/playericon/volume.png" height=50px>
      </div>

      <div id="option">
        <div id="loop" style="opacity: 0.9;">  <img src="img/playericon/repeat.png" height=50px></div>
        <div id="shuffle" style="opacity: 0.4;"><img src="img/playericon/shuffle.png" height=50px></div>
      </div>
      <div id="playing_bar">  <!--재생바-->
        <div id="bar">
          <input type="range" id="progress-bar" value="0"  onInput="dragCalculation(this.value)">
        </div>
        <div id="time">   <!--시간진행도-->
          <div id="ct"><p id="current-time">0:00</div>
          <div id="d"><p id="duration">0:00</div>
        </div>
        </div>
    </div>
  </div>
  <div id=volume_popup>
    <div id=aaa>
    <input id="volume_bar" type="range" oninput="volumeiconchange(this.value)">
    </div>
  </div>

  <div id="video-placeholder" style="opacity: 0 ;"></div>
  <!-- script part -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-firestore.js"></script>

    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
        apiKey: "AIzaSyCdgm-GsL3PSBJeiJdDXvpQ6Wvu12MChOo",
        authDomain: "osp13-35ad5.firebaseapp.com",
        projectId: "osp13-35ad5",
        storageBucket: "osp13-35ad5.appspot.com",
        messagingSenderId: "92580841928",
        appId: "1:92580841928:web:8013e99ea0e7c2a41858fd"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
    </script>
      <script type="text/javascript" src ="js/login.js"  charset=utf-8> </script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>  <!--유튜브 api-->
  <script src="https://www.youtube.com/iframe_api"></script> <!--유튜브 api-->
  <script type="text/javascript" src ="js/play.js"  charset=utf-8> </script>
  <script type="text/javascript" src ="js/menu.js"  charset=utf-8> </script>

</body>
</html>
