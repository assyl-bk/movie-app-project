<?php
session_start();
require_once 'database.php';
$movie_title = 'Rush Hour';
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
    <title>Movie Mood Ticket Booking - Rush Hour</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">😂 Funny Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
    </div>
    
    <div class="container">
        <a href="movie1_funny.php" class="arrow-nav arrow-prev">‹</a>
        <a href="#" class="arrow-nav arrow-next">›</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://th.bing.com/th/id/OIP.LZ-Y7TNiLpW4-5O5N3GJwwHaK6?w=133&h=197&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Rush Hour Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.23PIjIgtBsV5FRn77JSDCgHaFj?w=244&h=183&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Jackie Chan" class="actor">
                                <span class="actor-name">Jackie Chan</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.2K2hka-8I8iLNIPCoaS2TAHaE-?w=186&h=124&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Chris Tucker" class="actor">
                                <span class="actor-name">Chris Tucker</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.outyfzOqL5ZmUV2d7W0U0AHaEK?rs=1&pid=ImgDetMain" alt="Tom Wilkinson" class="actor">
                                <span class="actor-name">Tom Wilkinson</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.bSQ_EFscpO_UM_WVadhP-QAAAA?rs=1&pid=ImgDetMain" alt="Tzi Ma" class="actor">
                                <span class="actor-name">Tzi Ma</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.e8axgsB89YxCdk5M0cqoqwHaEK?rs=1&pid=ImgDetMain" alt="Elizabeth Peña" class="actor">
                                <span class="actor-name">Elizabeth Peña</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Brett Ratner</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Rush Hour</h2>
                        <p class="movie-info">1998 | 1H 38Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Action</span>
                            <span class="tag">Comedy</span>
                            <span class="tag">Crime</span>
                        </div>
                        
                        <p class="description">Rush Hour is a buddy cop action-comedy where Hong Kong Detective Inspector Lee teams up with LAPD Detective James Carter to rescue a Chinese diplomat’s kidnapped daughter in Los Angeles. Their clashing styles lead to hilarious misadventures and thrilling action as they uncover a crime lord’s plot. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/JMiFsFQcFLE?si=JMEyDByH4tCttNy4" frameborder="0" allowfullscreen></iframe>
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
                title: "Rush Hour",
                poster: "rushhour_poster.jpg"
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

            if (wishlist.some(movie => movie.title === "Rush Hour")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>