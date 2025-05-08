<?php
session_start();
require_once 'database.php';
$movie_title = 'Avengers: Endgame';
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
    <title>Movie Mood Ticket Booking - Avengers: Endgame</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title"> 🚀sci fi Mood</span>
        <a href="wishlist.php" class="wish"> <button>🎬 Wishlist</button> </a>
    </div>
    
    <div class="container">
        <a href="movie1_sci-fi.php" class="arrow-nav arrow-prev">&#8249;</a>
        <a href="#" class="arrow-nav arrow-next">&#8250;</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="0472053.jpg" alt="Avengers Endgame Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="Robert_Downey_Jr_2014_Comic_Con_(cropped).jpg" alt="Robert Downey Jr." class="actor">
                                <span class="actor-name">Robert Downey Jr.</span>
                            </div>
                            <div class="actor-item">
                                <img src="téléchargement (1).jpg" alt="Chris Evans" class="actor">
                                <span class="actor-name">Chris Evans</span>
                            </div>
                            <div class="actor-item">
                                <img src="800px-Scarlett_Johansson_by_Gage_Skidmore_2019.jpg" alt="Scarlett Johansson" class="actor">
                                <span class="actor-name">Scarlett Johansson</span>
                            </div>
                            <div class="actor-item">
                                <img src="images.jpg" alt="Mark Ruffalo" class="actor">
                                <span class="actor-name">Mark Ruffalo</span>
                            </div>
                            <div class="actor-item">
                                <img src="Chris_Hemsworth_by_Gage_Skidmore_3.jpg" alt="Chris Hemsworth" class="actor">
                                <span class="actor-name">Chris Hemsworth</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Anthony Russo, Joe Russo</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Avengers: Endgame</h2>
                        <p class="movie-info">2019 | 3H 01Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Action</span>
                            <span class="tag">Science Fiction</span>
                            <span class="tag">Adventure</span>
                            <span class="tag">Fantasy</span>
                        </div>
                        
                        <p class="description">The epic conclusion of the Marvel Cinematic Universe's Infinity Saga. After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more to reverse Thanos' actions and restore balance to the universe. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0" allowfullscreen></iframe>
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
                title: "Avengers Endgame",
                poster: "0472053.jpg"
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

            if (wishlist.some(movie => movie.title === "Avengers Endgame")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-prev").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>