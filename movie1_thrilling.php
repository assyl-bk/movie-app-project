<?php
session_start();
require_once 'database.php';
$movie_title = 'WarFare';
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
    <title>Movie Mood Ticket Booking - WarFare</title>
    <link rel="icon" href="image(2).png" type="image/x-icon">
    <link rel="stylesheet" href="moviepage.css">
</head>
<body>
    <div class="header">
        <button class="change-mood" onclick="location.href='index.php'">⬅ Change Mood</button>        <span class="mood-title">🎬 Thrilling Mood</span>
        <a href="wishlist.php" class="wish"><button>🎬 Wishlist</button></a>
          
    </div>
    
    <div class="container">
        <a href="a.html" class="arrow-nav arrow-prev">&#8249;</a>
        <a href="movie2_thrilling.php" class="arrow-nav arrow-next">&#8250;</a>
        
        <div class="movie-card">
            <div class="movie-content">
                <div class="left-column">
                    <img src="https://th.bing.com/th/id/R.92104de3c40771f9e8f978b87cfc3c2e?rik=fbmVqX4pLFNiwg&riu=http%3a%2f%2fwww.impawards.com%2f2025%2fposters%2fwarfare.jpg&ehk=2hu9c51LbXY0NBe1IUZPIfuVcCTbT2iB966fjaDC1Mw%3d&risl=&pid=ImgRaw&r=0" alt="Spider-Man No Way Home Poster" class="movie-poster">
                    
                    <div class="actors">
                        <h3>Actors</h3>
                        <div class="actor-images">
                            <div class="actor-item">
                                <img src="https://th.bing.com/th?id=OIF.dB%2fh96q8w0inyeHdccPETw&rs=1&pid=ImgDetMain" alt="D'Pharaoh Woon-A-Tai" class="actor">
                                <span class="actor-name">D'Pharaoh Woon-A-Tai</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.nzN5EpFNX_ctu8l_Ue8OmgHaJU?rs=1&pid=ImgDetMain" alt="Will Poulter" class="actor">
                                <span class="actor-name">Will Poulter</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.FAHb4pcEyJwfh49zakkWsgHaJ_?rs=1&pid=ImgDetMain" alt="Cosmo Jarvis" class="actor">
                                <span class="actor-name">Cosmo Jarvis</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.c5XZtnZSSaUrbxwgwy-0WwHaJ4?rs=1&pid=ImgDetMain" alt="Joseph Quinn" class="actor">
                                <span class="actor-name">Joseph Quinn</span>
                            </div>
                            <div class="actor-item">
                                <img src="https://th.bing.com/th/id/OIP.aLCjCqb3i0EtQUWN7bGmBQHaJi?rs=1&pid=ImgDetMain" alt="Alfred Molina" class="actor">
                                <span class="actor-name">Alfred Molina</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="director">
                        <h3>Directors</h3>
                        <p>Ray Mendoza and Alex Garland</p>
                    </div>
                </div>
                
                <div class="right-column">
                    <div class="movie-details">
                        <h2 class="movie-title">WarFare</h2>
                        <p class="movie-info">2021 | 1H 35Mins | <span class="rating">★★★★☆</span></p>
                        <div class="tags">
                            <span class="tag">Action</span>
                            <span class="tag">Thriller</span>
                            <span class="tag">War</span>
                        </div>
                        
                        <p class="description">Warfare is a visceral war thriller depicting a 2006 Iraq War incident where a U.S. Navy SEAL platoon, on a surveillance mission in Ramadi, is ambushed in an Iraqi family’s home. Told in real-time, it captures the chaos, terror, and brotherhood of modern combat, based on the memories of co-director Ray Mendoza, a former SEAL. <a href="#" class="read-more">Read More</a></p>
                        
                        <div class="trailer-container">
                            <h3>Movie Trailer</h3>
                            <iframe class="movie-trailer" src="https://www.youtube.com/embed/JER0Fkyy3tw" frameborder="0" allowfullscreen></iframe>
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