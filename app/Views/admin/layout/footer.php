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
