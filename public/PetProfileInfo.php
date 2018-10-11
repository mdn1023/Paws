<!DOCTYPE html>
<html>
	<head>
		<title>Pet Info</title>
		<!-- My External CSS file link-->
		<link rel="stylesheet" href="css/petinfo.css">
		<!-- This file is has the cdns -->
    	<?php include 'components/head.html';?>
	</head>
	<body>
		
		<!-- Nav Bar  -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="PetProfile.php"><span class="fa fa-chevron-left" id="back" aria-hidden="true"></span> Back</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item">
						<a class="nav-link" href="MainMenu.html">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="loadUsersPets_backend.php">My Pets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="SearchFilters.php">Search Filters</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php">Log Out</a>
					</li>
				</ul>
			</div>
		</nav>
	
<!-- php to set the pets info -->	
<?php
	session_start();
		
	if (!isset($_SESSION['pets'][0])){

		/* No pet name was sent through the data field on PetProfile.php <a href> */
		echo "Something went wrong when sending data field from Pet Profile Page";

	} else {
        
        /* Sets pet info based on pointer in "find a pet" array */  
        $userEmail =$_SESSION['email'];
		$image = '<img class="img-responsive perfect-fit" alt="Main Pet Pic" src="data:image/jpeg;base64,'.base64_encode( $_SESSION['pets'][$_SESSION['start']]['petPic'] ).'"/>';
		$name = $_SESSION['pets'][$_SESSION['start']]['dogName']; 
		$email=	$_SESSION['pets'][$_SESSION['start']]['email'];  
    	$age = " ". $_SESSION['pets'][$_SESSION['start']]['age'];
    	$breed = " ". $_SESSION['pets'][$_SESSION['start']]['breed'];
    	$gender = " ". $_SESSION['pets'][$_SESSION['start']]['gender'];
    	$specialNeeds = " ". $_SESSION['pets'][$_SESSION['start']]['specialNeeds'];
    	$aboutPet = " ". $_SESSION['pets'][$_SESSION['start']]['aboutPet'];
    	$zipcode = " ". $_SESSION['pets'][$_SESSION['start']]['zipcode'];
		
		// todo: fix later when we use formula
		$city = "Clarksburg, MD";
		
	

$content = <<<EOBODY
<!-- CONTENT  -->
<!-- Page title -->
    <h3 style="color: #303b4f; font-weight: normal; text-align: center; padding-top:15px;">Pet Info
    </h3>

<div class="container-fluid" id="content">
	<div class="petPic row">
		<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
		<div class="mainPetPic col-lg-7 col-md-8 col-sm-10 col-xs-10">
			$image
		</div>
	</div>
	<div class="petInfo row">
		<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
			<ul>
				<li><h3>$name</h3></li>
			</ul>
		</div>
	</div>
	
	<div class="petInfoDetails row">
		<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
		<div class="petTitles col-lg-7 col-md-8 col-sm-10 col-xs-10">
			<div class="card">
				<div class="card-body">
					<ul class="petList">
						<li><b>Location:</b> <span>$city</span></li>
						<li><b>Age:</b> $age years</li>
						<li><b>Breed:</b>$breed</li>
						<li><b>Gender:</b> $gender</li>
						<li><b>Special Needs:</b> $specialNeeds</li>
						<hr>
						<li><b>About:</b> <span> $aboutPet</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
	
	<!-- ADOPT MODULE START -->
	<div class="container">
		
		<!-- Trigger the modal -->
		<div class="row">
			<div class="col-md-12 col-lg-12 text-center">
				<button type="button" class="btn btn-default btn-lg" id="adoptButton" data-toggle="modal" data-target="#myModal">Adopt</button><br><br>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Contact Current Pet Owner</h4>
					</div>
					<div class="modal-body">
						<b>To:</b>$email<br><br>
						<b>Message:</b>
						<textarea name="message" rows="6" cols="40"></textarea><br><br>
						<b>From:</b>
						$userEmail<br><br>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- ADOPT MODULE END -->
</div>
EOBODY;
		/* Display all the pets information */
		echo $content;
	}
?>
<!-- Back to HTML -->
	</body>
</html>