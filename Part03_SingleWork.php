<!DOCTYPE html>
<html lang="en">
<head>
  <title>Part03_SingleWork</title>
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
   
    $ArtWorkID=$_GET['id'];
   
 	$sql = "SELECT * FROM artworks WHERE ArtWorkID=".$ArtWorkID;
	
	$result = $conn->query($sql);
	$ArtistID;$ImageFileName;$Title;$Description;$ArtWorkType;$YearOfWork;$Width;$Height;$Medium;$OriginalHome;$GalleryID;$MSRP;

	if ($result->num_rows > 0) {

	// output data of each row
    while($row = $result->fetch_assoc()) {
	
	$ArtWorkID=$row["ArtWorkID"];
	$ArtistID=$row["ArtistID"];
	$ImageFileName=$row["ImageFileName"];
	$Title=$row["Title"];
	$Description=$row["Description"];
	$ArtWorkType=$row["ArtWorkType"];
	$YearOfWork=$row["YearOfWork"];
	$Width=$row["Width"];
	$Height=$row["Height"];
	$Medium=$row["Medium"];
	$OriginalHome=$row["OriginalHome"];
	$GalleryID=$row["GalleryID"];
	$MSRP=$row["MSRP"];
    }
}
	else {
		header("location:error.php");
	}

 	$sql2 = "SELECT * FROM artists WHERE ArtistID=".$ArtistID;
	
	$result2 = $conn->query($sql2);
	$FirstName;$LastName;$Nationality;$YearOfBirth;$YearOfDeath;$Details;$ArtistLink;

	if ($result2->num_rows > 0) {

	// output data of each row
    while($row2 = $result2->fetch_assoc()) {
	
	$FirstName=$row2["FirstName"];
	$LastName=$row2["LastName"];
	$Nationality=$row2["Nationality"];
	$YearOfBirth=$row2["YearOfBirth"];
	$YearOfDeath=$row2["YearOfDeath"];
	$Details=$row2["Details"];
	$ArtistLink=$row2["ArtistLink"];
    }
}


//$conn->close();

?>

	<div class="container">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <h2><?php echo $Title;?></h2>
                    <p>By <a href="Part02_SingleArtist.php?id=<?php echo $ArtistID;?>"><?php echo $FirstName." ".$LastName;?></a></p>

                        <a data-toggle="modal" href="#myModal">
                        <img src="images/art/works/medium/<?php echo $ImageFileName;?>.jpg" 
                             alt="<?php echo $Title;?>"
                             class="noLeftPadding col-xs-12 col-sm-4 col-md-4 col-lg-4"/>
                        </a>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><?php echo $Title;?> by <?php echo $FirstName." ".$LastName;?></h4>
                                    </div>
                                
                                    <div class="modal-body">
                                        <img src="images/art/works/medium/<?php echo $ImageFileName;?>.jpg" alt="<?php echo $Title;?>" class="modalPic"/>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                             </div>
                        </div>


						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <p class="col-lg-12 noLeftPadding"><?php echo $Description;?></p>

                            <p style="color:red; padding-left: 0.5cm";><Strong>$ <?php echo number_format(round($MSRP,2), 2, '.', '');?></Strong></p>

                            <div class="btn-group" style="padding-left: 0.5cm">
								<button type="submit" class="btn btn-default" style="color:#1E90FF">
                                    <span class="glyphicon glyphicon-gift blueLinks"></span> Add to Wish List
                                </button>
								
								<button type="submit" class="btn btn-default" style="color:#1E90FF">
                                    <span class="glyphicon glyphicon-shopping-cart blueLinks"></span> Add to Shopping Cart
                                </button>

                            </div>

                            <br />
                            <br />

                            <div class="panel panel-default">
                                <div class="panel-heading noMargins leftPadEightPix">Product Details</div>
                                
                                <table class="table" style="padding-left: 0.5cm">
                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Date:</td>
                                        <td><?php echo $YearOfWork;?></td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Medium:</td>
                                        <td><?php echo $Medium;?></td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Dimension:</td>
                                        <td><?php echo $Width;?> cm x <?php echo $Height;?> cm</td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Home:</td>
                                        <td><?php echo $OriginalHome;?></td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Genres:</td>
                                        <td>
                                            <?php $sql3 = "SELECT genres.GenreName FROM artworkgenres INNER JOIN genres ON artworkgenres.GenreID=genres.GenreID WHERE artworkgenres.ArtWorkID=".$ArtWorkID;
												$result3 = $conn->query($sql3);
												$GenreName;
   
												if ($result3 ->num_rows > 0) {
													// output data of each row
													while($row3 = $result3 ->fetch_assoc()) {
														$GenreName=$row3["GenreName"];	
?>
                                                    <a href="#"><?php echo $GenreName;?></a><br />
                                            <?php }} ?>
                                         </td>
                                    </tr>

                                    <tr class="col-md-14">
                                        <td class="col-md-4 boldText">Subjects:</td>
                                        <td>
                                            <?php $sql4 = "SELECT subjects.SubjectName FROM artworksubjects INNER JOIN subjects ON artworksubjects.SubjectID=subjects.SubjectID WHERE artworksubjects.ArtWorkID=".$ArtWorkID;
												$result4 = $conn->query($sql4);
												$SubjectName;
   
												if ($result4 ->num_rows > 0) {
													// output data of each row
													while($row4 = $result4 ->fetch_assoc()) {
														$SubjectName=$row4["SubjectName"];	
											?>
													<a href="#"><?php echo $SubjectName;?></a><br />
                                             <?php }} ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>                        
                        </div>

                        <div class="col-xs-12 
                                    col-sm-8 col-sm-offset-4 
                                    col-md-8 col-md-offset-4 
                                    col-lg-2 col-lg-offset-0">
                            <div class="panel panel-info">
                                <div class="panel-heading noMargins leftPadEightPix">Sales</div>
                                    <table class="table">
                                        <?php $sql5 = "SELECT orders.DateCreated FROM orderdetails INNER JOIN orders ON orderdetails.OrderID=orders.OrderID WHERE orderdetails.ArtWorkID=".$ArtWorkID;
											$result5 = $conn->query($sql5);
											$DateCreated;
   
											if ($result5 ->num_rows > 0) {
												// output data of each row
												while($row5 = $result5 ->fetch_assoc()) {
													$DateCreated=$row5["DateCreated"];	
										?>
                                                <tr>
                                                    <td><a href="#"><?php echo date("m/d/y", strtotime($DateCreated));?></a></td>
                                                </tr>
                                        <?php }} ?>
                                      </table>
                                  </div>
                                  
                            <!--End of panel oanel-info-->
                            </div>
                        <!--End of col-xs-12 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4 col-lg-2 col-lg-offset-0 noLeftPadding" style="padding-left: 15px;-->
                        </div>                  

        <!--End of row-->
        </div>
        

    <!--End of container-->
    </div> 