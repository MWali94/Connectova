<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectova - The Future of Connection</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Added AOS Animation Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</head>
<body>

    <div class="orb-1"></div>
    <div class="orb-2"></div>
    <div class="orb-3"></div>

    <header class="navbar" data-aos="fade-down" data-aos-duration="1000">
        <div class="container d-flex align-center justify-between">
            <a href="index.html" class="logo">
                <i class="fa-solid fa-bolt"></i> Connectova
            </a>
            <div class="nav-actions d-flex gap-2">
                <a href="login.html" class="btn btn-outline">Log in</a>
                <a href="register.html" class="btn btn-primary">Start Free Trial</a>
            </div>
        </div>
    </header>

    <main>
        <section class="hero container">
            <div class="hero-content">
                <div class="hero-badge" data-aos="fade-up">
                    <i class="fa-solid fa-sparkles"></i> Connectova 2.0 is now live
                </div>
                <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                    The network for<br>
                    <span class="text-gradient">visionaries &</span><br>
                    <span class="text-gradient-alt">creators.</span>
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Experience a revolutionary social platform built for speed, privacy, and authentic connections. The heavy-duty infrastructure for your digital life.
                </p>
                <div class="hero-actions" data-aos="fade-up" data-aos-delay="300">
                    <a href="register.html" class="btn btn-primary hero-btn-large">
                        Get Started <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i>
                    </a>
                    <a href="login.html" class="btn btn-outline hero-btn-large">
                        <i class="fa-solid fa-play" style="margin-right: 10px; color: var(--primary);"></i> View Demo
                    </a>
                </div>
            </div>
            
            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1500">
                <div class="glass-card card-main">
                    <div class="mock-header">
                        <img src="https://ui-avatars.com/api/?name=C&background=2563EB&color=fff" class="mock-avatar">
                        <div style="flex: 1;">
                            <div class="mock-line" style="width: 60%; background: #94A3B8;"></div>
                            <div class="mock-line" style="width: 40%;"></div>
                        </div>
                    </div>
                    <div class="mock-line" style="width: 100%; height: 120px; border-radius: 12px; background: #F1F5F9; margin-bottom: 20px;"></div>
                    <div class="mock-line" style="width: 90%;"></div>
                    <div class="mock-line" style="width: 70%;"></div>
                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <div class="mock-line" style="width: 30px; height: 30px; border-radius: 50%;"></div>
                        <div class="mock-line" style="width: 30px; height: 30px; border-radius: 50%;"></div>
                    </div>
                </div>

                <div class="glass-card card-sm-1">
                    <div class="mock-header" style="margin-bottom: 10px;">
                        <i class="fa-solid fa-bell" style="color: var(--secondary); font-size: 20px;"></i>
                        <div class="mock-line" style="width: 80%; background: #94A3B8; margin: 0;"></div>
                    </div>
                    <div class="mock-line" style="width: 60%;"></div>
                </div>

                <div class="glass-card card-sm-2">
                    <div style="display: flex; justify-content: space-between; align-items: end; margin-bottom: 10px;">
                        <div>
                            <div style="font-size: 24px; font-weight: 800; color: var(--text-main);">10.5M</div>
                            <div style="font-size: 12px; color: var(--text-muted);">Active Users</div>
                        </div>
                        <i class="fa-solid fa-chart-line" style="color: var(--accent); font-size: 24px;"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Infinite Marquee -->
        <section class="marquee-section" data-aos="fade-in" data-aos-duration="1000">
            <div class="container d-flex align-center" style="max-width: 100%;">
                <div class="marquee-text">Trusted by global innovators</div>
                <div class="marquee-content" style="display: flex;">
                    <div style="display: flex; gap: 80px;">
                        <i class="fa-brands fa-apple"></i>
                        <i class="fa-brands fa-meta"></i>
                        <i class="fa-brands fa-google"></i>
                        <i class="fa-brands fa-aws"></i>
                        <i class="fa-brands fa-spotify"></i>
                        <i class="fa-brands fa-stripe"></i>
                        <i class="fa-brands fa-apple"></i>
                        <i class="fa-brands fa-meta"></i>
                        <i class="fa-brands fa-google"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Box Features -->
        <section class="features container">
            <h2 class="section-title" data-aos="zoom-in" data-aos-duration="800">Engineered for <span class="text-gradient-alt">perfection.</span></h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">We didn't just build a social network. We built a heavy-duty, scalable ecosystem that adapts to how you want to connect.</p>
            
            <div class="bento-grid">
                <div class="bento-card bento-large" data-aos="fade-right" data-aos-delay="200">
                    <div class="bento-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Military-Grade Privacy</h3>
                    <p>Your data is encrypted end-to-end. We believe your conversations belong to you and only you. No tracking, no compromises.</p>
                </div>
                
                <div class="bento-card" data-aos="fade-left" data-aos-delay="300">
                    <div class="bento-icon" style="color: var(--secondary); background: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.2);"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Zero Latency</h3>
                    <p>Real-time messaging powered by global edge servers. Experience chat without the wait.</p>
                </div>

                <div class="bento-card" data-aos="fade-right" data-aos-delay="400">
                    <div class="bento-icon" style="color: var(--accent); background: rgba(14, 165, 233, 0.1); border-color: rgba(14, 165, 233, 0.2);"><i class="fa-solid fa-layer-group"></i></div>
                    <h3>Rich Media</h3>
                    <p>Share stunning 4K photos and high-definition videos with zero compression loss.</p>
                </div>

                <div class="bento-card bento-large" data-aos="fade-left" data-aos-delay="500">
                    <div class="bento-icon" style="color: #10B981; background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2);"><i class="fa-solid fa-globe"></i></div>
                    <h3>Global Communities</h3>
                    <p>Join thousands of active groups tailored to your interests. Connect with people who share your passion, anywhere in the world.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section container">
            <div class="cta-box" data-aos="zoom-out-up" data-aos-duration="1000">
                <h2>Ready to enter the <span class="text-gradient-alt">Future?</span></h2>
                <p style="color: var(--text-muted); font-size: 18px; margin-bottom: 40px; max-width: 500px; margin-left: auto; margin-right: auto;">Join the fastest-growing professional social network today. Setup takes less than 2 minutes.</p>
                <a href="register.html" class="btn btn-primary hero-btn-large">Create Free Account</a>
            </div>
        </section>
    </main>

    <footer data-aos="fade-up">
        <div class="container">
            <div style="font-size: 24px; font-weight: 900; color: var(--text-main); margin-bottom: 16px;">
                <i class="fa-solid fa-bolt" style="color: var(--primary);"></i> Connectova
            </div>
            <p>&copy; 2026 Connectova Global. All rights reserved.</p>
        </div>
    </footer>

    <!-- AOS Animation Library JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize Scroll Animations
        AOS.init({
            duration: 800,   // Animation duration in ms
            once: true,      // Run animation only once when scrolling down
            offset: 100,     // Offset from the bottom of the screen before animating
            easing: 'ease-out-cubic'
        });
    </script>
</body>
</html>
