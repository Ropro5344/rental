<?php require "includes/header.php" ?>
<?php require "includes/cars.php" ?>

<main>
    <h2 class="section-title">Ons aanbod</h2>

    <div class="filters">
        <div class="filter-group">
            <label for="type-filter">Filter op autotype</label>
            <select id="type-filter">
                <option value="">Alle types</option>
                <?php
                $types = array_unique(array_column($cars, 'type'));
                sort($types);
                foreach ($types as $type) {
                    echo '<option value="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="cars" id="cars-grid">
        <?php foreach ($cars as $car) : ?>
            <div class="car-details" data-type="<?php echo htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="car-brand">
                    <h3><?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <div class="car-type">
                        <?php echo htmlspecialchars($car['type'], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                </div>
                <img src="assets/images/products/<?php echo rawurlencode($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="car-specification">
                    <span><img src="assets/images/icons/gas-station.svg" alt=""><?php echo htmlspecialchars($car['fuel'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span><img src="assets/images/icons/car.svg" alt=""><?php echo htmlspecialchars($car['transmission'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span><img src="assets/images/icons/profile-2user.svg" alt=""><?php echo htmlspecialchars($car['passengers'], ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="rent-details">
                    <span><span class="font-weight-bold"><?php echo htmlspecialchars($car['price'], ENT_QUOTES, 'UTF-8'); ?></span> / dag</span>
                    <a href="/car-detail?car=<?php echo rawurlencode($car['slug']); ?>" class="button-primary">Bekijk nu</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
document.getElementById('type-filter').addEventListener('change', function() {
    const selectedType = this.value;
    const cars = document.querySelectorAll('.car-details');

    cars.forEach(car => {
        if (selectedType === '' || car.dataset.type === selectedType) {
            car.style.display = 'flex';
        } else {
            car.style.display = 'none';
        }
    });
});
</script>

<?php require "includes/footer.php" ?>

