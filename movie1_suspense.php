<?php
session_start();
require_once 'database.php';
$movie_title = 'The Witcher: Sirens of the Deep';
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
    <title>Movie Mood Ticket Booking - The Witcher: Sirens of the Deep</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🔍 Suspense Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
    </div>
    
    <div class="container">
        <a href="#" class="arrow-nav arrow-prev">‹</a>
        <a href="movie2_suspense.php" class="arrow-nav arrow-next">›</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://th.bing.com/th/id/OIP.1hWVWAcZ0UAqq03v3kdfjgHaKA?w=115&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OSK.HEROxmSoZJTC4EHZNxxrU-MFr5z-8dlMRCT7yheODysVnVQ?w=312&h=200&c=7&rs=1&o=6&dpr=1.3&pid=SANGAM" alt="Joey Batey" class="actor">
                                <span class="actor-name">Joey Batey</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OSK.wLsW_96db9Gz2fJNjLIM7HCUMvjwRPR9rTrGS9eUfUw?w=224&h=200&c=12&rs=1&o=6&dpr=1.3&pid=SANGAM" alt="Mahesh Jadu" class="actor">
                                <span class="actor-name">Mahesh Jadu</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.Wic791fastecd5Y2QBD4RAAAAA?w=231&h=300&c=10&rs=1&bgcl=fffffe&r=0&o=6&dpr=1.3&pid=23.1" alt="Anya Chalotra" class="actor">
                                <span class="actor-name">Anya Chalotra</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OSK.HERO6AI_VI5ABs_SVVSdIAvjiRxtI2_vzhZq2uznJQyfF0w?w=312&h=200&c=15&rs=2&o=6&dpr=1.3&pid=SANGAM" alt="Doug Cockle" class="actor">
                                <span class="actor-name">Doug Cockle</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Kang Hei Chul</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">The Witcher: Sirens of the Deep</h2>
                        <p class="movie-info">2025 | 1H 23Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Animation</span>
                            <span class="tag">Fantasy</span>
                            <span class="tag">Action</span>
                        </div>
                        
                        <p class="description">Geralt of Rivia investigates mysterious attacks in a seaside village, uncovering a centuries-old conflict between humans and merpeople, navigating danger and betrayal to prevent a war. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/Y7ZgJCl62sA?si=ExBrobr_I_xn9nE7" frameborder="0" allowfullscreen></iframe>
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
                title: "The Witcher: Sirens of the Deep",
                poster: "witcher_sirens_poster.jpg"
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

            if (wishlist.some(movie => movie.title === "The Witcher: Sirens of the Deep")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>