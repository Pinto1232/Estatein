<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <h1 class="page-title">All Properties</h1>
        
        <?php if (have_posts()) : ?>
            <div class="properties-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="property-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="property-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="property-image">Property Image</div>
                        <?php endif; ?>
                        
                        <div class="property-details">
                            <?php
                            $price = get_post_meta(get_the_ID(), 'price', true);
                            $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
                            $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
                            $square_feet = get_post_meta(get_the_ID(), 'square_feet', true);
                            $location = get_post_meta(get_the_ID(), 'location', true);
                            ?>
                            
                            <?php if ($price) : ?>
                                <div class="property-price">$<?php echo number_format($price); ?></div>
                            <?php endif; ?>
                            
                            <h3 class="property-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <?php if ($location) : ?>
                                <p class="property-location"><?php echo $location; ?></p>
                            <?php endif; ?>
                            
                            <div class="property-features">
                                <?php if ($bedrooms) : ?>
                                    <span><?php echo $bedrooms; ?> Beds</span>
                                <?php endif; ?>
                                
                                <?php if ($bathrooms) : ?>
                                    <span><?php echo $bathrooms; ?> Baths</span>
                                <?php endif; ?>
                                
                                <?php if ($square_feet) : ?>
                                    <span><?php echo number_format($square_feet); ?> sq ft</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ));
                ?>
            </div>
        <?php else : ?>
            <p>No properties found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>