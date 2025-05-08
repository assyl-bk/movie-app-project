<?php
session_start();
require_once 'database.php';
$movie_title = 'Interstellar';
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
    <title>Movie Mood Ticket Booking - Interstellar</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🚀 sci-fi Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
    </div>
    
    <div class="container">
        <a href="#" class="arrow-nav arrow-prev">‹</a>
        <a href="movie2_sci-fi.php" class="arrow-nav arrow-next">›</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg" alt="Interstellar Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.AensBxHpu-iizuw-1_sTdQHaLD?w=121&h=182&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Matthew McConaughey" class="actor">
                                <span class="actor-name">Matthew McConaughey</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.XRTENhwEwAoyQkeQdGkemgHaLH?w=186&h=279&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Anne Hathaway" class="actor">
                                <span class="actor-name">Anne Hathaway</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th?id=OIF.mI1fm63mCA79q%2frWYdudEg&w=176&h=235&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Jessica Chastain" class="actor">
                                <span class="actor-name">Jessica Chastain</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.i0X44vK48fWe7ALOhhlcawHaJI?w=186&h=229&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Mackenzie Foy" class="actor">
                                <span class="actor-name">Mackenzie Foy</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/R.c42a335dc98a5954e069275ad4f367cd?rik=NhyrN%2bRVe9QImA&pid=ImgRaw&r=0" alt="Michael Caine" class="actor">
                                <span class="actor-name">Michael Caine</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Christopher Nolan</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Interstellar</h2>
                        <p class="movie-info">2014 | 2H 49Mins | <span class="rating">★★★★★</span></p>
                        <div class="tags">
                            <span class="tag">Sci-Fi</span>
                            <span class="tag">Adventure</span>
                            <span class="tag">Drama</span>
                        </div>
                        
                        <p class="description">With Earth dying, ex-pilot Cooper leads a mission through a wormhole to find a new planet for humanity. Facing time-bending challenges and cosmic mysteries, their journey tests sacrifice and hope for survival. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/zSWdZVtXT7E?si=5z8y3q7l5i8q9y9l" frameborder="0" allowfullscreen></iframe>
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
                title: "Interstellar",
                poster: "interstellar_poster.jpg"
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

            if (wishlist.some(movie => movie.title === "Interstellar")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>