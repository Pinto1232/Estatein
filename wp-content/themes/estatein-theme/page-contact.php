<?php get_header(); ?>

<main class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Contact Us</h1>
                <p class="hero-description">Get in touch with our expert team. We're here to help you with all your real estate needs.</p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="contact-main-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-container">
                    <h2 class="form-title">Send us a Message</h2>
                    <p class="form-description">Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <form class="contact-form" id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name *</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name *</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="buying">Buying Property</option>
                                <option value="selling">Selling Property</option>
                                <option value="renting">Property Rental</option>
                                <option value="investment">Investment Consulting</option>
                                <option value="management">Property Management</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="6" placeholder="Tell us about your real estate needs..." required></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info-container">
                    <h2 class="info-title">Get in Touch</h2>
                    <p class="info-description">We're here to help you with all your real estate needs. Reach out to us through any of the following channels.</p>
                    
                    <div class="contact-info-list">
                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-label">Office Address</h3>
                                <p class="info-text">123 Real Estate Avenue<br>Property City, PC 12345<br>United States</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-label">Phone Numbers</h3>
                                <p class="info-text">Main: +1 (555) 123-4567<br>Sales: +1 (555) 123-4568<br>Support: +1 (555) 123-4569</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-label">Email Addresses</h3>
                                <p class="info-text">General: info@estatein.com<br>Sales: sales@estatein.com<br>Support: support@estatein.com</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h3 class="info-label">Business Hours</h3>
                                <p class="info-text">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="contact-social">
                        <h3 class="social-title">Follow Us</h3>
                        <div class="social-links">
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
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2 class="map-title">Find Our Office</h2>
            <div class="map-container">
                <!-- Google Maps Embed -->
                <div class="map-embed">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.1234567890123!2d-74.0059413!3d40.7127753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQyJzQ2LjAiTiA3NMKwMDAnMjEuNCJX!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                
                <!-- Map Info Overlay -->
                <div class="map-info-overlay">
                    <div class="map-info-content">
                        <h3 class="map-info-title">Estatein Office</h3>
                        <p class="map-info-address">123 Real Estate Avenue<br>Property City, PC 12345</p>
                        <a href="https://maps.google.com" target="_blank" class="directions-btn">
                            <i class="fas fa-directions"></i>
                            Get Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-description">Quick answers to common questions about our services.</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <h3 class="faq-question">How quickly can you help me find a property?</h3>
                    <p class="faq-answer">We typically have properties that match your criteria within 24-48 hours. Our extensive network and market knowledge help us find suitable options quickly.</p>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">What are your commission rates?</h3>
                    <p class="faq-answer">Our commission rates are competitive and vary based on the type of service and property value. Contact us for a personalized quote.</p>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Do you provide property management services?</h3>
                    <p class="faq-answer">Yes, we offer comprehensive property management services including tenant screening, rent collection, maintenance, and financial reporting.</p>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Can you help with investment properties?</h3>
                    <p class="faq-answer">Absolutely! We specialize in investment consulting and can help you identify profitable opportunities and build a strong property portfolio.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>