<?php
require 'config.php';

// connect to mysql
$pdo = pdo_connect_mysql();

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM logs WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    $log = $stmt->fetch(PDO::FETCH_ASSOC);

} else {
    die ('No ID set.');
}

?>

<?= template_header('Meal Details') ?>
<?= template_nav() ?>

<div class="columns is-vcentered">
    <div class="column is-4"></div>
    <div class="column is-4">
    <h1 class="title"><?= $log['meal'] ?> time!</h1>
        <p>&nbsp;</p>
        <h2 class="subtitle">Here is what you ate: <strong><?= $log['items'] ?></strong></h2>
        <h3>And this is how you said it made you feel: <strong><?= $log['feeling'] ?></strong></h3>
        <p>&nbsp;</p>
        <p>Please adjust your diet accordingly</p>
        <p>&nbsp;</p>
        <a href="logs.php" class="button is-link is-small" title="View Log">
            <span>Go Back</span>
        </a>
    </div>
    <div class="column is-4"></div>
</div>
    
    

<?= template_footer() ?>