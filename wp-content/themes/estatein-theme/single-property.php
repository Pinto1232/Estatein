<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="page-content">
                <h1 class="page-title"><?php the_title(); ?></h1>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="property-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="property-details-full">
                    <?php the_content(); ?>
                    
                    <div class="property-meta">
                        <h3>Property Details</h3>
                        <?php
                        $price = get_post_meta(get_the_ID(), 'price', true);
                        $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
                        $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
                        $square_feet = get_post_meta(get_the_ID(), 'square_feet', true);
                        $location = get_post_meta(get_the_ID(), 'location', true);
                        ?>
                        
                        <?php if ($price) : ?>
                            <p><strong>Price:</strong> $<?php echo number_format($price); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($bedrooms) : ?>
                            <p><strong>Bedrooms:</strong> <?php echo $bedrooms; ?></p>
                        <?php endif; ?>
                        
                        <?php if ($bathrooms) : ?>
                            <p><strong>Bathrooms:</strong> <?php echo $bathrooms; ?></p>
                        <?php endif; ?>
                        
                        <?php if ($square_feet) : ?>
                            <p><strong>Square Feet:</strong> <?php echo number_format($square_feet); ?></p>
                        <?php endif; ?>
                        
                        <?php if ($location) : ?>
                            <p><strong>Location:</strong> <?php echo $location; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="property-navigation">
                    <a href="<?php echo get_post_type_archive_link('property'); ?>" class="cta-button">← Back to Properties</a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>