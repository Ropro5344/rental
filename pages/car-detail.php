<?php require "includes/header.php" ?>
<?php require "includes/cars.php" ?>

<?php
$carSlug = $_GET['car'] ?? null;
$car = null;

if ($carSlug) {
    $car = get_car_by_slug($carSlug, $cars);
}

if (!$car) {
    header("Location: /");
    exit;
}
?>

<main class="car-detail">
    <div class="grid">
        <div class="row">
            <div class="advertorial">
                <h2><?php echo htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8'); ?> auto met het beste design en snelheid</h2>
                <p>Veiligheid en comfort terwijl je rijd in een <?php echo htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8'); ?> auto</p>
                <img src="assets/images/products/<?php echo rawurlencode($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?>">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
        </div>
        <div class="row white-background">
            <h2><?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
            <div class="rating">
                <span class="stars stars-<?php echo floor($car['rating']); ?>"></span>
                <span><?php echo htmlspecialchars($car['reviews'], ENT_QUOTES, 'UTF-8'); ?> reviewers</span>
            </div>
            <p><?php echo htmlspecialchars($car['description'], ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="car-type">
                <div class="grid">
                    <div class="row"><span class="accent-color">Type Car</span><span><?php echo htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                    <div class="row"><span class="accent-color">Capacity</span><span><?php echo htmlspecialchars($car['passengers'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                </div>
                <div class="grid">
                    <div class="row"><span class="accent-color">Steering</span><span><?php echo htmlspecialchars($car['transmission'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                    <div class="row"><span class="accent-color">Gasoline</span><span><?php echo htmlspecialchars($car['fuel'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                </div>
                <div class="call-to-action">
                    <div class="row"><span class="font-weight-bold"><?php echo htmlspecialchars($car['price'], ENT_QUOTES, 'UTF-8'); ?></span> / dag</div>
                    <div class="row"><a href="" class="button-primary">Huur nu</a></div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php require "includes/footer.php" ?>
