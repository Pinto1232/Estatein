<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-main">
            <!-- Company Info -->
            <div class="footer-section company-info">
                <div class="footer-logo">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Logo.png" alt="Estatein Logo" class="footer-logo-img">
                </div>
                <div class="footer-email-form">
                    <input type="email" placeholder="Enter your email" class="footer-email-input" required>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section quick-links">
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/?page=about'); ?>">About Us</a></li>
                    <li><a href="<?php echo home_url('/?page=properties'); ?>">Properties</a></li>
                    <li><a href="<?php echo home_url('/?page=services'); ?>">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="footer-section services">
                <h4 class="footer-title">Our Services</h4>
                <ul class="footer-menu">
                    <li><a href="#">Property Sales</a></li>
                    <li><a href="#">Property Rentals</a></li>
                    <li><a href="#">Property Management</a></li>
                    <li><a href="#">Investment Consulting</a></li>
                    <li><a href="#">Market Analysis</a></li>
                    <li><a href="#">Legal Support</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section contact-info">
                <h4 class="footer-title">Contact Us</h4>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>123 Real Estate Ave<br>Property City, PC 12345</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+1 (555) 123-4567</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@estatein.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <span>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</span>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="footer-legal">
                    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                    <a href="#" class="terms-link">Terms & Conditions</a>
                </div>
                <div class="footer-social">
                    <a href="#" class="social-link" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>