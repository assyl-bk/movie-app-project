<?php
session_start();
require_once 'database.php';
$movie_title = 'Siko Siko';
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
    <title>Movie Mood Ticket Booking - Siko Siko</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">😂 Funny Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
          
    </div>
    
    <div class="container">
        <a href="" class="arrow-nav arrow-prev">&#8249;</a>
        <a href="movie2_funny.php" class="arrow-nav arrow-next">&#8250;</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://th.bing.com/th?id=OIF.tXvhG1%2b1GoGLqZ0B8ERKxQ&rs=1&pid=ImgDetMain" alt="Siko Siko Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.DG0TFAUvok2W_xUqUOSFxwHaJP?rs=1&pid=ImgDetMain" alt="Essam Omar" class="actor">
                                <span class="actor-name">Essam Omar</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.UTIdzse3S6PR5YxgAuFS5QAAAA?rs=1&pid=ImgDetMain" alt="Taha Desouky" class="actor">
                                <span class="actor-name">Taha Desouky</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.Gj4A1plGx_EhOb1Of19qjgHaHa?rs=1&pid=ImgDetMain" alt="Khaled El Sawy" class="actor">
                                <span class="actor-name">Khaled El Sawy</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.z9mYVf87Rid0Iwsrs-ngzAHaHT?rs=1&pid=ImgDetMain" alt="Tara Emad" class="actor">
                                <span class="actor-name">Tara Emad</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.OzN2PZpkrnkGU2r6XG-k7gHaFp?rs=1&pid=ImgDetMain" alt="iana Hisham" class="actor">
                                <span class="actor-name">Diana Hisham</span>
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
                        <h2 class="movie-title">Siko Siko</h2>
                        <p class="movie-info">2021 | 2H 28Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Comedy</span>
                            <span class="tag">Action</span>
                            <span class="tag">Family</span>
                        </div>
                        
                        <p class="description">Siko Siko is a lighthearted Egyptian comedy following a group of young friends caught in a series of hilarious, absurd situations. The film blends slapstick humor with witty banter, offering a fun escape for audiences seeking laughs and relatable chaos. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/dLSdsqr2rQw?si=7XpE6RQhsrxchsyV" frameborder="0" allowfullscreen></iframe>
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