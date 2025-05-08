<?php
session_start();
require_once 'database.php';
$movie_title = 'Despicable Me 4';
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
    <title>Movie Mood Ticket Booking - Despicable Me 4</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🎈 Playful mood</span>
        <a href="wishlist.php" class="wish" style="color: inherit; text-decoration:none"><button>🎬 Wishlist</button></a>
          
    </div>
    
    <div class="container">
        <a href="#" class="arrow-nav arrow-prev">&#8249;</a>
        <a href="movie2_playful.php" class="arrow-nav arrow-next">&#8250;</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://image.tmdb.org/t/p/original/dbtxg1bQYYuWMQvtEuoiUe4uvFJ.jpg" alt="Despicable Me 4 Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors (voice)</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.D_yGkwVo-HwuYBhi9gZvOAHaLH?rs=1&pid=ImgDetMainTom_Holland_by_Gage_Skidmore.jpg" alt="Steve Carell" class="actor">
                                <span class="actor-name">Steve Carell</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.vrHxXj8dgSm2rX7VoX-VGAHaLH?rs=1&pid=ImgDetMain" alt="Joey King" class="actor">
                                <span class="actor-name">Joey King</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.Zqtu3f1uPI86NfeCrDdGMgHaJs?rs=1&pid=ImgDetMain" alt="Will Ferrell" class="actor">
                                <span class="actor-name">Will Ferrell</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.qsOuuB4GTIuTONUmhtq8KgHaJ4?rs=1&pid=ImgDetMain" alt="Sofia Vergara" class="actor">
                                <span class="actor-name">Sofia Vergara</span>
                            </div>
                
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Chris Renaud & Patrick Delage</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Despicable Me 4</h2>
                        <p class="movie-info">2024 | 1H 34Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Animation</span>
                            <span class="tag">Family</span>
                            <span class="tag">Comedy</span>
                        </div>
                        
                        <p class="description">Gru, Lucy, and their daughters—Margo, Edith, and Agnes—welcome Gru Jr., who loves tormenting his dad. Facing a new nemesis, Maxime Le Mal, and his girlfriend Valentina, the family goes on a hilarious, chaotic adventure, blending villainy with family fun. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/LtNYaH61dXY?si=pDLLEYcm9CAqLxtj" frameborder="0" allowfullscreen></iframe>
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
                title: "Spider-Man: No Way Home",
                poster: "spiderman poster.jpg"
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

            if (wishlist.some(movie => movie.title === "Spider-Man: No Way Home")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
</body>
</html>