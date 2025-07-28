<?php get_header(); ?>

<main class="blog-page">
    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Our Blog</h1>
                <p class="hero-description">Stay updated with the latest real estate trends, market insights, and expert advice from our team of professionals.</p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="blog-posts-section">
        <div class="container">
            <div class="section-header">
                <h2 class="blog-section-title">Latest Articles</h2>
                <p class="blog-section-description">Discover valuable insights and expert advice on real estate trends, investment strategies, and market updates.</p>
            </div>
            
            <div class="blog-grid">
                <!-- Featured Post -->
                <article class="blog-post featured-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Container.png" alt="Real Estate Market Trends 2024">
                        <div class="post-category">Market Trends</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 15, 2024</span>
                            <span class="post-author">By Sarah Johnson</span>
                        </div>
                        <h2 class="post-title">Real Estate Market Trends to Watch in 2024</h2>
                        <p class="post-excerpt">Discover the key trends shaping the real estate market this year, from emerging neighborhoods to new buyer preferences and investment opportunities.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <!-- Regular Posts -->
                <article class="blog-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-1.png" alt="First Time Home Buying">
                        <div class="post-category">Buying Guide</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 12, 2024</span>
                            <span class="post-author">By John Smith</span>
                        </div>
                        <h3 class="post-title">First-Time Home Buyer's Complete Guide</h3>
                        <p class="post-excerpt">Everything you need to know about buying your first home, from financing options to closing costs.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="blog-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-2.png" alt="Investment Properties">
                        <div class="post-category">Investment</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 10, 2024</span>
                            <span class="post-author">By Michael Brown</span>
                        </div>
                        <h3 class="post-title">Top 5 Investment Property Strategies</h3>
                        <p class="post-excerpt">Learn proven strategies for building wealth through real estate investments and maximizing your returns.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="blog-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-3.png" alt="Home Staging Tips">
                        <div class="post-category">Selling Tips</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 8, 2024</span>
                            <span class="post-author">By Emily Davis</span>
                        </div>
                        <h3 class="post-title">Home Staging Tips That Sell Fast</h3>
                        <p class="post-excerpt">Professional staging tips to make your property stand out and attract potential buyers quickly.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="blog-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/CTA.png" alt="Market Analysis">
                        <div class="post-category">Market Analysis</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 5, 2024</span>
                            <span class="post-author">By David Wilson</span>
                        </div>
                        <h3 class="post-title">Q4 2023 Market Analysis Report</h3>
                        <p class="post-excerpt">Comprehensive analysis of the fourth quarter real estate market performance and future predictions.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>

                <article class="blog-post">
                    <div class="post-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Abstract-Design.png" alt="Mortgage Tips">
                        <div class="post-category">Finance</div>
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="post-date">January 3, 2024</span>
                            <span class="post-author">By Lisa Anderson</span>
                        </div>
                        <h3 class="post-title">Understanding Mortgage Options in 2024</h3>
                        <p class="post-excerpt">Navigate the current mortgage landscape with our comprehensive guide to financing options.</p>
                        <a href="#" class="read-more-btn">Read More →</a>
                    </div>
                </article>
            </div>

            <!-- Blog Pagination -->
            <div class="blog-pagination">
                <a href="#" class="pagination-btn prev-btn">
                    <i class="fas fa-chevron-left"></i>
                    <span>Previous</span>
                </a>
                
                <div class="pagination-numbers">
                    <a href="#" class="page-number active">1</a>
                    <a href="#" class="page-number">2</a>
                    <a href="#" class="page-number">3</a>
                    <span class="page-dots">...</span>
                    <a href="#" class="page-number">8</a>
                </div>
                
                <a href="#" class="pagination-btn next-btn">
                    <span>Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="blog-newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2 class="newsletter-title">Stay Updated</h2>
                <p class="newsletter-description">Subscribe to our newsletter and never miss the latest real estate insights and market updates.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>