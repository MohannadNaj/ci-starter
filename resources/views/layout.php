<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
    <? $this->load->view('shared/head'); ?>
</head>
<body>
<div class="container-fluid">
    <header class="row">
        <? $this->load->view('shared/header'); ?>
    </header>

    <div id="main" class="row">
        <div class="container">
            <?= $yield ?>
        </div>
    </div>

    <footer class="footer">
        <? $this->load->view('shared/footer'); ?>
    </footer>
</div>
<? $this->load->view('shared/scripts'); ?>
</body>
</html>