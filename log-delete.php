<?php
require 'config.php';

// connect to mysql
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    //select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM logs WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $log = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$log) {
        die ('Log does not exist with that ID.');
    }

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM logs WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            //output message
            $msg = 'You have deleted the log.';
        } else {
            header('Location: logs.php');
            exit;
        }
    }

} else {
    die ('No ID specified.');
}

?>

<?= template_header('Delete Log') ?>
<?= template_nav() ?>

    <!-- START PAGE CONTENT -->
    <h1 class="title">Delete Logged Meal</h1>

    <?php if ($msg) : ?>
        <div class="notification is-success">
            <h2 class="title is-2"><?php echo $msg; ?></h2>
        </div>
    <?php endif; ?>

    <h2 class="subtitle">Are you sure you want to delete this meal: <?=$log['meal']?> - <?=$log['items']?></h2>
    <a href="log-delete.php?id=<?=$log['id']?>&confirm=yes" class="button is-success">Yes</a>
    <a href="log-delete.php?id=<?=$log['id']?>&confirm=no" class="button is-danger">No</a>

    <!-- END PAGE CONTENT -->

<?= template_footer() ?>