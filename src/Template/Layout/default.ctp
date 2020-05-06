<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Ogun State Project';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('sb-admin-2.min.css') ?>
    <?= $this->Html->css('dataTables.bootstrap4.min.css') ?>
    <?= $this->Html->css('custom-style.css') ?>
    <?= $this->Html->script('jquery-1.9.1.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('popper.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery.dataTables.min.js') ?>
    <?= $this->Html->script('dataTables.bootstrap4.min.js') ?>
    <?= $this->Html->script('fontawesome.min.js') ?>
    <?= $this->Html->script('moment-with-locales.min.js') ?>
    <?= $this->Html->script('bootstrap-datepicker.min.js') ?>
    <?= $this->Html->script('anychart-core.min.js') ?>
    <?= $this->Html->script('anychart-gantt.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!-- <script src="https://cdn.anychart.com/releases/8.6.0/js/anychart-core.min.js"> </script> 
    <script src ="https://cdn.anychart.com/releases/8.6.0/js/anychart-gantt.min.js"></script> -->
</head>
<body id="page-top">
    <?= $this->Flash->render() ?>
    <div id="wrapper">
        <?= $this->fetch('sidebar') ?>
<!--        <div class="">-->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->fetch('navbar') ?>
                <?= $this->fetch('content') ?>
            </div>
<!--            </div>-->
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>