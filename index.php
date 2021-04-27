<?php
require 'config.php';

//additional php code for this page goes here

?>

<?= template_header('Home') ?>
<?= template_nav() ?>
<div class="columns is-vcentered">
    <div class="column is-4"></div>
    <div class="column is-4">
        <h1 class="title">"It is health that is real wealth and not pieces of gold and silver." -Mahatma Gandhi</h1>
        <a href="log-create.php" class="button is-link" title="Track Food">
            <span>Start Tracking Food</span>
        </a>
    </div>
    <div class="column is-4"></div>
</div>
    

<?= template_footer() ?>