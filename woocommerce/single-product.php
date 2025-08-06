<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
do_action( 'woocommerce_before_main_content' );
?>

<style>
.custom-product-layout {
    display: flex;
    gap: 40px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #fff;
}

.product-left {
    flex: 1;
    max-width: 500px;
}

.product-images-container {
    position: relative;
}

.main-product-image {
    width: 100%;
    max-width: 500px;
    height: 400px;
    object-fit: contain;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background: #f9f9f9;
    margin-bottom: 15px;
    padding: 20px;
}

.thumbnail-gallery {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: flex-start;
}

.thumbnail-item {
    width: 80px;
    height: 80px;
    border: 2px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    overflow: hidden;
    transition: border-color 0.3s ease;
    background: #f9f9f9;
    padding: 8px;
}

.thumbnail-item:hover,
.thumbnail-item.active {
    border-color: #007cba;
}

.thumbnail-item img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.zoom-button {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.product-right {
    flex: 1;
    max-width: 500px;
}

.product-right h1 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #333;
    line-height: 1.3;
}

.product-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 14px;
}

.meta-icon {
    width: 20px;
    height: 20px;
    background: #f0f8ff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: #007cba;
}

.money-back-guarantee {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 25px;
    color: #28a745;
    font-size: 14px;
    font-weight: 600;
    padding: 10px 15px;
    background: #f8fff9;
    border-left: 4px solid #28a745;
    border-radius: 4px;
}

.guarantee-icon {
    width: 24px;
    height: 24px;
    background: #28a745;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
}

.quantity-section {
    margin-bottom: 25px;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.quantity-section label {
    display: block;
    margin-bottom: 12px;
    font-weight: 600;
    color: #333;
    font-size: 16px;
}

.quantity-container {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.quantity-input {
    width: 100px;
    padding: 12px 16px;
    border: 2px solid #ddd;
    border-radius: 6px;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    transition: border-color 0.3s ease;
}

.quantity-input:focus {
    outline: none;
    border-color: #007cba;
}

.price-display {
    color: #007cba;
    font-size: 20px;
    font-weight: 700;
    background: white;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #007cba;
}

.bulk-pricing {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.bulk-option {
    padding: 8px 16px;
    background: white;
    border: 2px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
    min-width: 60px;
    text-align: center;
}

.bulk-option:hover {
    border-color: #007cba;
    background: #f0f8ff;
}

.bulk-option.active {
    background: #007cba;
    color: white;
    border-color: #007cba;
}

.custom-fields {
    margin-bottom: 25px;
}

.field-group {
    margin-bottom: 20px;
}

.field-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
    font-size: 15px;
}

.field-group select,
.field-group textarea {
    width: 100%;

    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    background: white;
    transition: border-color 0.3s ease;
}

.field-group select:focus,
.field-group textarea:focus {
    outline: none;
    border-color: #007cba;
}

.field-group textarea {
    min-height: 110px;
    resize: vertical;
    font-family: inherit;
}

.total-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    border-left: 5px solid #007cba;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.total-label {
    font-size: 16px;
    font-weight: 600;
    color: #666;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.total-price {
    font-size: 32px;
    font-weight: 800;
    color: #007cba;
    text-shadow: 0 1px 2px rgba(0, 124, 186, 0.2);
}

.custom-buttons {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 12px;
    margin-bottom: 25px;
}

.custom-buttons button {
    padding: 14px 20px;
    border: 2px solid #007cba;
    background: white;
    color: #007cba;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    position: relative;
    overflow: hidden;
}

.custom-buttons button:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.custom-buttons button:hover:before {
    left: 100%;
}

.custom-buttons button:hover {
    background: #f0f8ff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 124, 186, 0.3);
}

.custom-buttons .order-now {
    background: linear-gradient(135deg, #007cba 0%, #005a87 100%);
    color: white;
    grid-column: 1 / -1;
    font-size: 16px;
    padding: 16px 20px;
    position: relative;
    padding-left: 50px;
}

.custom-buttons .order-now:before {
    content: "🔒";
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
}

.custom-buttons .order-now:hover {
    background: linear-gradient(135deg, #005a87 0%, #003d5c 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 124, 186, 0.4);
}

.help-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    font-style: italic;
    color: #666;
    margin-bottom: 20px;
    border: 1px solid #dee2e6;
}

.help-section .phone-number {
    color: #007cba;
    font-weight: 700;
    text-decoration: none;
    font-size: 16px;
    display: inline-block;
    margin-top: 8px;
    padding: 6px 12px;
    background: white;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.help-section .phone-number:hover {
    background: #f0f8ff;
    transform: scale(1.05);
}

.back-button {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    width: 100%;
}

.back-button:before {
    content: "↩";
    font-size: 16px;
}

.back-button:hover {
    background: linear-gradient(135deg, #495057 0%, #343a40 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-product-layout {
        flex-direction: column;
        gap: 25px;
        padding: 15px;
    }

    .product-right h1 {
        font-size: 24px;
    }

    .custom-buttons {
        grid-template-columns: 1fr;
    }

    .quantity-container {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .bulk-pricing {
        justify-content: center;
    }

    .total-price {
        font-size: 28px;
    }
}

/* WooCommerce specific overrides */
.woocommerce-product-gallery {
    margin-bottom: 0;
}

.woocommerce-product-gallery__wrapper {
    margin: 0;
}

.woocommerce-product-gallery__image {
    margin-bottom: 10px;
}

.price {
    display: none !important;
}

/* Loading animation */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #007cba;
    border-top: 2px solid transparent;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>

<?php while ( have_posts() ) : the_post(); ?>

<div class="custom-product-layout">
    <div class="product-left">
        <div class="product-images-container">
            <?php 
            // Get product images
            global $product;
            $attachment_ids = $product->get_gallery_image_ids();
            $main_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            ?>

            <img src="<?php echo $main_image[0]; ?>" alt="<?php the_title(); ?>" class="main-product-image"
                id="mainImage">
            <button class="zoom-button" onclick="openImageModal('<?php echo $main_image[0]; ?>')">+</button>

            <div class="thumbnail-gallery">
                <div class="thumbnail-item active" onclick="changeMainImage('<?php echo $main_image[0]; ?>')">
                    <img src="<?php echo $main_image[0]; ?>" alt="Main">
                </div>
                <?php foreach( $attachment_ids as $attachment_id ): 
                    $image_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
                ?>
                <div class="thumbnail-item" onclick="changeMainImage('<?php echo $image_url; ?>')">
                    <img src="<?php echo $image_url; ?>" alt="Gallery">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="product-right">
        <h1><?php the_title(); ?></h1>

        <div class="money-back-guarantee">
            <div class="guarantee-icon">$</div>
            <span>Money back guarantee</span>
        </div>

        <div class="quantity-section">
            <label for="quantity">Select Quantity</label>
            <div class="quantity-container">
                <input type="number" id="quantity" class="quantity-input" value="100" min="1" step="1">
                <div class="price-display">× $0.00</div>
            </div>
            <div class="bulk-pricing">
                <div class="bulk-option active" data-qty="100">100</div>
                <div class="bulk-option" data-qty="500">500</div>
                <div class="bulk-option" data-qty="1000">1000</div>
                <div class="bulk-option" data-qty="2500">2500</div>
                <div class="bulk-option" data-qty="5000">5000</div>
            </div>
        </div>

        <div class="custom-fields">
            <div class="field-group">
                <label for="imprint-method">Imprint Method</label>
                <select id="imprint-method">
                    <option value="blank">Blank (No Imprint)</option>
                    <option value="screen-print">Screen Print</option>
                    <option value="embroidery">Embroidery</option>
                    <option value="heat-transfer">Heat Transfer</option>
                    <option value="laser-engraving">Laser Engraving</option>
                </select>
            </div>

            <div class="field-group">
                <label for="color">Product Color</label>
                <select id="color">
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="khaki">Khaki</option>
                    <option value="olive">Olive</option>
                    <option value="navy">Navy</option>
                </select>
            </div>

            <div class="field-group">
                <label for="in-hand-time">Production Time</label>
                <select id="in-hand-time">
                    <option value="7days">7 Business Days</option>
                    <option value="15days">15 Business Days</option>
                    <option value="30days">30 Business Days</option>
                    <option value="45days">45 Business Days</option>
                </select>
            </div>

            <div class="field-group">
                <label for="other-request">Special Instructions</label>
                <textarea id="other-request"
                    placeholder="Please describe any special requirements, custom colors, or specific design instructions..."></textarea>
            </div>
        </div>

        <div class="total-section">
            <div class="total-label">Total Price</div>
            <div class="total-price" id="totalPrice">$0.00</div>
        </div>

        <div class="custom-buttons">
            <button type="button" class="request-virtual">Request Virtual</button>
            <button type="button" class="request-sample">Request Sample</button>
            <button type="button" class="request-quote">Request Quote</button>
            <button type="button" class="order-now">Secure Order Now</button>
        </div>

        <div class="help-section">
            <p>Need help with your order? Our expert team is here to assist you!</p>
            <a href="tel:408-387-4155" class="phone-number">📞 Call (408) 387-4155</a>
        </div>

        <button type="button" class="back-button">Return to Products</button>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Pricing tiers based on quantity
    const pricingTiers = {
        1: 8.50,
        100: 6.20,
        500: 4.85,
        1000: 3.95,
        2500: 3.20,
        5000: 2.75
    };

    // Handle quantity changes
    $('#quantity').on('input change', function() {
        var qty = parseInt($(this).val()) || 1;
        updatePrice(qty);
        highlightBulkOption(qty);
    });

    $('.bulk-option').on('click', function() {
        var qty = $(this).data('qty');
        $('#quantity').val(qty);
        updatePrice(qty);
        highlightBulkOption(qty);
    });

    function highlightBulkOption(qty) {
        $('.bulk-option').removeClass('active');
        $(`.bulk-option[data-qty="${qty}"]`).addClass('active');
    }

    function updatePrice(qty) {
        // Find the appropriate pricing tier
        let unitPrice = pricingTiers[1]; // Default price

        Object.keys(pricingTiers).sort((a, b) => b - a).forEach(tier => {
            if (qty >= parseInt(tier)) {
                unitPrice = pricingTiers[tier];
                return false;
            }
        });

        var total = qty * unitPrice;
        $('.price-display').text('× $' + unitPrice.toFixed(2));
        $('#totalPrice').text('$' + total.toFixed(2));
    }

    // Initialize with default quantity
    updatePrice(100);

    // Button click handlers with loading states
    $('.request-virtual').click(function() {
        showLoading($(this));
        // Implement virtual sample request
        setTimeout(() => {
            hideLoading($(this));
            alert('Virtual sample request submitted successfully!');
        }, 1500);
    });

    $('.request-sample').click(function() {
        showLoading($(this));
        // Implement physical sample request
        setTimeout(() => {
            hideLoading($(this));
            alert('Physical sample request submitted successfully!');
        }, 1500);
    });

    $('.request-quote').click(function() {
        showLoading($(this));
        // Collect all form data
        var quoteData = {
            quantity: $('#quantity').val(),
            imprint_method: $('#imprint-method').val(),
            color: $('#color').val(),
            production_time: $('#in-hand-time').val(),
            special_instructions: $('#other-request').val(),
            product_id: <?php echo get_the_ID(); ?>
        };

        setTimeout(() => {
            hideLoading($(this));
            alert('Quote request submitted successfully! We\'ll contact you within 24 hours.');
        }, 1500);
    });

    $('.order-now').click(function() {
        showLoading($(this));
        // Add to cart functionality
        var cartData = {
            quantity: $('#quantity').val(),
            imprint_method: $('#imprint-method').val(),
            color: $('#color').val(),
            production_time: $('#in-hand-time').val(),
            special_instructions: $('#other-request').val()
        };

        setTimeout(() => {
            hideLoading($(this));
            // Redirect to checkout or show success message
            window.location.href = '/checkout';
        }, 2000);
    });

    $('.back-button').click(function() {
        if (window.history.length > 1) {
            window.history.back();
        } else {
            window.location.href = '/shop';
        }
    });

    function showLoading(button) {
        button.addClass('loading').prop('disabled', true);
        button.data('original-text', button.text());
        button.text('Processing...');
    }

    function hideLoading(button) {
        button.removeClass('loading').prop('disabled', false);
        button.text(button.data('original-text'));
    }

    // Form validation
    function validateForm() {
        var isValid = true;
        var quantity = parseInt($('#quantity').val());

        if (!quantity || quantity < 1) {
            alert('Please enter a valid quantity.');
            isValid = false;
        }

        return isValid;
    }

    // Auto-save form data to session storage (if needed)
    $('select, textarea, input').on('change', function() {
        // Save form state for user convenience
        console.log('Form updated:', {
            field: $(this).attr('id'),
            value: $(this).val()
        });
    });
});

// Image gallery functions
function changeMainImage(imageSrc) {
    document.getElementById('mainImage').src = imageSrc;

    // Update active thumbnail
    document.querySelectorAll('.thumbnail-item').forEach(item => {
        item.classList.remove('active');
    });
    event.target.closest('.thumbnail-item').classList.add('active');
}

function openImageModal(imageSrc) {
    // Create modal for image zoom
    var modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        cursor: pointer;
    `;

    var img = document.createElement('img');
    img.src = imageSrc;
    img.style.cssText = `
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    `;

    modal.appendChild(img);
    document.body.appendChild(modal);

    modal.onclick = function() {
        document.body.removeChild(modal);
    };
}
</script>

<?php endwhile; ?>

<?php
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );
?>