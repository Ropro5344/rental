<?php require "includes/header.php" ?>
<?php require "includes/cars.php" ?>
    <header>
        <div class="advertorials">
            <div class="advertorial">
                <h2>Hét platform om een auto te huren</h2>
                <p>Snel en eenvoudig een auto te huren. Natuurlijk voor een lage prijs.</p>
                <a href="/ons-aanbod.php" class="button-primary">Huur nu een auto</a>
                <img src="assets/images/car-rent-header-image-1.png" alt="">
                <img src="assets/images/header-circle-background.svg" alt="" class="background-header-element">
            </div>
            <div class="advertorial">
                <h2>Wij verhuren ook bedrijfswagens</h2>
                <p>Voor een vaste lage prijs met prettig voordelen.</p>
                <a href="#" class="button-primary">Huur een bedrijfswagen</a>
                <img src="assets/images/car-rent-header-image-2.png" alt="">
                <img src="assets/images/header-block-background.svg" alt="" class="background-header-element">

            </div>
        </div>
    </header>

    <main>
    <h2 class="section-title">Populaire auto's</h2>
    <div class="cars">
        <?php $availableCars = array_values(array_filter($cars, function ($car) {
            return strtolower($car['type']) !== 'suv';
        })); ?>
        <?php $popular = array_slice($availableCars, 0, 4); ?>
        <?php foreach ($popular as $car) : ?>
            <div class="car-details">
                <div class="car-brand">
                    <h3><?= htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <div class="car-type">
                        <?= htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </div>
                <img src="assets/images/products/<?= rawurlencode($car['image']) ?>" alt="<?= htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg" alt=""><?= htmlspecialchars($car['fuel'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><img src="assets/images/icons/car.svg" alt=""><?= htmlspecialchars($car['transmission'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= htmlspecialchars($car['passengers'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="rent-details">
                    <span><span class="font-weight-bold"><?= htmlspecialchars($car['price'], ENT_QUOTES, 'UTF-8') ?></span> / dag</span>
                    <a href="/car-detail?car=<?= rawurlencode($car['slug']) ?>" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h2 class="section-title">Aanbevolen auto's</h2>
    <div class="cars">
        <?php $recommended = array_slice($availableCars, 4, 8); ?>
        <?php foreach ($recommended as $car) : ?>
            <div class="car-details">
                <div class="car-brand">
                    <h3><?= htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <div class="car-type">
                        <?= htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </div>
                <img src="assets/images/products/<?= rawurlencode($car['image']) ?>" alt="<?= htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg" alt=""><?= htmlspecialchars($car['fuel'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><img src="assets/images/icons/car.svg" alt=""><?= htmlspecialchars($car['transmission'], ENT_QUOTES, 'UTF-8') ?></span>
                    <span><img src="assets/images/icons/profile-2user.svg" alt=""><?= htmlspecialchars($car['passengers'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
                <div class="rent-details">
                    <span><span class="font-weight-bold"><?= htmlspecialchars($car['price'], ENT_QUOTES, 'UTF-8') ?></span> / dag</span>
                    <a href="/car-detail?car=<?= rawurlencode($car['slug']) ?>" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="show-more">
        <a class="button-primary" href="#">Toon alle</a>
    </div>
    </main>

<?php require "includes/footer.php" ?>