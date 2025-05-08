<?php
session_start();
require_once 'database.php';
$movie_title = 'Black Bag';
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
    <title>Movie Mood Ticket Booking - Black Bag</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🎬 Thrilling Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
    </div>
    
    <div class="container">
        <a href="movie1_thrilling.php" class="arrow-nav arrow-prev">‹</a>
        <a href="#" class="arrow-nav arrow-next">›</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://static1.srcdn.com/wordpress/wp-content/uploads/2025/01/image003.jpg" alt="Black Bag Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIF.4rm1WfHSxPPnAcDKibL1bw?rs=1&pid=ImgDetMain" alt="Cate Blanchett" class="actor">
                                <span class="actor-name">Cate Blanchett</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.IAJqrMzjDEChtZsbxydzkQHaLH?rs=1&pid=ImgDetMain" alt="Michael Fassbender" class="actor">
                                <span class="actor-name">Michael Fassbender</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.QZ7WHYI8ypvgC5_6SvN7vgHaEK?rs=1&pid=ImgDetMain" alt="Regé-Jean Page" class="actor">
                                <span class="actor-name">Regé-Jean Page</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.YIGBMdIzOfI6LGtMrlJkeAHaE8?rs=1&pid=ImgDetMain" alt="Marisa Abela" class="actor">
                                <span class="actor-name">Marisa Abela</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.syt66_DcTrkcDmmUjuBxxwHaJP?rs=1&pid=ImgDetMain" alt="Naomie Harris" class="actor">
                                <span class="actor-name">Naomie Harris</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Director</h3>
                        <p>Steven Soderbergh</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">Black Bag</h2>
                        <p class="movie-info">2025 | 1H 47Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Spy</span>
                            <span class="tag">Thriller</span>
                        </div>
                        
                        <p class="description">Black Bag is a gripping spy thriller following a covert operative entangled in a high-stakes espionage mission. Directed by Steven Soderbergh, the intricate plot weaves deception, international intrigue, and suspense, earning some of Soderbergh’s best reviews for its taut storytelling. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/Du0Xp8WX_7I" frameborder="0" allowfullscreen></iframe>
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
                title: "Black Bag",
                poster: "blackbag_poster.jpg"
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

            if (wishlist.some(movie => movie.title === "Black Bag")) {
                wishlistBtn.innerText = "In Wishlist";
                wishlistBtn.classList.add("in-wishlist");
            }
            
            document.querySelector(".arrow-next").addEventListener("click", function(e) {
            });
        };
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'933fc0034eefb053',t:'MTc0NTI2ODU4OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>
</body>
</html>
``` 