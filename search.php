<?php
// Replace YOUR_API_KEY with your actual API key
$api_key = 'Z1irt7XgxgW5dIWl5B3WrM8iGvahvqGN';

// Get the search parameters from the form data
$query = $_GET['q'];
$begin_date = $_GET['begin_date'];
$end_date = $_GET['end_date'];
$sort = $_GET['sort'];

// Construct the API endpoint URL with the query parameters
$url = 'https://api.nytimes.com/svc/search/v2/articlesearch.json';
$url .= '?api-key=' . urlencode($api_key);
$url .= '&q=' . urlencode($query);
$url .= '&begin_date=' . urlencode($begin_date);
$url .= '&end_date=' . urlencode($end_date);
$url .= '&sort=' . urlencode($sort);

// Make the HTTP request to the API endpoint
$json = file_get_contents($url);

// Parse the JSON data into an array
$data = json_decode($json, true);


// Display the search results on the HTML page
foreach ($data['response']['docs'] as $article) {
    echo '<div class="article">';
    echo '<h2><a href="' . $article['web_url'] . '">' . $article['headline']['main'] . '</a></h2>';
    echo '<p class="snippet">' . $article['snippet'] . '</p>';
    echo '<p class="pub_date">' . $article['pub_date'] . '</p>';
    echo '</div>';
}
?>
?>
    
