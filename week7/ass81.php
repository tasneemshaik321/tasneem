<?php
header("Content-Type: text/html; charset=UTF-8");

// Sample movie database
$movies = [
    ["title" => "Inception", "genre" => "Sci-Fi", "rating" => 8.8, "release_year" => 2010],
    ["title" => "Interstellar", "genre" => "Sci-Fi", "rating" => 8.6, "release_year" => 2014],
    ["title" => "The Dark Knight", "genre" => "Action", "rating" => 9.0, "release_year" => 2008],
    ["title" => "Titanic", "genre" => "Romance", "rating" => 7.8, "release_year" => 1997],
    ["title" => "Avengers: Endgame", "genre" => "Action", "rating" => 8.4, "release_year" => 2019],
    ["title" => "Parasite", "genre" => "Drama", "rating" => 8.6, "release_year" => 2019],
    ["title" => "Joker", "genre" => "Drama", "rating" => 8.4, "release_year" => 2019],
    ["title" => "Frozen", "genre" => "Comedy", "rating" => 7.4, "release_year" => 2013],
    ["title" => "The Matrix", "genre" => "Sci-Fi", "rating" => 8.7, "release_year" => 1999]
];

// Check if 'genre' is provided in the GET request
if (isset($_GET['genre'])) {
    $selectedGenre = htmlspecialchars($_GET['genre']); // Sanitize input

    // Filter movies based on the selected genre
    if ($selectedGenre == "All") {
        $filteredMovies = $movies; // Show all movies if "All" is selected
    } else {
        $filteredMovies = array_filter($movies, function ($movie) use ($selectedGenre) {
            return strtolower($movie['genre']) === strtolower($selectedGenre);
        });
    }

    // Display the filtered movies
    if (!empty($filteredMovies)) {
        echo "<ul>";
        foreach ($filteredMovies as $movie) {
            echo "<li><strong>{$movie['title']}</strong> ({$movie['release_year']}) - Rating: {$movie['rating']}/10</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No movies found in this genre.</p>";
    }
} else {
    echo "<p>No genre selected!</p>";
}
?>