<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>MED CAFE</title>
    </head>
    <body>
        <header>
            <nav>
                <section class="nav-list">
                    <img src="wallpaper/logo.png" alt="Logo" height="60px">
                    <section class="nav-links">
                        <a class="lnk-home" href="#"><i class="fas fa-home"></i> Home</a>
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> Teachers</a>
                        <a href="#"><i class="fas fa-book-open"></i> Courses</a>
                        <a href="../login-page/logout.php"><i class="fas fa-info-circle"></i> Logout</a>
                        
                    </section>
                </section>
                <section class="nav-buttons">
                    <button class="button btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button class="button btn-join"><i class="fas fa-user-plus"></i> Join</button>
                </section>
                <div class="menu-icon" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </header>
        
        <script>
            function toggleMenu() {
                const navLinks = document.querySelector('.nav-links');
                navLinks.classList.toggle('active');
            }
        </script>
    </body>
</html>
