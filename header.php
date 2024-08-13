<?php
session_start();
?>

<header>
    <div class="header-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 40 40">
            <path fill="currentColor" d="M15.781 17.868H4.534c-1.02 0-1.85-.831-1.85-1.854V4.768c0-1.02.83-1.85 1.85-1.85h11.247c1.02 0 1.85.83 1.85 1.85v11.247c0 1.022-.83 1.853-1.85 1.853M4.534 3.804a.964.964 0 0 0-.963.964v11.247c0 .533.432.967.963.967h11.247a.966.966 0 0 0 .963-.967V4.768a.964.964 0 0 0-.963-.964zm30.935 14.064h-11.25a1.853 1.853 0 0 1-1.849-1.854V4.768c0-1.02.829-1.85 1.849-1.85h11.25a1.85 1.85 0 0 1 1.847 1.85v11.247a1.853 1.853 0 0 1-1.847 1.853M24.219 3.804a.964.964 0 0 0-.963.964v11.247c0 .533.432.967.963.967h11.25c.52 0 .96-.443.96-.967V4.768a.96.96 0 0 0-.96-.964zm-8.438 33.279H4.534c-1.02 0-1.85-.83-1.85-1.85v-11.25c0-1.021.83-1.851 1.85-1.851h11.247c1.02 0 1.85.83 1.85 1.851v11.249c0 1.02-.83 1.851-1.85 1.851M4.534 23.019a.965.965 0 0 0-.963.964v11.249c0 .532.432.964.963.964h11.247a.964.964 0 0 0 .963-.964V23.983a.964.964 0 0 0-.963-.964zm30.935 14.064h-11.25c-1.02 0-1.849-.83-1.849-1.85v-11.25c0-1.021.829-1.851 1.849-1.851h11.25c1.018 0 1.847.83 1.847 1.851v11.249a1.85 1.85 0 0 1-1.847 1.851m-11.25-14.064a.965.965 0 0 0-.963.964v11.249c0 .532.432.964.963.964h11.25c.53 0 .96-.432.96-.964V23.983a.96.96 0 0 0-.96-.964z" />
        </svg>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="index6.html">Contact</a></li>
                <li><a href="index6.html">Help</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                <?php else: ?>
                    <li><a href="user/register.html">Register</a></li>
                    <li><a href="user/login.html">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="header">
        <h1>Welcome to Unitopia</h1>
        <p>Welcome to Unitopia, the ultimate platform designed to simplify your transition to university.
            Whether you need to book a knowledgeable tour guide to show you around campus or find the perfect room to rent,
         </p>
        <div class="button-container">
            <a href="#get-started">Get Started</a>
        </div>
    
        
    </div>
</header>
