<?php

$conn=mysqli_connect("localhost","movie_user","1234","movieDB")or die("movieDB 접속 실패!!");

$sql="SELECT * FROM MOVIE";
$result=mysqli_query($conn,$sql);

if($result){
    $count = mysqli_num_rows($result);
    if($count==0){
        echo "<script>alert('해당 정보가 없습니다');location.replace('main.php');</script>";
    }
} else {
    $err_msg=mysqli_error($conn);
    echo "<script>alert(\"SQL문 정보조회 오류 \\n오류내용: $err_msg\");</script>";
}

$tagList='<li data-role="list-drivider">영화 목록'.'<span style="float:right">'.$cout.'건'.'</span></li>';
while($row = mysqli_fetch_array($result)){
    $tagList= $tagList.'<li><img style="margin:11px 20px;",src= "'.$row["photo"].'">';
    $tagList= $tagList.'<span class>="ui-li-count">장르:'.$row["genre"].'</span>';
    $tagList= $tagList.'<p>요금: '.$row["price"].'원</p>';
    $tagList= $tagList.'<p>상영날짜: '.$row["myear"].'</p></li>';
}

mysqli_free_result($result);
mysqli_close( $conn );

?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content=""initial-scale=1.0, width="device-width">
    <title>영화 관리</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div data-role="page" id="page4">
        <div data-role="header" data-position="fixed" data-theme="b">
            <a gref="#" data-icon="back" data-rel="back">Back</a>
            <h1>영화 정보 전체 검색</h1>
            <a href="main.php" data-icon="home" data-iconpos="notext">Home</a>
            <div data-role="navbar">
                <ul>
                    <li><a href="insert.php">입력</a></li>
                    <li><a href="update_select.php">수정</a></li>
                    <li><a href="delete_select.php">삭제</a></li>
                    <li><a href="selectALl.php">전체검색</a></li>
                </ul>
            </div>
        </div>
        <div data-role="content">
            <ul data-role="listview" data-divider-theme="b" data-inset="true">
                <?php echo $tagList ?>
            </ul>
        </div>
        <div data-role="footer" data-position="fixed" data-theme="b">
            <h4>Movie Web App</h4>
        </div>
    </div>
</body>
</html>
