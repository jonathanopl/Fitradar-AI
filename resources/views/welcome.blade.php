<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Fitradar AI - FITRADAR AI - Health & Fitness</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #1E1F9D;
            color: white;
            line-height: 1.6;
        }

        .navbar {
            background-color: #1E1F9D;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container .footer-logo-text {
            display: flex;
            align-items: center;
        }

        .logo-container .footer-logo-text img {
            height: 50px;
            margin-right: 10px;
        }

        .logo-container .footer-logo-text .logo-text {
            font-weight: bold;
            font-size: 1.5rem;
            color: white;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #73DE3F;
        }

        .menu button {
            padding: 0.5rem 1rem;
            background-color: #ddd;
            border: none;
            border-radius: 5px;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu button:hover {
            background-color: #bbb;
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding: 3rem;
            background-color: white;
            color: #1E1F9D;
        }

        .hero .text {
            max-width: 400px;
            flex: 1;
            min-width: 300px;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0rem;
        }

        .hero p {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            color: black;
        }

        .hero button {
            padding: 0.7rem 1.5rem;
            background-color: #73DE3F;
            color: black;
            font-weight: 600;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .hero button:hover {
            background-color: #5ac82b;
        }

        .hero img {
            height: 400px;
            max-width: 100%;
            object-fit: contain;
        }

        .green-bar {
            background-color: #73DE3F;
            height: 40px;
            width: 100%;
        }

        .section {
            background-color: #1E1F9D;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .section h2 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature {
            width: 300px;
            text-align: center;
            flex: 1;
            min-width: 250px;
        }

        .feature img {
            width: 60%;
            border-radius: 10px;
            margin-bottom: 0.5rem;
        }

        .feature h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .feature p {
            font-size: 0.8rem;
        }

        .about-container {
            background-image: url('/images/olga.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            color: #fff;
            padding: 60px 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .about-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .about-container h1,
        .about-container p {
            position: relative;
            z-index: 2;
        }

        .about-container h1 {
            font-size: 2.3rem;
            text-align: center;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .about-container p {
            font-size: 1rem;
            margin-bottom: 15px;
            max-width: 800px;
            text-align: center;
        }

        .footer {
            background-color: #1E1F9D;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        .footer .footer-logo-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer .footer-logo-text img {
            height: 50px;
            margin-right: 3px;
        }

        .footer .footer-logo-text .logo-text {
            font-size: 1rem;
            font-weight: bold;
        }

        .footer p {
            font-size: 0.7rem;
            margin: 0;
        }

        .video-section {
            background-color: #1E1F9D;
            padding: 3rem 2rem;
            text-align: center;
            color: #ffffff;
        }

        .video-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .video-wrapper {
            max-width: 800px;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .video-wrapper video {
            width: 100%;
            height: auto;
            display: block;
            border: none;
            outline: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .logo-container .footer-logo-text .logo-text {
                font-size: 1.2rem;
            }

            .logo-container .footer-logo-text img {
                height: 40px;
            }

            .menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #1E1F9D;
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
                box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            }

            .menu.active {
                display: flex;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .hero {
                flex-direction: column;
                text-align: center;
                padding: 2rem 1rem;
                gap: 2rem;
            }

            .hero .text {
                max-width: 100%;
                order: 2;
            }

            .hero img {
                height: 250px;
                order: 1;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .section {
                padding: 2rem 1rem;
            }

            .section h2 {
                font-size: 1.5rem;
            }

            .features {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }

            .feature {
                width: 100%;
                max-width: 300px;
            }

            .about-container {
                padding: 40px 20px;
                background-attachment: scroll;
            }

            .about-container h1 {
                font-size: 1.8rem;
            }

            .about-container p {
                font-size: 0.9rem;
            }

            .video-section {
                padding: 2rem 1rem;
            }

            .video-title {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 0.8rem;
            }

            .logo-container .footer-logo-text .logo-text {
                font-size: 1rem;
            }

            .logo-container .footer-logo-text img {
                height: 35px;
            }

            .hero {
                padding: 1.5rem 1rem;
            }

            .hero h1 {
                font-size: 1.8rem;
            }

            .hero p {
                font-size: 0.85rem;
            }

            .hero button {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .hero img {
                height: 200px;
            }

            .section {
                padding: 1.5rem 1rem;
            }

            .section h2 {
                font-size: 1.3rem;
            }

            .feature h3 {
                font-size: 0.9rem;
            }

            .feature p {
                font-size: 0.75rem;
            }

            .about-container {
                padding: 30px 15px;
            }

            .about-container h1 {
                font-size: 1.5rem;
            }

            .about-container p {
                font-size: 0.8rem;
            }

            .video-section {
                padding: 1.5rem 1rem;
            }

            .video-title {
                font-size: 1.3rem;
            }

            .footer .footer-logo-text img {
                height: 40px;
            }

            .footer p {
                font-size: 0.6rem;
            }
        }

        /* Tablet landscape */
        @media (min-width: 769px) and (max-width: 1024px) {
            .hero {
                padding: 2.5rem;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero img {
                height: 350px;
            }

            .features {
                gap: 1.5rem;
            }

            .feature {
                width: 280px;
            }
        }

        /* Large screens */
        @media (min-width: 1200px) {
            .hero {
                padding: 4rem 5rem;
            }

            .section {
                padding: 4rem 3rem;
            }

            .about-container {
                padding: 80px 60px;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo-container">
            <div class="footer-logo-text">
                <img src="/images/logo.png" alt="Logo FITRADAR AI" />
                <span class="logo-text">FITRADAR AI</span>
            </div>
        </div>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
        
        <div class="menu" id="mobileMenu">
            <a href="#tentang">Tentang kami</a>
            <button onclick="window.location.href='/login'">Masuk</button>
        </div>
    </div>

    <div class="hero">
        <div class="text">
            <h1>Tingkatkan</h1>
            <h1>Gaya Hidup</h1>
            <h1>Sehatmu</h1>
            <p>Ingin kendalikan pola makanmu? Lacak makananmu, pahami kebiasaanmu, dan capai tujuanmu dengan mudah
                bersama kami.</p>
            <button onclick="window.location.href='/register'">Mulai</button>
        </div>
        <img src="/images/run.png" alt="Ilustrasi Lari" />
    </div>

    <div class="green-bar"></div>
    <div class="video-section">
        <h2>Dukungan terbaik untuk <br /><strong>kebutuhan kesehatan Anda</strong></h2>
        <div class="video-wrapper">
            <video autoplay muted playsinline loop>
                <source src="/images/vids.mp4" type="video/mp4">
                Browser Anda tidak mendukung pemutar video.
            </video>
        </div>
    </div>

    <div class="section">
        <h2 class="video-title">Kenali Fitur Kami Lebih Dekat</h2>
        <div class="features">
            <div class="feature">
                <img src="/images/1.png" alt="Pelacakan Makanan" />
                <h3>Pelacakan Makanan</h3>
                <p>Catat apapun makanan Anda dengan mudah dan pantau nutrisi penting.</p>
            </div>
            <div class="feature">
                <img src="/images/2.png" alt="Rencana Personal" />
                <h3>Rencana Personal</h3>
                <p>Dapatkan rencana diet dan olahraga yang disesuaikan dengan tujuan Anda.</p>
            </div>
            <div class="feature">
                <img src="/images/3.png" alt="Pantau Kemajuan" />
                <h3>Pantau Kemajuan</h3>
                <p>Visualisasikan kemajuan Anda dengan laporan dan grafik yang mudah dipahami.</p>
            </div>
        </div>
    </div>

    <div class="about-container" id="tentang">
        <h1>Tentang Fitradar AI</h1>
        <div class="text-center"></div>
        <p>Selamat datang di Fitradar AI! Kami dengan antusias mengembangkan Health & Fitness Evaluator AI, sebuah
            aplikasi web inovatif yang dirancang untuk mendukung perjalanan kesehatan Anda...</p>
        <p>Oleh karena itu, kami menciptakan solusi cerdas yang memberikan saran makanan dan olahraga yang disesuaikan
            dengan kebutuhan unik setiap individu.</p>
        <p>Fitur unggulan aplikasi kami adalah kemampuannya untuk mengenali kandungan nutrisi dan kalori makanan hanya
            dengan menggunakan kamera ponsel Anda.</p>
        <p>Tujuan utama kami adalah mewujudkan aplikasi ini menjadi alat yang bermanfaat dan mudah diakses...</p>
        <p>Harapan kami adalah agar aplikasi ini dapat menjadi sahabat setia Anda dalam meraih kesehatan yang lebih
            baik.</p>
    </div>

    <div class="footer">
        <div class="footer-logo-text">
            <img src="/images/logo.png" alt="Logo FITRADAR AI" />
            <span class="logo-text">FITRADAR AI</span>
        </div>
        <p>© 2025 Fitradar AI. Hak Cipta dilindungi.</p>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const toggle = document.querySelector('.mobile-menu-toggle');
            
            if (!menu.contains(event.target) && !toggle.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Close mobile menu when window is resized to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('mobileMenu').classList.remove('active');
            }
        });
    </script>
</body>

</html>