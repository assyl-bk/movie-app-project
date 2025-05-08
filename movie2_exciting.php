<?php
session_start();
require_once 'database.php';
$movie_title = 'Spider-Man';
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
    <title>Movie Mood Ticket Booking - Spider-Man</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">&#x1F929; Exciting Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
          
    </div>
    
    <div class="container">
        <a href="movie1_exciting.php" class="arrow-nav arrow-prev">&#8249;</a>
        <a href="#" class="arrow-nav arrow-next">&#8250;</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="spiderman poster.jpg" alt="Spider-Man No Way Home Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="Tom_Holland_by_Gage_Skidmore.jpg" alt="Tom Holland" class="actor">
                                <span class="actor-name">Tom Holland</span>
                            </div>
                            <div class="actor-item">
                                <img src="Zendaya_-_2019_by_Glenn_Francis.jpg" alt="Zendaya" class="actor">
                                <span class="actor-name">Zendaya</span>
                            </div>
                            <div class="actor-item">
                                <img src="MV5BMjE0MDkzMDQwOF5BMl5BanBnXkFtZTgwOTE1Mjg1MzE@._V1_.jpg" alt="Benedict Cumberbatch" class="actor">
                                <span class="actor-name">Benedict Cumberbatch</span>
                            </div>
                            <div class="actor-item">
                                <img src="Willem_Dafoe-63668_(cropped).jpg" alt="Willem Dafoe" class="actor">
                                <span class="actor-name">Willem Dafoe</span>
                            </div>
                            <div class="actor-item">
                                <img src="AlfredMolinaByJustinHoch2009.jpg" alt="Alfred Molina" class="actor">
                                <span class="actor-name">Alfred Molina</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Jon Watts</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Spider-Man: No Way Home</h2>
                        <p class="movie-info">2021 | 2H 28Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Action</span>
                            <span class="tag">Adventure</span>
                            <span class="tag">Science Fiction</span>
                        </div>
                        
                        <p class="description">With Spider-Man's identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/JfVOs4VSpmA" frameborder="0" allowfullscreen></iframe>
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