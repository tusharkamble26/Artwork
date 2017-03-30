<!DOCTYPE html>
<html lang="en">
<head>
  <title>Part02_SingleArtist</title>
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

<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $dbname = 'logindb';
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   mysqli_set_charset($conn,'utf8');
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }
   
	$ArtistID=$_GET['id'];
   
	$sql = "SELECT ArtistID, FirstName, LastName, Nationality, YearOfBirth, YearOfDeath, Details, ArtistLink FROM artists WHERE ArtistID=".$ArtistID;
	
	$result = $conn->query($sql);
	$ArtistID;$FirstName;$LastName;$Nationality;$YearOfBirth;$YearOfDeath;$Details;$ArtistLink;

	if ($result->num_rows > 0) {

	// output data of each row
    while($row = $result->fetch_assoc()) {
	
	$FirstName=$row["FirstName"];
	$LastName=$row["LastName"];
	$Nationality=$row["Nationality"];
	$YearOfBirth=$row["YearOfBirth"];
	$YearOfDeath=$row["YearOfDeath"];
	$Details=$row["Details"];
	$ArtistLink=$row["ArtistLink"];
    }
} 
	else {
		header("location:error.php");
	}

?>

<div class="container">
	<div class="col-lg-12">
					
						<h2><?php echo $FirstName." ".$LastName;?></h2>
						<br />
						<div class = "row">
						<div class="col-md-3"><img src="images/art/artists/medium/<?php echo $ArtistID;?>.jpg"
                             class="img-thumbnail" width="300" height="300"/></div>
							 
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					
                        <p><?php echo $Details;?></p>

                        <button type="submit" class="btn btn-default" style="color:#1E90FF"><span class="glyphicon glyphicon-heart blueLinks"></span> Add to Favorites List</button>

                        <br />
                        <br />

                            <div class="panel panel-default">
                                <div class="panel-heading boldText leftPadEightPix">Artist Details</div>
                                
                                <table class="table">
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Date:</td>
                                        <td><?php echo $YearOfBirth." - ".$YearOfDeath;?></td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Nationality:</td>
                                        <td><?php echo $Nationality;?></td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">More Info:</td>
                                        <td><a href="<?php echo $ArtistLink;?>"><?php echo $ArtistLink;?></a></td>
                                    </tr>
                                </table>
                                
                            <!--End of panel panel-default-->
                            </div>
                            
                        <!--End of col-xs-12 col-sm-6 col-md-8 col-lg-8-->                          
                    </div>
					</div>
	</div>
</div>

<div class="clearfix"></div>

<div class = "row">
<div class="container">
    <h4 style="padding-left: 0.5cm";>Art by <?php echo $FirstName." ".$LastName;?></h4>

<?php $sql2 = "SELECT ArtistID, ArtWorkID, ImageFileName, Title, YearOfWork FROM artworks WHERE ArtistID=".$ArtistID;
   $result2 = $conn->query($sql2);
   $ArtWorkID;$ImageFileName;$Title;$YearOfWork;
   
   if ($result2 ->num_rows > 0) {
    
	
	// output data of each row
    while($row2 = $result2 ->fetch_assoc()) {
	
	$ArtWorkID=$row2["ArtWorkID"];
	$ImageFileName=$row2["ImageFileName"];
	$Title=$row2["Title"];
	$YearOfWork=$row2["YearOfWork"];
    
?>
	<div class = "col-sm-3 ">
		<div class = "container-fluid panel panel-default">
            <div style = "text-align:center;" >
				<div style="margin-top:5px;margin-bottom:5px">
                    <a href="Part03_SingleWork.php?id=<?php echo $ArtWorkID ?>">   <img src="images/art/works/square-medium/<?php echo $ImageFileName ?>.jpg" class="img-thumbnail " /></a>
				</div>
                            
                <div style = "text-align:center;width:100%;height:60px">
                    <a style ="font-size:90%;" href="Part03_SingleWork.php?id=<?php echo $ArtWorkID ?>">
						<?php echo $Title.", ".$YearOfWork ?>
					</a>
				</div>
                            
				<div style="margin-bottom:5px;">
                    <a href="Part03_SingleWork.php?id=<?php echo $ArtWorkID ?>" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-info-sign"></span> View
                    </a>
							
					<a href="#"class="btn btn-success btn-xs">
						<span class="glyphicon glyphicon-gift"></span> Wish
					</a>
							
					<a href="#"class="btn btn-info btn-xs">
						<span class="glyphicon glyphicon-shopping-cart"></span> Cart
					</a>
				</div>
			</div>
		</div>
	</div>
<?php }} ?>
</div>
</div>	

</body>
</html>