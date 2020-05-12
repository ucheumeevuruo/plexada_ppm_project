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

    <?= $this->Html->css('fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('sb-admin-2.min.css') ?>
    <?= $this->Html->css('custom-style.css') ?>

    <?= $this->Html->script('vendor/jquery/jquery.min.js') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('vendor/jquery-easing/jquery.easing.min.js') ?>
    <?= $this->Html->script('sb-admin-2.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body id="page-top">
    <?= $this->Flash->render() ?>
    <div id="wrapper">
        <?= $this->fetch('sidebar') ?>
<!--        <div class="">-->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="white-bg">
                <?= $this->fetch('navbar') ?>
                <?= $this->fetch('content') ?>
            </div>
<!--            </div>-->
        </div>
    </div>
    <footer>
        <!-- Image loader -->
        <div id='loader' class="loader" style='display: none;'>
            <i class="fas fa-circle-notch fa-spin fa-7x"></i>
        </div>
    </footer>
</body>
<script>
    $(document).ready(function() {
        function openUrl(href){
            $.ajax({
                url: href,
                // contentType: "application/json",
                // dataType: 'json',
                beforeSend: function(){
                    $('#loader').show();
                },
                success: function(result){
                    $('#flyby').html(result);
                    // history.pushState(null, null, href);
                },
                complete: function(){
                    $('#loader').hide();
                },
                error: function(){
                    alert("Page " + href + " cannot open.");
                    $('#loader').hide();
                },
                timeout: 3000
            })
        }
        $('.unclickable').click(function(){
            $('#loader').hide();
            event.preventDefault();
            return false;
        })
        //respond to click event on anything with 'overlay' class
        $(document).on('click', 'a.navigator', function(event){
            event.preventDefault();
            //load content from href of link
            let href = $(this).attr("href");
            openUrl(href);

            window.history.pushState({href: href}, '', href);
        });
        $(window).bind("popstate", function (event) {
            console.log(event);
            let href = location.href;
            // if(state.navigation.type == 2)
            openUrl(href);
        });

        $(document).on('click', '#clickable-card', function(event){
            event.preventDefault();
            let href = $(this).attr('data-attr');
            openUrl(href);

            window.history.pushState({href: href}, '', href);
        })
        //$('#searchable').submit(function(){
        //    event.preventDefault();
        //
        //    let href = '<?//= $this->Url->build(['action' => 'index']); ?>///?' + $(this).serialize();
        //    openUrl(href);
        //    window.history.pushState({href: href}, '', href);
        //})
    });
</script>
</html>