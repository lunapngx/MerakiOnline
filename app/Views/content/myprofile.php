<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Meraki Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <style>
        background-color:
        color: #1D4ED8;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

<header class="bg-white shadow-sm py-4">
    <div class="container mx-auto px-8 flex items-center justify-between">
        <div class="flex items-center">
            <span class="text-2xl font-bold text-gray-800 mr-8">My Account</span>
        </div>
    </div>
</header>

<main class="flex flex-1 container mx-auto py-8 px-4">

    <aside class="w-64 bg-white p-6 shadow-md rounded-r-lg flex flex-col justify-between flex-shrink-0">
        <div>
            <div class="user-profile-widget text-center py-4">
                <div class="relative mx-auto" style="width: 120px; height: 120px;">
                    <img src="https://placehold.co/80x80/e0f2fe/1d4ed8?text=GR" alt="User Profile Picture" class="w-32 h-32 rounded-full border-2 border-blue-500 object-cover cursor-pointer" id="profilePicture">
                    <span class="status-indicator online-indicator" style="background-color: #28a745; position: absolute; bottom: 5px; right: 5px; width: 20px; height: 20px; border-radius: 50%; border: 2px solid white;"></span>
                    <input type="file" id="profilePictureInput" accept="image/*" class="hidden">
                </div>

                <h3 class="text-lg font-semibold text-gray-800 mt-2">
                    <?php if (auth()->loggedIn()): ?>
                        <?= esc(auth()->user()->username ?? auth()->user()->email ?? 'Logged in User') ?>
                    <?php else: ?>
                        Guest User
                    <?php endif; ?>
                </h3>
            </div>

            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="myProfileContent">
                            <i class="fas fa-user-circle text-xl mr-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="myOrders">
                            <i class="fas fa-box-open text-xl mr-3"></i>
                            <span>My Orders</span>
                            <span class="ml-auto bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">3</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="wishlist">
                            <i class="fas fa-heart text-xl mr-3"></i>
                            <span>Wishlist</span>
                            <span class="ml-auto bg-gray-300 text-gray-800 text-xs font-bold px-2 py-1 rounded-full">12</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="paymentMethods">
                            <i class="fas fa-credit-card text-xl mr-3"></i>
                            <span>Payment Methods</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="myReviews">
                            <i class="fas fa-star text-xl mr-3"></i>
                            <span>My Reviews</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="addresses">
                            <i class="fas fa-map-marker-alt text-xl mr-3"></i>
                            <span>Address</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-link flex items-center p-3 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" data-section-id="accountSettings">
                            <i class="fas fa-cog text-xl mr-3"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div>
            <a href="<?= url_to('logout') ?>" class="sidebar-link flex items-center p-3 rounded-lg text-red-600 hover:bg-red-50 transition duration-200">
                <i class="fas fa-sign-out-alt text-xl mr-3"></i>
                <span>Log Out</span>
            </a>
        </div>
    </aside>

    <div class="flex-1 ml-8">
        <section id="myProfileContent" class="content-section">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">My Profile</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-gray-700 mb-4">welcome to your profile page, </i><?= esc($user->username ?? 'User') ?>!</p>
                <ul class="mt-4 space-y-2 text-gray-800">
                    <li><strong>Email:</strong> <?= esc($user->email ?? 'N/A') ?></li>
                    <li><strong>Member Since:</strong> <?= esc($user->created_at->format('M d, Y') ?? 'N/A') ?></li>
                </ul>
                <div class="mt-6">
                    <label for="facebookAccount" class="block text-gray-700 text-sm font-bold mb-2">Facebook Account (Required):</label>
                    <input type="text" id="facebookAccount" name="facebookAccount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., facebook.com/yourprofile" required>
                </div>
                <div class="mt-6">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200" data-section-id="accountSettings">
                        Edit Profile
                    </button>
                </div>
            </div>
        </section>

        <section id="myOrders" class="content-section hidden">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">My Orders</h1>
            <div class="flex items-center justify-between mb-8">
                <button class="ml-4 px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200 flex items-center">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
            </div>
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-lg order-card">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold text-gray-800">Order ID: #ORD-2024-1278</span>
                        <span class="text-sm text-gray-500">Feb 20, 2025</span>
                    </div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Bag" alt="Product Image" class="rounded-md">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Chair" alt="Product Image" class="rounded-md">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Glasses" alt="Product Image" class="rounded-md">
                    </div>
                    <div class="grid grid-cols-2 gap-y-2 mb-6">
                        <div>
                            <span class="text-gray-500 text-sm">Status</span><br>
                            <span class="text-orange-500 font-medium">Processing</span>
                        </div>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Items</span><br>
                            <span class="text-gray-800 font-medium">3 items</span>
                        </div>
                        <div class="col-span-2 text-right">
                            <span class="text-gray-500 text-sm">Total</span><br>
                            <span class="text-gray-800 text-xl font-bold">$789.99</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200" data-order-id="ORD-2024-1278" data-sub-section-target="trackOrder">Track Order</button>
                        <button class="flex-1 bg-blue-50 text-blue-600 border border-blue-600 py-3 rounded-lg font-semibold hover:bg-blue-100 transition duration-200" data-order-id="ORD-2024-1278" data-sub-section-target="viewDetails">View Details</button>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg order-card">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold text-gray-800">Order ID: #ORD-2024-1265</span>
                        <span class="text-sm text-gray-500">Feb 15, 2025</span>
                    </div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Hoodie" alt="Product Image" class="rounded-md">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Shoes" alt="Product Image" class="rounded-md">
                    </div>
                    <div class="grid grid-cols-2 gap-y-2 mb-6">
                        <div>
                            <span class="text-gray-500 text-sm">Status</span><br>
                            <span class="text-green-600 font-medium">Shipped</span>
                        </div>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Items</span><br>
                            <span class="text-gray-800 font-medium">2 items</span>
                        </div>
                        <div class="col-span-2 text-right">
                            <span class="text-gray-500 text-sm">Total</span><br>
                            <span class="text-gray-800 text-xl font-bold">$459.99</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200" data-order-id="ORD-2024-1265" data-sub-section-target="trackOrder">Track Order</button>
                        <button class="flex-1 bg-blue-50 text-blue-600 border border-blue-600 py-3 rounded-lg font-semibold hover:bg-blue-100 transition duration-200" data-order-id="ORD-2024-1265" data-sub-section-target="viewDetails">View Details</button>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg order-card">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-semibold text-gray-800">Order ID: #ORD-2024-1252</span>
                        <span class="text-sm text-gray-500">Feb 10, 2025</span>
                    </div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Watch" alt="Product Image" class="rounded-md">
                    </div>
                    <div class="grid grid-cols-2 gap-y-2 mb-6">
                        <div>
                            <span class="text-gray-500 text-sm">Status</span><br>
                            <span class="text-green-600 font-medium">Delivered</span>
                        </div>
                        <div class="text-right">
                            <span class="text-gray-500 text-sm">Items</span><br>
                            <span class="text-gray-800 font-medium">1 item</span>
                        </div>
                        <div class="col-span-2 text-right">
                            <span class="text-gray-500 text-sm">Total</span><br>
                            <span class="text-gray-800 text-xl font-bold">$129.99</span>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button class="flex-1 bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200" data-order-id="ORD-2024-1252" data-sub-section-target="trackOrder">Track Order</button>
                        <button class="flex-1 bg-blue-50 text-blue-600 border border-blue-600 py-3 rounded-lg font-semibold hover:bg-blue-100 transition duration-200" data-order-id="ORD-2024-1252" data-sub-section-target="viewDetails">View Details</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="trackOrderSection" class="content-section hidden">
            <button class="text-blue-600 hover:underline mb-4 flex items-center back-to-orders" data-section-id="myOrders">
                <i class="fas fa-arrow-left mr-2"></i> Back to My Orders
            </button>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-800" id="trackOrderId">Order ID: #</span>
                    <span class="text-sm text-gray-500" id="trackOrderDate"></span>
                </div>
                <div class="flex items-center space-x-3 mb-4" id="trackOrderImages">
                </div>
                <div class="grid grid-cols-2 gap-y-2 mb-6">
                    <div>
                        <span class="text-gray-500 text-sm">Status</span><br>
                        <span class="text-orange-500 font-medium" id="trackOrderStatus"></span>
                    </div>
                    <div class="text-right">
                        <span class="text-gray-500 text-sm">Items</span><br>
                        <span class="text-gray-800 font-medium">3 items</span>
                    </div>
                    <div class="col-span-2 text-right">
                        <span class="text-gray-500 text-sm">Total</span><br>
                        <span class="text-gray-800 text-xl font-bold">$789.99</span>
                    </div>
                </div>

                <div class="mt-8 space-y-6" id="trackOrderTimeline">
                    <div class="flex items-start">
                        <div class="flex flex-col items-center mr-4">
                            <div class="w-4 h-4 rounded-full bg-blue-600 border-2 border-blue-300"></div>
                            <div class="w-px flex-1 bg-gray-300"></div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Order Placed</p>
                            <p class="text-sm text-gray-500">Feb 10, 2025 - 10:00 AM</p>
                            <p class="text-gray-700">Your order has been successfully placed.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex flex-col items-center mr-4">
                            <div class="w-4 h-4 rounded-full bg-gray-400"></div>
                            <div class="w-px flex-1 bg-gray-300"></div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Processing</p>
                            <p class="text-sm text-gray-500">Feb 11, 2025 - 02:30 PM</p>
                            <p class="text-gray-700">Your order is being prepared for shipment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="viewDetailsSection" class="content-section hidden">
            <button class="text-blue-600 hover:underline mb-4 flex items-center back-to-orders" data-section-id="myOrders">
                <i class="fas fa-arrow-left mr-2"></i> Back to My Orders
            </button>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Payment Method</h3>
                        <p class="text-gray-800" id="viewDetailsPaymentMethod">Credit Card (Visa ending in ** 1234)</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Shipping Method</h3>
                        <p class="text-gray-800" id="viewDetailsShippingMethod">Standard Shipping (3-5 business days)</p>
                    </div>
                </div>

                <h3 class="font-semibold text-gray-700 mb-4">Items (<span id="viewDetailsItemCount">3</span>)</h3>
                <div class="space-y-4 mb-8" id="viewDetailsItems">
                    <div class="flex items-center">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Bag" alt="Product Image" class="rounded-md mr-4">
                        <div>
                            <p class="font-semibold text-gray-800">Stylish Leather Bag</p>
                            <p class="text-gray-600 text-sm">Quantity: 1 | Price: $250.00</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Chair" alt="Product Image" class="rounded-md mr-4">
                        <div>
                            <p class="font-semibold text-gray-800">Ergonomic Office Chair</p>
                            <p class="text-gray-600 text-sm">Quantity: 1 | Price: $400.00</p>
                        </div>
                    </div>
                </div>

                <h3 class="font-semibold text-gray-700 mb-4">Price Details</h3>
                <div class="space-y-2 mb-8">
                    <div class="flex justify-between text-gray-700">
                        <span>Subtotal</span>
                        <span id="viewDetailsSubtotal">$650.00</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Shipping</span>
                        <span id="viewDetailsShipping">$20.00</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Tax</span>
                        <span id="viewDetailsTax">$19.99</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg text-blue-600 border-t border-gray-300 pt-2">
                        <span>Total</span>
                        <span id="viewDetailsTotal">$689.99</span>
                    </div>
                </div>

                <h3 class="font-semibold text-gray-700 mb-4">Shipping Address</h3>
                <address class="text-gray-800 not-italic" id="viewDetailsShippingAddress">
                    123 Main Street<br>
                    Apt 4B<br>
                    Springfield, IL 62701<br>
                    United States
                </address>
            </div>
        </section>

        <section id="wishlist" class="content-section hidden">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">My Wishlist</h2>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                    Add All to Cart
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="wishlist-item relative bg-white p-4 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/300x300/f8f8f8/000?text=Brown+Bag" alt="Brown Bag" class="rounded-md">
                    <div class="text-left w-full mt-auto">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Lorem ipsum dolor sit amet</h3>
                        <div class="flex items-center mb-2 star-rating">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="far fa-star text-yellow-400"></i>
                            <span class="ml-1 text-sm text-gray-600">(4.5)</span>
                        </div>
                        <p class="text-gray-800 text-lg font-bold mb-3">$79.99 <span class="old-price text-sm text-gray-500 line-through ml-2">$99.99</span></p>
                        <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <div class="wishlist-item relative bg-white p-4 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/300x300/f8f8f8/000?text=Wooden+Chair" alt="Wooden Chair" class="rounded-md">
                    <div class="text-left w-full mt-auto">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Consectetur adipiscing elit</h3>
                        <div class="flex items-center mb-2 star-rating">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="far fa-star text-yellow-400"></i>
                            <span class="ml-1 text-sm text-gray-600">(4.0)</span>
                        </div>
                        <p class="text-gray-800 text-lg font-bold mb-3">$149.99</p>
                        <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <div class="wishlist-item relative bg-white p-4 rounded-lg shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/300x300/f8f8f8/000?text=Sunglasses" alt="Sunglasses" class="rounded-md opacity-70">
                    <div class="text-left w-full mt-auto">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Sed do eiusmod tempor</h3>
                        <div class="flex items-center mb-2 star-rating">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="ml-1 text-sm text-gray-600">(5.0)</span>
                        </div>
                        <p class="text-gray-800 text-lg font-bold mb-3">$199.99</p>
                        <button class="w-full px-4 py-2 bg-gray-300 text-gray-700 rounded-lg font-semibold cursor-not-allowed" disabled>
                            Notify When Available
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="paymentMethods" class="content-section hidden">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Payment Methods</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div id="codMethod" class="bg-white p-6 rounded-lg border-2 border-blue-500 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-money-bill-wave text-blue-600 text-2xl mr-3"></i>
                            <h3 class="text-xl font-semibold text-gray-800">Cash on Delivery</h3>
                        </div>
                        <span class="bg-white-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full"></span>
                    </div>
                    <p class="text-gray-600 mb-4">Pay with cash when your order is delivered to your doorstep.</p>
                    <div class="flex space-x-2">
                        <button id="codButton" class="flex-1 px-4 py-2 bg-blue-50 text-blue-600 border border-blue-600 rounded-lg font-semibold hover:bg-blue-100 transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i> Selected
                        </button>
                    </div>
                </div>

                <div id="pickupMethod" class="bg-white p-6 rounded-lg border-2 border-gray-200 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-store text-gray-600 text-2xl mr-3"></i> <h3 class="text-xl font-semibold text-gray-800">Self Pick-up</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Pay with cash when you claim your order in our shop.</p>
                    <div class="flex space-x-2">
                        <button id="pickupButton" class="flex-1 px-4 py-2 bg-gray-50 text-gray-600 border border-gray-600 rounded-lg font-semibold hover:bg-gray-100 transition duration-200">
                            Select Method
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Get references to the method containers and buttons
            const codMethod = document.getElementById('codMethod');
            const pickupMethod = document.getElementById('pickupMethod');
            const codButton = document.getElementById('codButton');
            const pickupButton = document.getElementById('pickupButton');
            const codDefaultTag = document.getElementById('codDefaultTag');

            // Function to set a method as selected
            function selectMethod(selectedMethod) {
                // Reset all methods to unselected state
                codMethod.classList.remove('border-blue-500');
                codMethod.classList.add('border-gray-200');
                codButton.classList.remove('bg-blue-50', 'text-blue-600', 'border-blue-600');
                codButton.classList.add('bg-gray-50', 'text-gray-600', 'border-gray-600');
                codButton.innerHTML = 'Select Method';
                if (codDefaultTag) codDefaultTag.style.display = 'none'; // Hide default tag

                pickupMethod.classList.remove('border-blue-500');
                pickupMethod.classList.add('border-gray-200');
                pickupButton.classList.remove('bg-blue-50', 'text-blue-600', 'border-blue-600');
                pickupButton.classList.add('bg-gray-50', 'text-gray-600', 'border-gray-600');
                pickupButton.innerHTML = 'Select Method';

                // Apply selected state to the chosen method
                if (selectedMethod === 'cod') {
                    codMethod.classList.remove('border-gray-200');
                    codMethod.classList.add('border-blue-500');
                    codButton.classList.remove('bg-gray-50', 'text-gray-600', 'border-gray-600');
                    codButton.classList.add('bg-blue-50', 'text-blue-600', 'border-blue-600');
                    codButton.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Selected';
                    if (codDefaultTag) codDefaultTag.style.display = 'inline-block'; // Show default tag
                } else if (selectedMethod === 'pickup') {
                    pickupMethod.classList.remove('border-gray-200');
                    pickupMethod.classList.add('border-blue-500');
                    pickupButton.classList.remove('bg-gray-50', 'text-gray-600', 'border-gray-600');
                    pickupButton.classList.add('bg-blue-50', 'text-blue-600', 'border-blue-600');
                    pickupButton.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Selected';
                }
            }

            // Add event listeners to the buttons
            codButton.addEventListener('click', () => selectMethod('cod'));
            pickupButton.addEventListener('click', () => selectMethod('pickup'));

            // Set Cash on Delivery as default selected on load
            document.addEventListener('DOMContentLoaded', () => {
                selectMethod('cod');
            });
        </script>

        <section id="myReviews" class="content-section hidden">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">My Reviews</h2>
                <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200 flex items-center">
                    <i class="fas fa-sort mr-2"></i> Sort by: Recent
                </button>
            </div>
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-lg review-card">
                    <div class="flex items-start mb-4">
                        <img src="https://placehold.co/80x80/fecaca/dc2626?text=Bag" alt="Product Image" class="w-20 h-20 rounded-md mr-4 flex-shrink-0">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-1">Lorem ipsum dolor sit amet</h3>
                            <div class="flex items-center mb-2 star-rating">
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="ml-2 text-sm text-gray-600">(5.0)</span>
                            </div>
                            <p class="text-sm text-gray-500">Reviewed on Feb 15, 2025</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 bg-blue-50 text-blue-600 border border-blue-600 rounded-lg font-semibold hover:bg-blue-100 transition duration-200 edit-review-btn">
                            Edit Review
                        </button>
                        <button class="px-4 py-2 bg-red-50 text-red-600 border border-red-600 rounded-lg font-semibold hover:bg-red-100 transition duration-200 delete-review-btn">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="addresses" class="content-section hidden">
            <div id="addressMessageBox" class="hidden bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span id="addressMessageText"></span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="document.getElementById('addressMessageBox').classList.add('hidden');">
                    <svg class="fill-current h-6 w-6 text-blue-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15L6.25 6.25a1.2 1.2 0 0 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.15 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-6">My Addresses</h1>
            <div id="addressContainer" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            </div>
            <div id="addressModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-xs mx-4"> <h2 id="modalTitle" class="text-2xl font-bold text-gray-800 mb-6">Add New Address</h2>
                    <form id="addressForm">
                        <input type="hidden" id="addressIndex">
                        <div class="mb-4">
                            <label for="street" class="block text-gray-700 text-sm font-bold mb-2">Street Address</label>
                            <input type="text" id="street" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., 123 Main St" required>
                        </div>
                        <div class="mb-4">
                            <label for="apt" class="block text-gray-700 text-sm font-bold mb-2">Apartment/Suite (Optional)</label>
                            <input type="text" id="apt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., Apt 4B">
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
                            <input type="text" id="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., Springfield" required>
                        </div>
                        <div class="mb-4">
                            <label for="state" class="block text-gray-700 text-sm font-bold mb-2">State/Province</label>
                            <input type="text" id="state" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., IL" required>
                        </div>
                        <div class="mb-6">
                            <label for="zip" class="block text-gray-700 text-sm font-bold mb-2">Zip/Postal Code</label>
                            <input type="text" id="zip" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., 62701" required>
                        </div>
                        <div class="mb-6">
                            <label for="country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
                            <input type="text" id="country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., United States" required>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" id="cancelAddressBtn" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg font-semibold hover:bg-gray-300 transition duration-200">Cancel</button>
                            <button type="submit" id="saveAddressBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Save Address</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-6">
                <button id="addAddressBtn" class="px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition duration-200">
                    Add New Address
                </button>
            </div>
        </section>

        <section id="accountSettings" class="content-section hidden">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Account Settings</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <form id="profileSettingsForm">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                        <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= esc($user->username ?? '') ?>">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= esc($user->email ?? '') ?>" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="oldPassword" class="block text-gray-700 text-sm font-bold mb-2">Old Password:</label>
                        <input type="password" id="oldPassword" name="oldPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label for="newPassword" class="block text-gray-700 text-sm font-bold mb-2">New Password:</label>
                        <input type="password" id="newPassword" name="newPassword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</main>

<footer class="bg-white shadow-inner py-6 mt-8">
    <div class="container mx-auto px-8 text-center text-gray-600">
        &copy; 2023 Meraki Shop. All rights reserved.
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        const contentSections = document.querySelectorAll('.content-section');
        const profilePicture = document.getElementById('profilePicture');
        const profilePictureInput = document.getElementById('profilePictureInput');

        // Function to show a section and hide others, and update sidebar active state
        function showSection(sectionId) {
            contentSections.forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');

            sidebarLinks.forEach(link => {
                link.classList.remove('active-nav-link');
                link.classList.add('text-gray-700', 'hover:bg-blue-50', 'transition', 'duration-200');
            });

            const activeLink = document.querySelector(.sidebar-link[data-section-id="${sectionId}"]);
            if (activeLink) {
                activeLink.classList.add('active-nav-link');
                activeLink.classList.remove('text-gray-700', 'hover:bg-blue-50'); // Remove hover for active
            }
        }

        // Handle sidebar link clicks
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const sectionId = this.dataset.sectionId;
                showSection(sectionId);
            });
        });

        // Handle "Edit Profile" button click in My Profile section
        const editProfileBtn = document.querySelector('#myProfileContent button[data-section-id="accountSettings"]');
        if (editProfileBtn) {
            editProfileBtn.addEventListener('click', function() {
                showSection('accountSettings');
            });
        }

        // Handle "Back to My Orders" buttons
        document.querySelectorAll('.back-to-orders').forEach(button => {
            button.addEventListener('click', function() {
                showSection('myOrders');
            });
        });


        // Handle image upload click
        profilePicture.addEventListener('click', function() {
            profilePictureInput.click();
        });

        profilePictureInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePicture.src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Initial load: show My Profile section by default
        showSection('myProfileContent');

        // Placeholder for future functionality: Order Tracking and Details
        document.querySelectorAll('.order-card button').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.dataset.orderId;
                const targetSection = this.dataset.subSectionTarget; // 'trackOrder' or 'viewDetails'

                if (targetSection === 'trackOrder') {
                    // Populate track order section with data for orderId
                    document.getElementById('trackOrderId').textContent = Order ID: #${orderId};
                    document.getElementById('trackOrderDate').textContent = 'Feb 20, 2025'; // Replace with actual order date
                    document.getElementById('trackOrderStatus').textContent = 'Processing'; // Replace with actual status
                    // Example: dynamically add images and timeline based on orderId
                    document.getElementById('trackOrderImages').innerHTML = `
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Item1" alt="Product Image" class="rounded-md">
                        <img src="https://placehold.co/60x60/fecaca/dc2626?text=Item2" alt="Product Image" class="rounded-md">
                    `;
                    document.getElementById('trackOrderTimeline').innerHTML = `
                        <div class="flex items-start">
                            <div class="flex flex-col items-center mr-4">
                                <div class="w-4 h-4 rounded-full bg-blue-600 border-2 border-blue-300"></div>
                                <div class="w-px flex-1 bg-gray-300"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Order Placed</p>
                                <p class="text-sm text-gray-500">Feb 20, 2025 - 10:00 AM</p>
                                <p class="text-gray-700">Your order has been successfully placed.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex flex-col items-center mr-4">
                                <div class="w-4 h-4 rounded-full bg-orange-500 border-2 border-orange-300"></div>
                                <div class="w-px flex-1 bg-gray-300"></div>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Processing</p>
                                <p class="text-sm text-gray-500">Feb 20, 2025 - 02:30 PM</p>
                                <p class="text-gray-700">Your order is being prepared for shipment.</p>
                            </div>
                        </div>
                        `;
                    showSection('trackOrderSection');
                } else if (targetSection === 'viewDetails') {
                    // Populate view details section with data for orderId
                    document.getElementById('viewDetailsPaymentMethod').textContent = 'Credit Card (Visa ending in ** 1234)';
                    document.getElementById('viewDetailsShippingMethod').textContent = 'Express Shipping (1-2 business days)';
                    document.getElementById('viewDetailsItemCount').textContent = '2';
                    document.getElementById('viewDetailsItems').innerHTML = `
                        <div class="flex items-center">
                            <img src="https://placehold.co/60x60/fecaca/dc2626?text=ItemA" alt="Product Image" class="rounded-md mr-4">
                            <div>
                                <p class="font-semibold text-gray-800">Fancy Gadget</p>
                                <p class="text-gray-600 text-sm">Quantity: 1 | Price: $300.00</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="https://placehold.co/60x60/fecaca/dc2626?text=ItemB" alt="Product Image" class="rounded-md mr-4">
                            <div>
                                <p class="font-semibold text-gray-800">Cool Accessory</p>
                                <p class="text-gray-600 text-sm">Quantity: 1 | Price: $50.00</p>
                            </div>
                        </div>
                    `;
                    document.getElementById('viewDetailsSubtotal').textContent = '$350.00';
                    document.getElementById('viewDetailsShipping').textContent = '$15.00';
                    document.getElementById('viewDetailsTax').textContent = '$10.50';
                    document.getElementById('viewDetailsTotal').textContent = '$375.50';
                    document.getElementById('viewDetailsShippingAddress').innerHTML = `
                        789 Commerce St<br>
                        Suite 200<br>
                        Business City, CA 90210<br>
                        United States
                    `;
                    showSection('viewDetailsSection');
                }
            });
        });

        // Wishlist functionality (placeholder alerts)
        document.querySelectorAll('#wishlist .wishlist-item button').forEach(button => {
            button.addEventListener('click', function() {
                if (this.disabled) {
                    alert('This item is out of stock. You will be notified when it\'s available!');
                } else {
                    alert('Item added to cart!');
                }
            });
        });

        document.querySelector('#wishlist .bg-blue-600').addEventListener('click', function() {
            alert('All items in wishlist added to cart!');
        });

        // Reviews functionality (placeholder alerts)
        document.querySelectorAll('.edit-review-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Edit review functionality to be implemented!');
            });
        });

        document.querySelectorAll('.delete-review-btn').forEach(button => {
            button.addEventListener('click', function() {
                alert('Delete review functionality to be implemented!');
            });
        });


        // Address management
        const addressContainer = document.getElementById('addressContainer');
        const addressModal = document.getElementById('addressModal');
        const modalTitle = document.getElementById('modalTitle');
        const addressForm = document.getElementById('addressForm');
        const addressIndexInput = document.getElementById('addressIndex');
        const streetInput = document.getElementById('street');
        const aptInput = document.getElementById('apt');
        const cityInput = document.getElementById('city');
        const stateInput = document.getElementById('state');
        const zipInput = document.getElementById('zip');
        const countryInput = document.getElementById('country');
        const cancelAddressBtn = document.getElementById('cancelAddressBtn');
        const addAddressBtn = document.getElementById('addAddressBtn');
        const addressMessageBox = document.getElementById('addressMessageBox');
        const addressMessageText = document.getElementById('addressMessageText');

        let addresses = JSON.parse(localStorage.getItem('userAddresses')) || [
            { street: '123 Main Street', apt: 'Apt 4B', city: 'Springfield', state: 'IL', zip: '62701', country: 'United States', default: true },
            { street: '456 Business Ave', apt: 'Suite 100', city: 'Metropolis', state: 'NY', zip: '10001', country: 'United States', default: false }
        ];

        function saveAddresses() {
            localStorage.setItem('userAddresses', JSON.stringify(addresses));
            renderAddresses();
        }

        function showMessage(message, type = 'info') {
            addressMessageText.textContent = message;
            addressMessageBox.classList.remove('hidden', 'bg-red-100', 'border-red-400', 'text-red-700', 'bg-green-100', 'border-green-400', 'text-green-700', 'bg-blue-100', 'border-blue-400', 'text-blue-700');
            if (type === 'success') {
                addressMessageBox.classList.add('bg-green-100', 'border-green-400', 'text-green-700');
            } else if (type === 'error') {
                addressMessageBox.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
            } else {
                addressMessageBox.classList.add('bg-blue-100', 'border-blue-400', 'text-blue-700');
            }
            addressMessageBox.classList.remove('hidden');
        }

        function renderAddresses() {
            addressContainer.innerHTML = '';
            if (addresses.length === 0) {
                addressContainer.innerHTML = '<p class="text-gray-600">No addresses saved. Click "Add New Address" to add one.</p>';
                return;
            }

            addresses.forEach((address, index) => {
                const addressCard = document.createElement('div');
                addressCard.className = bg-white p-6 rounded-lg shadow-md border-2 ${address.default ? 'border-blue-500' : 'border-gray-200'};
                addressCard.innerHTML = `
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">${address.default ? 'Default Address' : `Address ${index + 1}`}</h3>
                        ${address.default ? '<span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Default</span>' : ''}
                    </div>
                    <address class="text-gray-700 not-italic mb-4">
                        ${address.street}<br>
                        ${address.apt ? address.apt + '<br>' : ''}
                        ${address.city}, ${address.state} ${address.zip}<br>
                        ${address.country}
                    </address>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-blue-50 text-blue-600 border border-blue-600 rounded-lg font-semibold text-sm hover:bg-blue-100 transition duration-200 edit-address-btn" data-index="${index}">
                            Edit
                        </button>
                        ${!address.default ? `
                        <button class="px-3 py-1 bg-gray-50 text-gray-600 border border-gray-600 rounded-lg font-semibold text-sm hover:bg-gray-100 transition duration-200 set-default-btn" data-index="${index}">
                            Set Default
                        </button>
                        <button class="px-3 py-1 bg-red-50 text-red-600 border border-red-600 rounded-lg font-semibold text-sm hover:bg-red-100 transition duration-200 remove-address-btn" data-index="${index}">
                            Remove
                        </button>
                        ` : ''}
                    </div>
                `;
                addressContainer.appendChild(addressCard);
            });

            document.querySelectorAll('.edit-address-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = parseInt(e.target.dataset.index);
                    editAddress(index);
                });
            });

            document.querySelectorAll('.set-default-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = parseInt(e.target.dataset.index);
                    setDefaultAddress(index);
                });
            });

            document.querySelectorAll('.remove-address-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = parseInt(e.target.dataset.index);
                    removeAddress(index);
                });
            });
        }

        function openAddressModal() {
            addressForm.reset();
            addressIndexInput.value = '';
            modalTitle.textContent = 'Add New Address';
            addressModal.classList.remove('hidden');
        }

        function closeAddressModal() {
            addressModal.classList.add('hidden');
            addressMessageBox.classList.add('hidden'); // Hide message box when closing modal
        }

        function editAddress(index) {
            const address = addresses[index];
            modalTitle.textContent = 'Edit Address';
            addressIndexInput.value = index;
            streetInput.value = address.street;
            aptInput.value = address.apt;
            cityInput.value = address.city;
            stateInput.value = address.state;
            zipInput.value = address.zip;
            countryInput.value = address.country;
            addressModal.classList.remove('hidden');
        }

        function setDefaultAddress(index) {
            addresses.forEach((address, i) => {
                address.default = (i === index);
            });
            saveAddresses();
            showMessage('Default address updated successfully!', 'success');
        }

        function removeAddress(index) {
            if (addresses[index].default) {
                showMessage('Cannot remove default address. Please set another address as default first.', 'error');
                return;
            }
            if (confirm('Are you sure you want to remove this address?')) {
                addresses.splice(index, 1);
                saveAddresses();
                showMessage('Address removed successfully!', 'success');
            }
        }

        addAddressBtn.addEventListener('click', openAddressModal);
        cancelAddressBtn.addEventListener('click', closeAddressModal);

        addressForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const newAddress = {
                street: streetInput.value.trim(),
                apt: aptInput.value.trim(),
                city: cityInput.value.trim(),
                state: stateInput.value.trim(),
                zip: zipInput.value.trim(),
                country: countryInput.value.trim(),
                default: false
            };

            const index = addressIndexInput.value;
            if (index !== '') {
                // Editing existing address
                addresses[parseInt(index)] = { ...addresses[parseInt(index)], ...newAddress };
                showMessage('Address updated successfully!', 'success');
            } else {
                // Adding new address
                addresses.push(newAddress);
                showMessage('Address added successfully!', 'success');
            }
            saveAddresses();
            closeAddressModal();
        });

        renderAddresses(); // Initial render of addresses on page load

        // Account settings form submission (placeholder)
        document.getElementById('profileSettingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Account settings saved! (Functionality to be implemented)');
            // Here you would typically send an AJAX request to update user data
        });
    });
</script>

</body>
</html>