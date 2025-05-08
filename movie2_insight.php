<?php
session_start();
require_once 'database.php';
$movie_title = 'Her';
$pdo = getPDO();
$stmt = $pdo->prepare("SELECT id FROM movies WHERE title = ?");
$stmt->execute([$movie_title]);
$movie = $stmt->fetch(PDO::FETCH_ASSOC);
$movie_id = $movie ? $movie['id'] : null;
if (!$movie_id) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Mood Ticket Booking - Her</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🔍 Insightful Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
    </div>
    
    <div class="container">
        <a href="movie1_insight.php" class="arrow-nav arrow-prev">‹</a>
        <a href="#" class="arrow-nav arrow-next">›</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://image.tmdb.org/t/p/w500/eCOtqtfvn7mxGlT6oXvTgvFMW8.jpg" alt="Her Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://image.tmdb.org/t/p/w185/6NsMbJXRlDZuDzatjCtW3oL5E2r.jpg" alt="Joaquin Phoenix" class="actor">
                                <span class="actor-name">Joaquin Phoenix</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://image.tmdb.org/t/p/w185/3oWE0Rwm3anSf4YwO2RaSI19kW0.jpg" alt="Scarlett Johansson" class="actor">
                                <span class="actor-name">Scarlett Johansson</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://image.tmdb.org/t/p/w185/2iGVS83uK6Le0vQ6zHsT5oV0nng.jpg" alt="Amy Adams" class="actor">
                                <span class="actor-name">Amy Adams</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://image.tmdb.org/t/p/w185/5qHNjhtjMD4YWH3UPRL9Yit1yQr.jpg" alt="Rooney Mara" class="actor">
                                <span class="actor-name">Rooney Mara</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://image.tmdb.org/t/p/w185/6z7lch4i2i8jQ3nSP6rGZO6Qv8I.jpg" alt="Olivia Wilde" class="actor">
                                <span class="actor-name">Olivia Wilde</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Spike Jonze</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Her</h2>
                        <p class="movie-info">2013 | 2H 6Mins | <span class="rating">★★★★★</span></p>
                        <div class="tags">
                            <span class="tag">Romance</span>
                            <span class="tag">Drama</span>
                            <span class="tag">Sci-Fi</span>
                        </div>
                        
                        <p class="description">In a near-futuristic world, Theodore, a lonely writer, forms a deep emotional bond with an AI operating system named Samantha. Their relationship challenges notions of love, intimacy, and the evolving role of technology in human connection. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/WzV6mXIOVl4?si=5z8y3q7l5i8q9y9l" frameborder="0" allowfullscreen></iframe>
                        </div>
                        
                        <div class="action-buttons">
                            <button class="wishlist-btn" onclick="toggleWishlist()">Add to Wishlist</button>
                            <a href="book_ticket.php?movie_id=<?= $movie_id ?>" class="book-ticket">Book Ticket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleWishlist() {
            let movie = {
                title: "Her",
                poster: "her_poster.jpg"
            };
            let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
            let index = wishlist.findIndex(item => item.title === movie.title);
            let wishlistBtn = document.querySelector(".wishlist-btn");

            if (index === -1) {
                wishlist.push(movie);
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            } else {
                wishlist.splice(index, 1);
                wishlistBtn.innerText = "Add to Wishlist";
                wishlistBtn.classList.remove("in-wishlist");
            }

            localStorage.setItem("wishlist", JSON.stringify(wishlist));
        }

        window.onload = function () {
            let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
            let wishlistBtn = document.querySelector(".wishlist-btn");

            if (wishlist.some(movie => movie.title === "Her")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>