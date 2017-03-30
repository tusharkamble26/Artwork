<!DOCTYPE html>
<html lang="en">
<head>
  <title>Error</title>
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
		<form class="navbar-form navbar-left" action="Part04_Search.php">
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
        <div class="col-lg-10">
            <br/>
			<center>
            <h1>Oops !!!! Error Encountered</h1>
			 <img src="images/errorImage.jpg" alt="" height="160px" /> 
            <h3>Sorry, please try again.</h3>
            </center>
        </div>
    </div>
</body>
</html>