<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header('shop');
do_action('woocommerce_before_main_content');
?>

<style>
.product-container {
    display: flex;
    max-width: 1400px;
    margin: 20px auto;
    gap: 40px;
    padding: 20px;
    font-family: Arial, sans-serif;
    background: #f5f5f5;
}

/* Left side - Product Images */
.product-images {
    flex: 0 0 45%;
    max-width: 500px;
}

.main-image {
    width: 100%;
    height: 500px;
    object-fit: contain;
    background: white;
    border-radius: 12px;
    padding: 40px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.thumbnail-gallery {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.thumbnail {
    width: 120px;
    height: 120px;
    border: 3px solid transparent;
    border-radius: 50%;
    cursor: pointer;
    overflow: hidden;
    background: white;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s;
}

.thumbnail.active {
    border-color: #4ECDC4;
}

.thumbnail img {
    width: 100%;
    height: 100%;

}

/* Right side - Product Details */
.product-details {
    flex: 1;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.product-header {
    text-align: left;
    margin-bottom: 30px;
}

.item-number {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.product-title {
    font-size: 24px;
    color: #4ECDC4;
    font-weight: normal;
    margin-bottom: 20px;
}

.section-title {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
    text-transform: uppercase;
}

/* Pricing Table */
.pricing-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    font-size: 14px;
}

.pricing-table th {
    background: #4ECDC4;
    color: white;
    padding: 12px 8px;
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 12px;
}

.pricing-table td {
    padding: 10px 8px;
    text-align: center;
    border-bottom: 1px solid #eee;
    color: #999;
    font-size: 12px;
}

.pricing-table tr:nth-child(even) {
    background: #f9f9f9;
}

/* Color Options */
.color-section {
    margin-bottom: 30px;
}

.color-options {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.color-option {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    border: 3px solid transparent;
    transition: all 0.3s;
}

.color-option.teal {
    background: #4ECDC4;
}

.color-option.navy {
    background: #1E3A8A;
}

.color-option.blue {
    background: #3B82F6;
}

.color-option.gray {
    background: #9CA3AF;
}

.color-option:hover,
.color-option.active {
    border-color: #333;
    transform: scale(1.1);
}

/* Imprint Methods */
.imprint-section {
    margin-bottom: 30px;
}

.imprint-options {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.imprint-btn {
    padding: 8px 20px;
    background: #4ECDC4 !important;
    color: white;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s;
}

.imprint-btn:hover {
    background: #187678ff !important;
}

.imprint-btn.disabled {
    background: #E5E7EB;
    color: #ffffffff;
    cursor: not-allowed;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.action-btn {
    flex: 1;
    padding: 12px 20px;
    border: 2px solid #4A90E2 !important;
    background: #3B82F6 !important;
    color: #ffffffff !important;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    font-size: 12px;
    text-transform: uppercase;
    transition: all 0.3s;
    text-align: center;
}

.action-btn:hover {
    background: #4A90E2 !important;
    color: white;
}

/* Quantity and Total Section */
.quantity-total-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.quantity-input {
    width: 80px;
    padding: 8px;
    border: 2px solid #ddd;
    border-radius: 6px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

.total-price {
    font-size: 24px;
    font-weight: bold;
    color: #4ECDC4;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .product-container {
        flex-direction: column;
        gap: 20px;
        padding: 10px;
    }

    .thumbnail-gallery {
        justify-content: center;
    }

    .action-buttons {
        flex-direction: column;
    }

    .quantity-total-section {
        flex-direction: column;
        gap: 15px;
    }
}

/* Hide WooCommerce default elements */
.price,
.woocommerce-product-gallery {
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
            <?php 
            $index = 0;
            foreach($attachment_ids as $attachment_id): 
                $image_url = wp_get_attachment_image_src($attachment_id, 'full')[0];
                
            ?>
            <div class="thumbnail" onclick="changeImage('<?php echo $image_url; ?>')">
                <img src="<?php echo $image_url; ?>" alt="Gallery">
            </div>
            <?php 
            $index++;
            endforeach; 
            ?>
        </div>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <div class="product-header">
            <div class="item-number">ITEM NO:
                <?php echo get_post_meta(get_the_ID(), 'item_number', true) ?: 'WOBO1190'; ?></div>
            <div class="section-title">PRODUCT TITLE</div>
            <h1 class="product-title"><?php the_title(); ?></h1>
        </div>

        <div class="section-title">PRODUCT DESCRIPTION</div>

        <!-- Pricing Table -->
        <table class="pricing-table">
            <thead>
                <tr>
                    <th>QTY</th>
                    <th>LIST PRICE</th>
                    <th>CODE</th>
                    <th>In-hand time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Laser Blank and Silicone</td>
                    <td>240</td>
                    <td>166960</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cymber Schreibwerkzeug</td>
                    <td>500</td>
                    <td>255249S</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Edelmetallspezialist Tierarzneius</td>
                    <td>1298</td>
                    <td>255540C</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Emus het trag Utmar</td>
                    <td>598</td>
                    <td>255549C</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Schwellenlosigkeitskriterium</td>
                    <td>536</td>
                    <td>694249S</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Spas med Kegoler</td>
                    <td>186</td>
                    <td>746543D</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <!-- Color Options -->
        <div class="color-section">
            <div class="color-options">
                <div class="color-option teal active" data-color="teal"></div>
                <div class="color-option navy" data-color="navy"></div>
                <div class="color-option blue" data-color="blue"></div>
                <div class="color-option gray" data-color="gray"></div>
            </div>

            <div class="section-title">Imprint Mechanics</div>
            <div class="imprint-options">
                <button class="imprint-btn">Imprint</button>
                <button class="imprint-btn">Mechanics</button>
                <button class="imprint-btn disabled"># 266133</button>
            </div>
        </div>

        <!-- Quantity and Total -->
        <div class="quantity-total-section">
            <div>
                <label>Quantity:</label>
                <input type="number" id="quantity" class="quantity-input" value="100" min="1">
            </div>
            <div class="total-price" id="totalPrice">$620.00</div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="action-btn" onclick="requestVirtual()">REQUEST VIRTUAL</button>
            <button class="action-btn" onclick="requestSample()">REQUEST SAMPLE</button>
            <button class="action-btn" onclick="getShippingCost()">ESTIMATED SHIPPING COST</button>
        </div>
    </div>
</div>

<script>
// Price calculation based on quantity
const priceTiers = {
    100: 6.20,
    160: 5.80,
    500: 4.85,
    1000: 3.95,
    2500: 3.20
};

// Initialize
jQuery(document).ready(function($) {
    updateTotalPrice();

    // Quantity input change
    $('#quantity').on('input', function() {
        updateTotalPrice();
    });

    // Color selection
    $('.color-option').on('click', function() {
        $('.color-option').removeClass('active');
        $(this).addClass('active');
    });

    // Imprint button clicks
    $('.imprint-btn:not(.disabled)').on('click', function() {
        $('.imprint-btn').removeClass('active');
        $(this).addClass('active');
    });
});

// Update total price
function updateTotalPrice() {
    const qty = parseInt(document.getElementById('quantity').value) || 100;

    // Find best price tier
    let unitPrice = priceTiers[100]; // default
    Object.keys(priceTiers).sort((a, b) => b - a).forEach(tier => {
        if (qty >= parseInt(tier)) {
            unitPrice = priceTiers[tier];
            return;
        }
    });

    const total = qty * unitPrice;
    document.getElementById('totalPrice').textContent = `$${total.toFixed(2)}`;
}

// Change main image
function changeImage(src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
    event.target.closest('.thumbnail').classList.add('active');
}

// Button functions
function requestVirtual() {
    const selectedColor = document.querySelector('.color-option.active').dataset.color;
    const quantity = document.getElementById('quantity').value;

    console.log('Virtual request:', {
        color: selectedColor,
        quantity: quantity
    });
    alert('Virtual sample request submitted!');
}

function requestSample() {
    const selectedColor = document.querySelector('.color-option.active').dataset.color;
    const quantity = document.getElementById('quantity').value;

    console.log('Sample request:', {
        color: selectedColor,
        quantity: quantity
    });
    alert('Physical sample request submitted!');
}

function getShippingCost() {
    const quantity = document.getElementById('quantity').value;
    console.log('Shipping cost request for quantity:', quantity);
    alert('Calculating shipping cost... We\'ll email you the estimate.');
}
</script>

<?php endwhile; ?>

<?php
do_action('woocommerce_after_main_content');
get_footer('shop');
?>