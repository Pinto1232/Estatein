<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-content">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="page-content-text">
                    <?php the_content(); ?>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form">
                    <h3>Get In Touch</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="interest">I'm Interested In</label>
                            <select id="interest" name="interest">
                                <option value="">Select an option</option>
                                <option value="buying">Buying a Property</option>
                                <option value="selling">Selling a Property</option>
                                <option value="renting">Renting a Property</option>
                                <option value="investing">Investment Opportunities</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="budget">Budget Range</label>
                            <select id="budget" name="budget">
                                <option value="">Select budget range</option>
                                <option value="under-200k">Under $200,000</option>
                                <option value="200k-500k">$200,000 - $500,000</option>
                                <option value="500k-1m">$500,000 - $1,000,000</option>
                                <option value="1m-2m">$1,000,000 - $2,000,000</option>
                                <option value="over-2m">Over $2,000,000</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Tell us about your real estate needs..."></textarea>
                        </div>
                        
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                </div>
                
                <!-- Contact Information -->
                <div class="contact-info" style="margin-top: 3rem; padding: 2rem; background: #f8f9fa; border-radius: 10px;">
                    <h3>Contact Information</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 1rem;">
                        <div>
                            <h4>Office Address</h4>
                            <p>123 Real Estate Avenue<br>
                            Downtown District<br>
                            City, State 12345</p>
                        </div>
                        <div>
                            <h4>Phone & Email</h4>
                            <p>Phone: (555) 123-4567<br>
                            Email: info@estatein.com<br>
                            Fax: (555) 123-4568</p>
                        </div>
                        <div>
                            <h4>Business Hours</h4>
                            <p>Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 10:00 AM - 4:00 PM<br>
                            Sunday: By Appointment</p>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>