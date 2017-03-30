<!DOCTYPE html>
<html lang="en">
<head>
  <title>Part04_Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Assignment</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Default.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artists Data List (Part 1)</a></li>
            <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
            <li><a href="Part04_Search.php">Search (Part 4)</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li style="color:#CFCFCF"><h4>Prasad Pandurang Kudtarkar</h4></li>
		<form class="navbar-form navbar-left" action="Part04_Search.php" method="get">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search Paintings" name="title">
		  <input type="hidden" name="choice" value="TitleFilterButton">
			</div>
			<button type="submit" class="btn btn-info">Search</button>
		</form>
      </ul>
    </div>
  </div>
</nav>

<br />
<div class="topSpacing"></div>

<div class="container">
    <div class="col-lg-12">
        <h1>Search Results</h1>
		<hr/>
		<div class="well well-lg">
			<form action="Part04_Search.php" method="GET">
				<div><input type="radio" name="choice" value="TitleFilterButton" <?php if((isset($_GET['title'])) && (isset($_GET['choice']))) if((($_GET['title'] != '')) && (($_GET['choice'] == 'TitleFilterButton'))) echo ('checked'); ?>> Filter by Title:
				<div class="reveal-if-active"><input type="text" name="title" class="form-control" value=<?php if((isset($_GET['title'])) && (isset($_GET['choice']))) if((($_GET['title'] != '')) && (($_GET['choice'] == 'TitleFilterButton'))) echo $_GET['title']; ?>></div></div>
				<div><input type="radio" name="choice" value="DescFilterButton" <?php if((isset($_GET['description'])) && (isset($_GET['choice']))) if((($_GET['description'] != '')) && (($_GET['choice'] == 'DescFilterButton'))) echo ('checked'); ?>> Filter by Description:
				<div class="reveal-if-active"><input type="text" name="description" class="form-control" value =<?php if((isset($_GET['description'])) && (isset($_GET['choice']))) if((($_GET['description'] != '')) && (($_GET['choice'] == 'DescFilterButton'))) echo $_GET['description']; ?>></div></div>
				<input type="radio" name="choice" value="NoFilterButton" <?php if(isset($_GET['choice'])) if($_GET['choice'] == 'NoFilterButton') echo ('checked');?>> No Filter (show all art works):<br><br>
				<button type="submit" class="btn btn-info" value="Search">Filter</button>
			<form>
		</div>
	</div>
	<br>
	<?php
		if (isset($_GET['title']) || isset($_GET['description'])|| isset($_GET['choice']))
		if (($_GET['title'] != '') || (isset($_GET['description']) &&($_GET['description'] != '')) || (isset($_GET['choice']) && ($_GET['choice'] == 'NoFilterButton'))) {
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = 'root';
		$dbname = 'logindb';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		mysqli_set_charset($conn,'utf8');
   
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql;
		
		if ($_GET['title'] != '' && ($_GET['choice'] == 'TitleFilterButton')) {
			$TitleQuery=$_GET['title'];
			$sql = "SELECT * FROM artworks WHERE Title LIKE '%".$TitleQuery."%'";
		} else if ($_GET['description'] != '' && ($_GET['choice'] == 'DescFilterButton')) {
			$DescriptionQuery=$_GET['description'];
			$sql = "SELECT * FROM artworks WHERE Description LIKE '%".$DescriptionQuery."%'";
		} else if ($_GET['choice'] == 'NoFilterButton') {
			$sql = "SELECT * FROM artworks";
		}
		
		if($sql != NULL) {
		$result = $conn->query($sql);
		$Title;$ArtistID;$ImageFileName;$Description;$ArtWorkType;$YearOfWork;$Width;$Height;$Medium;$OriginalHome;$GalleryID;$MSRP;

		if ($result->num_rows > 0) {

		// output data of each row
		while($row = $result->fetch_assoc()) {
	
		$Title=$row["Title"];
		$ArtWorkID=$row["ArtWorkID"];
		$ArtistID=$row["ArtistID"];
		$ImageFileName=$row["ImageFileName"];
		$Description=$row["Description"];
		$ArtWorkType=$row["ArtWorkType"];
		$YearOfWork=$row["YearOfWork"];
		$Width=$row["Width"];
		$Height=$row["Height"];
		$Medium=$row["Medium"];
		$OriginalHome=$row["OriginalHome"];
		$GalleryID=$row["GalleryID"];
		$MSRP=$row["MSRP"];
		if(isset($_GET['description'])) if (($_GET['description'] != '') && ($_GET['choice'] == 'DescFilterButton'))
			$Description=str_ireplace($DescriptionQuery, '<span style="background-color: #FFFF00;">'.$DescriptionQuery.'</span>', $Description);
		
	?>
	<table>
        <tr>
            <td><a href="Part03_SingleWork.php?id=<?php echo $ArtWorkID;?>"><img src="images/art/works/square-medium/<?php echo $ImageFileName;?>.jpg" alt="<?php echo $Title;?>" /></a></td>
                <td class="topText leftPadEightPix"><a href="Part03_SingleWork.php?id=<?php echo $ArtWorkID;?>"><?php echo $Title;?></a>
                    <p><?php echo $Description; ?></p>
                </td>
            </tr>
    </table>
	<br clear="all"/>
		<?php } } } }?>

</div>