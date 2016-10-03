    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href=""> <!-- 192p -->
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content=""> <!-- more details about the title -->
    <link rel="apple-touch-icon-precomposed" href=""> <!-- 192p -->

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content=""> <!-- 144p -->
    <meta name="msapplication-TileColor" content="#3372DF">
    <link rel="shortcut icon" href=""> <!-- 192p -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/> <!-- title -->
    <meta property="og:image" content=""/> <!-- 144p -->
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/> <!-- more details about the title -->
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" /> <!-- title -->
    <meta name="twitter:image" content="" /> <!-- 144p -->
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <meta id="_token_name" content="<?= $this->security->get_csrf_token_name(); ?>"> 
    <meta id="_token_value" content="<?= $this->security->get_csrf_hash(); ?>"> 
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?=site_url('css/app.css') ?>">

    <script type="text/javascript">
<?
    foreach($this->app->getJsVars() as $key => $val) {
        echo 'var ' . $key . ' = ' . (is_string($val) ? '"' . $val . '"' : json_encode($val, JSON_PRETTY_PRINT)) . ";\n\r";
    }
?>
    </script>
<? // TODO: extend title ?>
    <title>Title</title>

