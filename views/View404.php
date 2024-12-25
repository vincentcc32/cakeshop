<main class="main__home" style="padding-bottom: 100px;">
    <h1 class="text-uppercase color-primary font-cursive text-center pt-5" style="font-size: 80px;">404_PAGE</h1>
    <?php if (!isset($_SESSION['user']) || $_SESSION['user']['Quyen'] == 0) : ?>
        <a class="text-uppercase color-primary font-cursive text-center d-block" style="font-size: 40px;" href="index.php?ctrl=page&view=home">Go
            home</a>
    <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['Quyen'] == 1) : ?>
        <a class="text-uppercase color-primary font-cursive text-center d-block" style="font-size: 40px;" href="admin.php?ctrl=page&view=dashboard">Go
            home</a>
    <?php endif; ?>
</main>