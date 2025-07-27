<footer id="footer" class="footer">

    <div class="footer-newsletter" style="padding: 30px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <img src="<?= base_url('assets/img/meraki-footer.png') ?>" alt="Meraki Gift Shop Logo" class="img-fluid" style="max-height: 150px;">
                </div>
            </div>
        </div>
    </div>

    <div class="footer-main">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="footer-widget d-flex justify-content-center align-items-start flex-wrap">
                        <div class="footer-links-group" style="margin-right: 40px;">
                            <h4>MerakiShop</h4>
                            <ul class="footer-links" style="list-style: none; padding: 0;">
                                <li><a href="<?= base_url('account/orders') ?>" style="text-decoration: none; color: inherit;">Order Status</a></li>
                                <!-- Updated Privacy Policy link to point to useragreements#privacy-policy -->
                                <li><a href="<?= base_url('useragreements') ?>#privacy-policy" style="text-decoration: none; color: inherit;">Privacy Policy</a></li>
                                <!-- Updated Terms & Condition link to point to useragreements#terms-conditions -->
                                <li><a href="<?= base_url('useragreements') ?>#terms-conditions" style="text-decoration: none; color: inherit;">Terms & Condition</a></li>
                                <!-- Updated Contact Us link to point to useragreements#contact-us -->
                                <li><a href="<?= base_url('useragreements') ?>#contact-us" style="text-decoration: none; color: inherit;">Contact Us</a></li>
                            </ul>
                        </div>

                        <div class="social-links mt-4 text-start">
                            <h5 style="font-weight: bold; color: #000;">FOLLOW US:</h5>
                            <div class="social-items-list d-flex flex-column gap-2">
                                <a href="https://www.instagram.com/meraki_artsandcrafts" aria-label="Instagram" target="_blank" rel="noopener noreferrer" class="social-item-link d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                    <img src="<?= base_url('assets/img/meraki-instagram.png') ?>" alt="Instagram Icon" class="social-icon-img" style="width: 28px; height: 28px; vertical-align: middle; margin-right: 8px; border: 1px solid #000; border-radius: 50%; padding: 2px;">
                                    <span class="social-username">meraki_artsandcrafts</span>
                                </a>
                                <a href="https://www.facebook.com/merakishop" aria-label="Facebook" target="_blank" rel="noopener noreferrer" class="social-item-link d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                    <img src="<?= base_url('assets/img/meraki-facebook.png') ?>" alt="Facebook Icon" class="social-icon-img" style="width: 28px; height: 28px; vertical-align: middle; margin-right: 8px; border: 1px solid #000; border-radius: 50%; padding: 2px;">
                                    <span class="social-username">merakishop</span>
                                </a>
                                <a href="https://www.tiktok.com/@merakigiftshop" aria-label="TikTok" target="_blank" rel="noopener noreferrer" class="social-item-link d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                    <img src="<?= base_url('assets/img/meraki-tiktok.png') ?>" alt="TikTok Icon" class="social-icon-img" style="width: 28px; height: 28px; vertical-align: middle; margin-right: 8px; border: 1px solid #000; border-radius: 50%; padding: 2px;">
                                    <span class="social-username">merakigiftshop</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="legal-links text-center mt-2">
                <!-- Updated Terms and Conditions link to point to useragreements#terms-conditions -->
                <a href="<?= base_url('useragreements') ?>#terms-conditions">Terms and Conditions</a>
                <!-- Updated Privacy Policy link to point to useragreements#privacy-policy -->
                <a href="<?= base_url('useragreements') ?>#privacy-policy">Privacy Policy</a>
            </div>

            <div class="copyright text-center mt-2">
                <p>© <?= date('Y') ?> <strong class="sitename">Your Flower Shop</strong>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<div id="preloader"></div>

<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/drift-zoom/Drift.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<?= $this->renderSection('scripts') ?>
</body>
</html>
