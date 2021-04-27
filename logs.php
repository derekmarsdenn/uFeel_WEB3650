<?php
require 'config.php';

// connect to mysql
$pdo = pdo_connect_mysql();

//query that selects all the polls from the db
$stmt = $pdo->query('SELECT * FROM logs');

$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?= template_header('Polls') ?>
<?= template_nav() ?>
<div class="columns is-vcentered">
    <div class="column is-4"></div>
    <div class="column is-4">
        <h1 class="title">uFeel</h1>
        <p>Here is a list of all the food you have tracked!</p>

        <p>&nbsp;</p>
        <div class="column is-centered">
            <table class="table is-bordered is-hoverable">
                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td>
                                <?= $log['meal'] ?>
                            </td>
                            <td>
                                <?= $log['items'] ?>
                            </td>
                            <td>
                                <a href="log-details.php?id=<?= $log['id'] ?>" class="button is-link is-small" title="View Log">
                                    <span >Details</span>
                                </a>
                                <a href="log-delete.php?id=<?= $log['id'] ?>" class="button is-link is-small">
                                    <span class="icon"><i class="fas fa-trash-alt"></i></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="column is-4"></div>
</div>


    <!-- END PAGE CONTENT -->

<?= template_footer() ?>