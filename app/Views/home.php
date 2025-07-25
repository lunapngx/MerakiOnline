<header>
    <a href="/">Meraki Online Shopping</a>

    <nav>
        <a href="/">Home</a>
        <a href="/cart">Cart</a>

        <?php if (auth()->loggedIn()) : ?>
            <span>Hello, <?= esc(user()->email) ?></span>
            <a href="/logout">Logout</a>
        <?php else : ?>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        <?php endif; ?>
    </nav>
</header>