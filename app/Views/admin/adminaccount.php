<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="container py-4">
    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-md-4">
            <div class="profile-card text-center p-4 shadow-sm rounded">
                <img src="/path/to/profile.jpg" alt="Profile" class="profile-image mb-3">
                <h5 class="mb-1">Verna Riza Rodriguez</h5>
                <p class="text-muted small">Meraki Giftshop Owner</p>
            </div>
        </div>

        <!-- About & Details -->
        <div class="col-md-8">
            <div class="about-card p-4 shadow-sm rounded mb-4">
                <h6><strong>About</strong></h6>
                <p class="mb-0 text-sm">
                    I, Verna Riza Rodriguez the CEO of Meraki Giftshop started this business at the age of 15 during pandemic, as a self-taught artist.
                    I really love to learn and explore new things and hobbies and turn it into something that can give me happiness and motivation to keep going using my passion in arts and crafts putting my soul, creativity and love in every masterpiece.
                    So when you buy in our shop, you're not just buying an item—you're also having a piece of me and my dreams as well.
                </p>
            </div>

            <div class="about-card p-4 shadow-sm rounded">
                <h6><strong>Profile Details</strong></h6>
                <div class="row mb-2">
                    <div class="col-4"><strong>Full Name</strong></div>
                    <div class="col-8">Verna Riza Rodriguez</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Position</strong></div>
                    <div class="col-8">Owner</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Country</strong></div>
                    <div class="col-8">Philippines</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Address</strong></div>
                    <div class="col-8">08 Dapdap St. Igi Central Village Brgy. Pinagsama Taguig City</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4"><strong>Phone</strong></div>
                    <div class="col-8">+639387802279</div>
                </div>
                <div class="row">
                    <div class="col-4"><strong>Email</strong></div>
                    <div class="col-8">vernarodriguez1220@gmail.com</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
