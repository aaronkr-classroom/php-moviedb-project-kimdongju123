<?php
//movieDB 데이터베이스 연결
$conn-mysqli_connect("localhost", "movie_user", "1234", "movieDB") or die("movieDB !!");

$title = $_POST["smovieTitle2"];

$sql="SELECT * FROM MOVIE WHERE title = '".$title."'";
$result-mysqli_query($conn, $sql);

if($result) {
    $count = mysqli_num_rows($result);
    if ($count ==0) {
        echo "<script>alert('해당 정보가 없습니다');location_replace('main.php');</script>";
    }
}
else {
    $err_msg=mysqli_error($conn);
    echo "<script>alert(\"SQL 2# \\n2#48: $err_msg\");</script>";
}

$row = mysqli_fetch_array($result);
$title= $row['title'];
$genre = $row['genre'];
$myear = $row['myear'];
$price = $row['price'];

mysqli_close($conn);

?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, width=device-width"> <title></title>
    <!-- 제이쿼리 모바일, 제이쿼리 라이브러리 파일 -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/14.5/jquery.mobile-1,4,5,min.css"/> <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/145/jquery.mobile-1.4.5.min.js"></script> 
</head>
<body>
<!--영화정보 갱신 화면 -->
<div data-role="page" id="page2">
    <div data-role="header" data-position="fixed" data-theme="b">
        <a href="#" data-icon="back" data-rel="back">Back</a>
        <h1>영화 정보 수정</h1>
        <a href="main.php" data-icon="home" data-iconpos="notext">Home</a> <div data-role="navbar">
        <ul>
        <li><a href="insert.php"></a></li>
        <li><a href="update_select.php"></a></li>
        <li><a href="delete_select.php"></a></li>
        <li><a href="selectAll.php"></a></li>
        </ul>
    </div>
</div>
<div data-role="content">
    <h3>영화 내용 수정</h3>
    <form name="form2" method="post" action="update_result.php" data-ajax="false"> 
    <div class="ui-body ui-body-a">
        <label for="movieGenre2" class="select">:</label>
        <select name="movieGenre2" data-native-menu="false" data-mini="true" data-inline="true">
        
            <option value="<?php echo $genre ?>"><?php echo $genre ?></option> 
            <option value="액션">액션</option>
            <option value="로맨스">로맨스</option> 
            <option value="코미디">코미디</option> 
            <option value="판타지">판타지</option>
        </select>
        <label for="movieTitle2">영화명:</label>
        <input type="text" name="movieTitle2" value=<?php echo $title?> data-mini="true"/>
        <label for="movieYear2">상영날짜:</label>
        <input type="text" name="movieYear2" value=<?php echo $myear ?> data-mini="true"/>
        <label for="moviePrice2">관람료:</label>
        <input type="text" name="moviePrice2" value=<?php echo $price?> data-mini="true"/>
    </div>
        <div class="ui-body">
            <fieldset class="ui-grid-a">
                <div class="ui-block-a"><input type="reset" id="cancel2" value="취소"/></div>
                <div class="ui-block-b"><input type="submit" id="submit2" value="수정"/></div>
            </fieldset>
        </div>
    </form>
</div>
<div data-role="footer" data-position="fixed" data-theme="b">
    <h4>Movie Web App</h4>
</div>
</div>
</body>
</html>