<?php require_once("header.php"); ?>
<?php 
 
	// require another php file
	// ../../../ => 3 folders back
	require_once("../../config.php");

	$everything_was_okay = true;

 
	//check if there is variable in the URL
	if(isset($_GET["color"])){
		
		//only if there is message in the URL
		//echo "there is message"

		//if its empty
		if(empty($_GET["color"])){
		$everything_was_okay = false;
				//it is empty
			echo "You selected: <br>";
			echo "Please enter the dolphins color! <br>";
		}else{
			//its not empty
			echo "You selected: <br>";
			echo "Color: ".$_GET["color"]."<br>";
			$varv = $_GET["color"];
		}
	}else{
		echo "Nothing is added <br>";
		$everything_was_okay = false;
	}
	//Dorsal fin field validation 
	if(isset($_GET["color"])){
		if(empty($_GET["dorsal_fin"])){
		$everything_was_okay = false;
			echo "Please enter the dorsal fin shape! <br>";
		}else{
			echo "Dorsal fin: ".$_GET["dorsal_fin"]."<br>";
		}
	}else{
		$everything_was_okay = false;
	}
	
	//Tail field 
	if(isset($_GET["tail"])){
		if(empty($_GET["tail"])){
		$everything_was_okay = false;
				//it is empty
			echo "Please enter the dolphins tail shape! <br>";
		}else{
			//its not empty
			echo "Tail shape: ".$_GET["tail"]."<br>";
		}
	}else{
		$everything_was_okay = false;
	}
	
	
	//lenght feild  
	if(isset($_GET["lenght"])){
		if(empty($_GET["lenght"])){
		$everything_was_okay = false;
		echo "Please enter the dolphins lenght! <br>";
		}else{
			echo "Lenght: ".$_GET["lenght"]."<br>";
	
			}
	}else{
		$everything_was_okay = false;
	}
		
		
	//SAVE TO DB
	// ? was everything okay
	if($everything_was_okay == true){
		
	echo "Saving to database ... ";
	
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_karoliinar");
		
		$stmt = $mysql->prepare("INSERT INTO homework (color, uim, saba, pikkus ) VALUES (?,?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("sssi", $_GET["color"], $_GET["dorsal_fin"], $_GET["tail"], $_GET["lenght"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	

?>


	
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="app_b.php">
					App page
				</a>
			</li>
			
			
			<li>
				<a href="mytable.php">
					Table
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">

		<h1> Identifying dolphins from pool 7 </h1>
		
		<form>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
					
						<label for="color">Color: </label>
						<input name="color" id="color" type="text" placeholder="Grey or dark grey" class="form-control">
					</div>
				</div>
			</div>
		<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="dorsal_fin">Dorsal fin: </label>
						<input name="dorsal_fin" id="dorsal_fin" type="text" placeholder="Flabby or straight" class="form-control">
					</div>
				</div>
		</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="tail">Tail: </label>
						<input name="tail" id="tail" type="text"placeholder="Broken or not broken" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="lenght">Lenght: </label>
						<input name="lenght" id="lenght" type="text" placeholder="Insert dolphins lenght" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<input class="btn btn-success hidden-xs" type="submit" value="Save to database">
					<input class="btn btn-success btn-block visible-xs-block" type="submit" value="Save data 2">
				</div>
			</div>
		</form>
		


  
	</div>
  
  </body>
</html>
