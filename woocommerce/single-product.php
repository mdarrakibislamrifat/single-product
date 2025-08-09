<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
do_action('woocommerce_before_main_content');
?>

<style>
/* Main Layout */
.product-container {
    display: flex;
    max-width: 1200px;
    margin: 20px auto;
    gap: 40px;
    padding: 20px;
    font-family: Arial, sans-serif;
}

.product-images {
    flex: 1;
    max-width: 500px;
}

.main-image {
    width: 100%;
    height: 400px;
    object-fit: contain;
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f9f9f9;
    padding: 20px;
    margin-bottom: 15px;
}

.thumbnail-gallery {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.thumbnail {
    width: 110px;
    height: 110px;
    border: 2px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    overflow: hidden;
    background: #f9f9f9;
    padding: 5px;
}

.thumbnail.active {
    border-color: #007cba;
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* Product Details */
.product-details {
    flex: 1;
    max-width: 500px;
}

.product-title {
    font-size: 16px;
    margin-bottom: 15px;
}

.guarantee {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
    padding: 5px;
    border-radius: 4px;
}

/* Quantity Section */
.quantity-section {
    padding: 5px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
}

.quantity-section label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.quantity-input {
    width: 60px;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 6px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

.quantity-input:focus {
    border-color: #007cba;
    outline: none;
}

.price-display {
    color: #007cba;
    font-size: 18px;
    font-weight: bold;
    background: white;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #007cba;
}

.bulk-options {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.bulk-btn {
    padding: 8px 16px;
    background: white;
    border: 2px solid #ddd;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s;
}

.bulk-btn:hover {
    border-color: #007cba;
    background: #f0f8ff;
}

.bulk-btn.active {
    background: #007cba;
    color: white;
    border-color: #007cba;
}

/* Form Fields */
.form-section {
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-group label {
    flex: 1;
    padding: 2px;
    font-size: 14px;
    background: transparent;
    border: none;
}

.form-group select,
.form-group textarea {
    flex: 1;
    padding: 5px;
    align-self: center;
    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    background: white;
    box-sizing: border-box;
}


.form-group textarea {
    min-height: 60px;
    resize: vertical;
    font-family: inherit;
}


/* Total Price */
.total-section {
    display: flex;
    justify-content: space-between;
    color: #3272DC;
    padding: 5px;
    border-radius: 8px;
    margin-bottom: 10px;
    text-align: center;
}

.total-label {
    font-size: 14px;

    color: #3272DC;
    margin-bottom: 5px;
    text-transform: uppercase;
    font-weight: bold;
}

.total-price {
    font-size: 20px;
    font-weight: bold;
    color: #3272DC;
}

/* Buttons */
.button-grid {
    display: flex;
    gap: 4px;
    margin-bottom: 10px;
}

.btn {
    flex: 1;
    color: #3272DC !important;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase;
    text-align: center;
    border: none;
}

.btn:hover {
    background: #f0f8ff !important;
    color: #0087CB !important;
}

.btn-primary {
    background: #3272DC !important;
    color: white !important;
}

.btn-primary:hover {
    background: #007cba !important;
    color: white !important;
    cursor: pointer;
}





/* Help Section */
.help-section {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    padding: 8px 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    gap: 12px;
    font-family: Arial, sans-serif;
}

.two-buttons {
    display: flex;
    gap: 6px;
}

.two-buttons button {
    width: 36px;
    height: 36px;
    border: 1px solid #ccc;
    background: white;
    border-radius: 4px;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.two-buttons button svg {
    width: 18px;
    height: 18px;
    fill: #000;
}

.two-buttons button:hover {
    background: #f0f8ff;
}

.two-buttons button:focus,
.two-buttons button:active {
    outline: none;
    background: #f0f8ff;
    border-color: #ccc;
    color: inherit;
    box-shadow: none;
}


.help-text {
    font-style: italic;
    font-size: 14px;
    color: #333;
    flex: 1;
    display: flex;
    align-items: center;
    gap: 6px;
}


.back-btn {
    display: flex;
    align-items: center;
    color: white;
    background-color: #3272DC !important;
    border: none;
    padding: 4px 7px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    text-transform: uppercase;
    gap: 6px;
    font-size: 13px;
    white-space: nowrap;
}

.back-btn:hover {
    background-color: #007cba !important;
}

.back-btn svg {
    fill: white;
    width: 18px;
    height: 18px;
}


/* Mobile Responsive */
@media (max-width: 768px) {
    .product-container {
        flex-direction: column;
        gap: 20px;
        padding: 10px;
    }

    .button-grid {
        grid-template-columns: 1fr;
    }

    .quantity-controls {
        flex-direction: column;
        align-items: flex-start;
    }

    .bulk-options {
        justify-content: center;
    }
}

/* Hide WooCommerce default price */
.price {
    display: none !important;
}
</style>

<?php while (have_posts()) : the_post(); ?>

<div class="product-container">
    <!-- Product Images -->
    <div class="product-images">
        <?php 
        global $product;
        $attachment_ids = $product->get_gallery_image_ids();
        $main_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        ?>

        <img src="<?php echo $main_image[0]; ?>" alt="<?php the_title(); ?>" class="main-image" id="mainImage">

        <div class="thumbnail-gallery">
            <div class="thumbnail active" onclick="changeImage('<?php echo $main_image[0]; ?>')">
                <img src="<?php echo $main_image[0]; ?>" alt="Main">
            </div>
            <?php foreach($attachment_ids as $attachment_id): 
                $image_url = wp_get_attachment_image_src($attachment_id, 'full')[0];
            ?>
            <div class="thumbnail" onclick="changeImage('<?php echo $image_url; ?>')">
                <img src="<?php echo $image_url; ?>" alt="Gallery">
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <h1 class="product-title"><?php the_title(); ?></h1>

        <div class="guarantee">
            <span>💰</span>
            <span>Money back guarantee</span>
        </div>

        <!-- Quantity Section -->
        <div class="quantity-section">
            <label>Enter Quantity</label>
            <div class="quantity-controls">
                <input type="number" id="quantity" class="quantity-input" value="160" min="1">
                <div class="price-display">× $0.00</div>
                <span style="color: #666;">6000</span>
            </div>
            <div class="bulk-options">
                <button class="bulk-btn" data-qty="100">100</button>
                <button class="bulk-btn active" data-qty="160">160</button>
                <button class="bulk-btn" data-qty="500">500</button>
                <button class="bulk-btn" data-qty="1000">1000</button>
                <button class="bulk-btn" data-qty="2500">2500</button>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="form-section">
            <div class="form-group">
                <label>Imprint Method</label>
                <select id="imprint-method">
                    <option value="blank">Blank</option>
                    <option value="screen-print">Screen Print</option>
                    <option value="embroidery">Embroidery</option>
                    <option value="heat-transfer">Heat Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label>Color</label>
                <select id="color">
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                </select>
            </div>

            <div class="form-group">
                <label>In-hand time</label>
                <select id="in-hand-time">
                    <option value="15days">15days</option>
                    <option value="7days">7 Days</option>
                    <option value="30days">30 Days</option>
                </select>
            </div>

            <div class="form-group">
                <label>Other on request</label>
                <textarea id="other-request" placeholder="Enter special instructions..."></textarea>
            </div>
        </div>

        <!-- Total Price -->
        <div class="total-section">
            <div class="total-label">Total</div>
            <div class="total-price" id="totalPrice">$0.00</div>
        </div>

        <!-- Action Buttons -->
        <div class="button-grid">
            <button class="btn" onclick="requestVirtual()">Request Virtual</button>
            <button class="btn" onclick="requestSample()">Request Sample</button>
            <button class="btn" onclick="requestQuote()">Request Quote</button>
            <button class="btn btn-primary" onclick="orderNow()">🔒 Order Now</button>
        </div>

        <!-- Help Section -->
        <div class="help-section">
            <div class="two-buttons">
                <button title="Like">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.032,29.247c-0.092,0-0.185-0.035-0.255-0.105L3.008,16.373c-1.507-1.507-2.337-3.506-2.337-5.629
                        c0-2.139,0.83-4.147,2.337-5.655c1.506-1.506,3.508-2.335,5.639-2.337c0,0,0.001,0,0.002,0c2.132,0,4.136,0.83,5.643,2.337
                        l1.74,1.74l1.74-1.74c1.507-1.507,3.511-2.337,5.642-2.337c0.003,0,0.005,0,0.008,0c2.128,0.002,4.129,0.832,5.635,2.337
                        c1.507,1.508,2.337,3.511,2.337,5.642s-0.83,4.134-2.337,5.642L16.287,29.142C16.216,29.212,16.124,29.247,16.032,29.247z
                        M8.649,3.473c0,0-0.001,0-0.002,0C6.709,3.474,4.888,4.229,3.518,5.599C2.147,6.97,1.392,8.797,1.392,10.744
                        c0,1.931,0.755,3.749,2.126,5.119l0,0l12.514,12.514l12.514-12.514c1.371-1.371,2.126-3.193,2.126-5.132s-0.755-3.761-2.126-5.132
                        c-1.37-1.369-3.19-2.124-5.125-2.126c-0.003,0-0.006,0-0.008,0c-1.938,0-3.761,0.754-5.132,2.126l-1.995,1.995
                        c-0.141,0.141-0.369,0.141-0.51,0l-1.995-1.995C12.412,4.228,10.588,3.473,8.649,3.473z" />
                    </svg>
                </button>
                <button title="Stats">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000">
                        <rect x="3" y="14" width="4" height="7" />
                        <rect x="10" y="10" width="4" height="11" />
                        <rect x="17" y="6" width="4" height="15" />
                    </svg>
                </button>
            </div>
            <div class="help-text">
                <span>We'd love to help. Call us to discuss your project with a knowledgeable account rep. 📞
                    408-387-4155</span>

            </div>

        </div>

        <button class="back-btn" onclick="goBack()">↩ Back to Previous Menu</button>
    </div>
</div>

<script>
// Price tiers
const prices = {
    100: 6.20,
    160: 5.80,
    500: 4.85,
    1000: 3.95,
    2500: 3.20
};

// Initialize
jQuery(document).ready(function($) {
    updatePrice();

    // Quantity input change
    $('#quantity').on('input', function() {
        updatePrice();
        highlightBulkOption();
    });

    // Bulk option clicks
    $('.bulk-btn').on('click', function() {
        const qty = $(this).data('qty');
        $('#quantity').val(qty);
        updatePrice();
        highlightBulkOption();
    });
});

// Update price calculation
function updatePrice() {
    const qty = parseInt(document.getElementById('quantity').value) || 1;

    // Find best price tier
    let unitPrice = prices[100]; // default
    Object.keys(prices).sort((a, b) => b - a).forEach(tier => {
        if (qty >= parseInt(tier)) {
            unitPrice = prices[tier];
            return;
        }
    });

    const total = qty * unitPrice;
    document.querySelector('.price-display').textContent = `× $${unitPrice.toFixed(2)}`;
    document.getElementById('totalPrice').textContent = `$${total.toFixed(2)}`;
}

// Highlight active bulk option
function highlightBulkOption() {
    const qty = parseInt(document.getElementById('quantity').value);
    document.querySelectorAll('.bulk-btn').forEach(btn => {
        btn.classList.remove('active');
        if (parseInt(btn.dataset.qty) === qty) {
            btn.classList.add('active');
        }
    });
}

// Change main image
function changeImage(src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
    event.target.closest('.thumbnail').classList.add('active');
}

// Button functions
function requestVirtual() {
    alert('Virtual sample request submitted!');
}

function requestSample() {
    alert('Physical sample request submitted!');
}

function requestQuote() {
    const data = {
        quantity: document.getElementById('quantity').value,
        imprint: document.getElementById('imprint-method').value,
        color: document.getElementById('color').value,
        time: document.getElementById('in-hand-time').value,
        notes: document.getElementById('other-request').value
    };
    console.log('Quote data:', data);
    alert('Quote request submitted! We\'ll contact you within 24 hours.');
}

function orderNow() {
    alert('Adding to cart...');
    // Add WooCommerce add to cart functionality here
}

function goBack() {
    if (window.history.length > 1) {
        window.history.back();
    } else {
        window.location.href = '/shop';
    }
}
</script>

<?php endwhile; ?>

<?php
do_action('woocommerce_after_main_content');
get_footer('shop');
?>