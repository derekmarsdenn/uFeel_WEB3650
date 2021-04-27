<?php
require 'config.php';

// connect to mysql
$pdo = pdo_connect_mysql();

$msg = "";

//check if POST data is not empty
if (!empty($_POST)) {
    //check to see if data from form isset
    $meal = isset($_POST['meal']) ? $_POST['meal'] : '';
    $items = isset($_POST['items']) ? $_POST['items'] : '';
    $feeling = isset($_POST['feeling']) ? $_POST['feeling'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    //insert new log record into the logs table
    $stmt = $pdo->prepare('INSERT INTO logs VALUES(NULL, ?, ?, ?, ?)');
    $stmt->execute([$meal, $items, $feeling, $created]);
    
    $msg = "Meal logged successfully!";
}

?>

<?= template_header('Create Log') ?>
<?= template_nav() ?>

<!-- START PAGE CONTENT -->
<h1 class="title">Track Meal</h1>

<?php if ($msg) : ?>
    <div class="notification is-success">
        <h2 class="title is-2"><?php echo $msg; ?></h2>
    </div>

<?php endif; ?>

<form action="" method="post">
    <div class="field">
        <label class="label">Meal</label>
        <div class="control">
            <input class="input" type="text" name="meal" placeholder="Lunch, snack, etc.">
        </div>
    </div>
    <div class="field">
        <label class="label">What did you eat?</label>
        <div class="control">
            <input class="input" type="text" name="items" placeholder="Mcdonalds, banana, etc.">
        </div>
    </div>
    
    <div class="field">
        <label class="label">How did it make you feel?</label>
        <div class="control">
            <input class="input" type="text" name="feeling" placeholder="It made me feel really good!">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
    </div>
</form>

<!-- END PAGE CONTENT -->

<?= template_footer() ?>