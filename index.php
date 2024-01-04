<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Techneo360.
    </title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" />
</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="top-menu-container">
            <div class="logo-header">
                <a href="">
                    <img src="img\techneo360.png" alt="Logo personal portfolio" title="Logo personal portfolio" />
                </a>
            </div>

            <ul>
                <li>
                    <a href="#products">Product & Services</a>
                </li>
                <li>
                    <a href="#team">Team</a>
                </li>
                <li>
                    <a href="#why">Why Us?</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Hero background & content on top of hero background -->
    <div id="hero-container">
        <div class="hero-wrapper">
            <h1>Multi-Disciplinary <br> <span class="orange-txt">It Solutions For You</span></h1>
        </div>
    </div>

    <!-- 4 grid layout skills on homepage -->
    <!-- Every div is a grid item -->
    <div id="products" class="container-grid-4">
        <div>
            <img src="img/icon-box.jpg" alt="">
            <h2>
                Web Design
            </h2>
            
        </div>

        <div>
            <img src="img/icon-box.jpg" alt="">
            <h2>
                Web Development
            </h2>
        </div>

        <div>
            <img src="img/icon-box.jpg" alt="">
            <h2>
                Product Design
            </h2>
            
        </div>

        <div>
            <img src="img/icon-box.jpg" alt="">
            <h2>
                Creative Thinker
            </h2>
            
        </div>
    </div>
    <div id="team">
        <div class="header-section">
            <h2 class="dark big">Team</h2>

            <hr>
        </div>

        <!-- Meet the team section -->
        <div class="container-grid-2">
            <div>
                <img class="img-team" src="img/team-section-home.jpg" alt="">
            </div>
            <div>
                <h2>
                    Who we are
                </h2>

                <h3 class="orange-txt">
                    Meet Our Team
                </h3>

                <p>
                    Whether you require distribution or fulfillment, defined freight forwarding, or a complete supply chain solution, we are here for you.
                </p>

                <div class="btn-wrapper">
                    <a href="">About</a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-section">
        <h2 class="dark big">Skills</h2>

        <hr>
    </div>

    <!-- Section of skills -->
    <div id="why" class="section-why-us">
        <div>
            <i class="fas fa-code-branch icon-why-us"></i>
            <h2>
                Quality Control
            </h2>
        </div>

        <div class="middle">
            <img src="img/icon-box.jpg" alt="">
        </div>

        <div>
            <i class="far fa-keyboard icon-why-us"></i>
            <h2>
                Optional Maintenance
            </h2>
        </div>

        <div>
            <i class="fab fa-google icon-why-us"></i>
            <h2>
                Search Engine Friendly
            </h2>
        </div>

        <div>
            <i class="fas fa-globe icon-why-us"></i>
            <h2>
                Web Master Tools
            </h2>
        </div>
    </div>

    <!-- Footer -->
    <footer id="contact">
        <div class="container-footer">
            <h2>Contact Us</h2>
            <br>
            <p>Phone: +8801676232029</p>
            <p>Mail: sales@techneo360.net</p>
        </div>
    </footer>
</body>

</html>