<?php

include('config.php');

function getResults($movie1,$movie2){

			// Connection stuff
			
			global $API_KEY;

			$q1 = urlencode($movie1); // make sure to url encode an query parameters
			$oneEndpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $API_KEY . '&q=' . $q1;
			$session1 = curl_init($oneEndpoint);
			curl_setopt($session1, CURLOPT_RETURNTRANSFER, true);
			$data1 = curl_exec($session1);
			curl_close($session1);

			$q2 = urlencode($movie2); // make sure to url encode an query parameters
			$oneEndpoint = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $API_KEY . '&q=' . $q2;
			$session2 = curl_init($oneEndpoint);
			curl_setopt($session2, CURLOPT_RETURNTRANSFER, true);
			$data2 = curl_exec($session2);
			curl_close($session2);




			// Turn json to associative array
			$search_results1 = json_decode($data1);
			$search_results2 = json_decode($data2);

			// Nothing comes back die
			if ($search_results1 === NULL || $search_results2 === NULL) die('Error parsing json');

			$movies1 = $search_results1->movies;
			$movies2 = $search_results2->movies;

			$string = '<ul>';
			foreach ($movies1 as $movie) {
			  $string.= '<li><a href="' . $movie->links->alternate . '">' . $movie->title . " (" . $movie->year . ")</a></li>";
			}

			foreach ($movies2 as $movie){
			  $string.= '<li><a href="' . $movie->links->alternate . '">' . $movie->title . " (" . $movie->year . ")</a></li>";
			}


			  $string.='</ul>';

			return $string;


}

?>
