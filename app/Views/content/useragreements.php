<?= $this->extend('layouts/master') ?> <!-- Adjusted path: Assuming your master layout is at app/Views/Customer/layout.php -->

<?= $this->section('title') ?>
Legal Information - Meraki Giftshop
<?= $this->endSection() ?>

<?= $this->section('styles') ?>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Main Content Container - This div now primarily controls width and centering,
     with individual sections providing their own backgrounds and shadows. -->
<div class="container mx-auto p-6 lg:p-10 mt-8 mb-12">

    <!-- Contact Us Section -->
    <section id="contact-us" class="mb-12 p-6 bg-[#FFF2E0] rounded-lg shadow-md text-center transition-shadow duration-300 hover:shadow-lg">
        <h2 class="text-3xl font-semibold text-pink-700 mb-6 section-title">Contact Us</h2>
        <p class="text-lg mb-8">
            We'd love to hear from you! If you have any questions, feedback, or need assistance, please don't hesitate to reach out.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Address Card -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="icon-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Address</h3>
                <p class="text-gray-600">Taguig City, Metro Manila, Philippines</p>
            </div>

            <!-- Call Us Card -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="icon-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.106l-1.742-.58a4.5 4.5 0 00-.658-.113l-2.095.523a1.875 1.875 0 01-1.892.201l-1.786-.893m-3.642 0a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25-.75h3.75a.75.75 0 000-1.5H7.5a.75.75 0 000 1.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Call Us</h3>
                <p class="text-gray-600">+639388702279</p>
            </div>

            <!-- Email Us Card -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                <div class="icon-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75m19.5 0v.243a2.25 2.25 0 01-1.07 1.902l-5.49 2.745a1.5 1.5 0 01-1.67 0l-5.49-2.745a2.25 2.25 0 01-1.07-1.902V6.75" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Email Us</h3>
                <p class="text-gray-600"><a href="mailto:info@merakigiftshop.com" class="text-blue-600 hover:underline">merakiartsandcraftsshop@gmail.com</a></p>
            </div>
        </div>

        <p class="mt-8 text-md text-gray-600">
            <i><b>You can also message us directly through our social media channels for a quicker response.</b></i>
        </p>
    </section>

    <!-- Privacy Policy Section -->
    <section id="privacy-policy" class="mt-8 mb-12 p-6 bg-[#FFF2E0] rounded-lg shadow-md transition-shadow duration-300 hover:shadow-lg">
        <h2 class="text-3xl font-semibold text-pink-700 mb-6 section-title text-center">Privacy Policy</h2>
        <p class="mb-2"><b>Your privacy is important to us. This policy explains how we handle your personal information.</b></p>

        <h3 class="text-xl font-medium text-gray-700 mb-2">1. Information We Collect</h3>
        <p class="mb-1">We collect basic information you provide such as:</p>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li>Name, contact number, and address (for delivery purposes)</li>
            <li>Payment details for processing orders</li>
            <li>Communication through social media or messaging apps</li>
        </ul>

        <h3 class="text-xl font-medium text-gray-700 mb-2">2. How We Use Your Information</h3>
        <p class="mb-1">We use your information to:</p>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li>Process and deliver your order</li>
            <li>Contact you regarding your order or promotions (if opted in)</li>
            <li>Improve our services and customer experience</li>
        </ul>

        <h3 class="text-xl font-medium text-gray-700 mb-2">3. Data Sharing</h3>
        <p class="mb-1">We do not sell or share your personal information with third parties, except for:</p>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li>Delivery services (like Lalamove, Shopee, Lazada) strictly for order fulfillment.</li>
        </ul>

        <h3 class="text-xl font-medium text-gray-700 mb-2">4. Data Protection</h3>
        <p class="mb-2">We take appropriate steps to keep your data safe. Only authorized personnel can access your details, and we store them securely.</p>

        <h3 class="text-xl font-medium text-gray-700 mb-2">5. Your Rights</h3>
        <p class="mb-1">You have the right to:</p>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li>Request access to your personal information</li>
            <li>Ask for correction or deletion of your data (when applicable)</li>
        </ul>
        <p class="mb-2"><i><b>For any privacy concerns, feel free to message us directly.</b></i></p>
    </section>

    <!-- Terms and Conditions Section -->
    <section id="terms-conditions" class="mt-8 p-6 bg-[#FFF2E0] rounded-lg shadow-md transition-shadow duration-300 hover:shadow-lg">
        <h2 class="text-3xl font-semibold text-pink-700 mb-6 section-title text-center">Terms and Conditions</h2>
        <p class="mb-2"><b>Welcome to Meraki Giftshop! By placing an order with us, you agree to the following terms and conditions:</p></b>

        <h3 class="text-xl font-medium text-gray-700 mb-2">1. Order & Payment Policy</h3>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li><strong>Payment First Policy:</strong> Orders will only be processed once full payment is made, especially for delivery via Lalamove.</li>
            <li><strong>Cash on Delivery (COD):</strong> COD is available only through our Shopee or Lazada stores.</li>
            <li><strong>Meet-Ups:</strong> For meet-ups within agreed areas, a down payment is required. The remaining balance must be paid during the meet-up.</li>
        </ul>

        <h3 class="text-xl font-medium text-gray-700 mb-2">2. Shipping Policy</h3>
        <p class="mb-2">Once we ship out your order through Shopee, Lazada, or any courier, and provide a picture of the final product, we are no longer responsible for any delays or mishandling by the courier.</p>

        <h3 class="text-xl font-medium text-gray-700 mb-2">3. Damaged Items & Refund Policy</h3>
        <ul class="list-disc list-inside ml-4 mb-2 space-y-0.5">
            <li>Minor damage to boxes may happen during shipping and is considered normal.</li>
            <li>Refunds of up to 30% of the purchase amount will only be considered if the product is severely damaged — e.g., ruined flowers, crushed boxes, or unpleasant inclusions.</li>
        </ul>
        <p class="mb-2"><b><i>Please contact us first to any social media platform if you encounter any issues. Kindly allow us the chance to resolve the matter before leaving feedback or reviews on any social media or online platform.</p></b></i>
    </section>

</div>
<?= $this->endSection() ?>
