// Property Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Get WordPress upload directory base URL
    const getWpUploadsUrl = () => {
        // Try to get from a WordPress function if available
        if (typeof wp_upload_dir !== 'undefined') {
            return wp_upload_dir.baseurl;
        }
        // Fallback to standard WordPress uploads path
        return '/wp-content/uploads';
    };

    // Property data
    const propertyData = {
        'property-1': {
            title: 'Seaside Serenity Villa',
            description: 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood. This beautiful property features modern amenities, spacious living areas, and a private garden perfect for relaxation and entertainment.',
            image: getWpUploadsUrl() + '/2025/07/Image-1.png',
            features: ['4 Bedrooms', '3 Bathrooms', 'Villa', 'Private Garden', 'Modern Kitchen', 'Garage'],
            price: '$550,000',
            additionalInfo: [
                'Year Built: 2018',
                'Square Footage: 2,500 sq ft',
                'Lot Size: 0.5 acres',
                'Property Type: Single Family Home',
                'Heating: Central Air/Heat',
                'Parking: 2-car garage'
            ]
        },
        'property-2': {
            title: 'Metropolitan Haven',
            description: 'A chic and fully-furnished 2-bedroom apartment with panoramic city views. Located in the heart of the city, this modern apartment offers luxury living with premium finishes and access to building amenities.',
            image: getWpUploadsUrl() + '/2025/07/Image-2.png',
            features: ['2 Bedrooms', '2 Bathrooms', 'Apartment', 'City Views', 'Furnished', 'Balcony'],
            price: '$550,000',
            additionalInfo: [
                'Year Built: 2020',
                'Square Footage: 1,200 sq ft',
                'Floor: 15th Floor',
                'Property Type: Condominium',
                'Building Amenities: Gym, Pool, Concierge',
                'Parking: 1 assigned space'
            ]
        },
        'property-3': {
            title: 'Rustic Retreat Cottage',
            description: 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community. This charming property combines rustic charm with modern conveniences, featuring exposed beams, hardwood floors, and a cozy fireplace.',
            image: getWpUploadsUrl() + '/2025/07/Image-3.png',
            features: ['3 Bedrooms', '2.5 Bathrooms', 'Cottage', 'Fireplace', 'Hardwood Floors', 'Gated Community'],
            price: '$550,000',
            additionalInfo: [
                'Year Built: 2015',
                'Square Footage: 1,800 sq ft',
                'Lot Size: 0.25 acres',
                'Property Type: Townhouse',
                'Community Features: Pool, Tennis Court',
                'Parking: Attached garage'
            ]
        }
    };

    // Get modal elements
    const modal = document.getElementById('property-modal');
    const closeBtn = document.querySelector('.close');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-property-title');
    const modalDescription = document.getElementById('modal-property-description');
    const modalFeatures = document.getElementById('modal-property-features');
    const modalPrice = document.getElementById('modal-property-price');
    const modalAdditionalDetails = document.getElementById('modal-additional-details');

    // Add click event listeners to all "View Property" buttons
    document.querySelectorAll('.view-property-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const propertyId = this.getAttribute('data-property');
            const property = propertyData[propertyId];
            
            // Get the property card that contains this button
            const propertyCard = this.closest('.property-card');
            const cardImage = propertyCard.querySelector('.property-image img');
            
            if (property && cardImage) {
                // Use the same image source as the card
                modalImage.src = cardImage.src;
                modalImage.alt = property.title;
                modalTitle.textContent = property.title;
                modalDescription.textContent = property.description;
                modalPrice.textContent = property.price;
                
                // Clear and populate features
                modalFeatures.innerHTML = '';
                property.features.forEach(feature => {
                    const featureSpan = document.createElement('span');
                    featureSpan.className = 'feature';
                    featureSpan.textContent = feature;
                    modalFeatures.appendChild(featureSpan);
                });
                
                // Clear and populate additional info
                modalAdditionalDetails.innerHTML = '';
                property.additionalInfo.forEach(info => {
                    const li = document.createElement('li');
                    li.textContent = info;
                    modalAdditionalDetails.appendChild(li);
                });
                
                // Show modal
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }
        });
    });

    // Close modal when clicking the X button
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    });

    // Close modal when clicking outside of it
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto'; // Restore scrolling
        }
    });

    // Handle Contact Agent button
    document.querySelector('.contact-btn').addEventListener('click', function() {
        alert('Contact Agent functionality would be implemented here.');
        // You can replace this with actual contact form or redirect logic
    });

    // Handle Schedule Viewing button
    document.querySelector('.schedule-btn').addEventListener('click', function() {
        alert('Schedule Viewing functionality would be implemented here.');
        // You can replace this with actual scheduling form or redirect logic
    });

    // Handle Read More buttons
    document.querySelectorAll('.read-more-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get the property card that contains this button
            const propertyCard = this.closest('.property-card');
            const propertyTitle = propertyCard.querySelector('.property-title').textContent;
            
            // Show an alert with the property title (you can customize this behavior)
            alert(`Read more about: ${propertyTitle}\n\nThis would typically open a detailed property page or expand the description.`);
            
            // Alternative: You could trigger the modal instead
            // const viewPropertyBtn = propertyCard.querySelector('.view-property-btn');
            // if (viewPropertyBtn) {
            //     viewPropertyBtn.click();
            // }
        });
    });
});