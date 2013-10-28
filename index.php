<!DOCTYPE html>

<?php
include('search.php');
?>


<html>
	<head>
		<title>Who is that actor?</title>
		 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		 <link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>

	<body>
		<div id="headline">
			<form class="form-inline" id="search-items" method="post" action="index.php">
			    <input type="text" class="input-large" placeholder="Movie 1" name="movie1" required/>
			    <input type="text" class="input-large" placeholder="Movie 2" name="movie2" required/>
			    <button type="submit" class="btn" name="search">Search</button>
		    </form>
		</div>

		<div id="results">
			<?php
				if(isset($_POST['search'])){
					echo getResults($_POST['movie1'],$_POST['movie2']);
				}
			 ?>
		</div>

		<script>


		</script>
	</body>

</html>