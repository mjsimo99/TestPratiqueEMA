
<?php

require_once './autoload.php';
include('./views/includes/alerts.php');

$home = new HomeController();
$pages = ['index','country','search','ndiResult','ndiByAddressResult'];


if (isset($_GET['page'])) {
    if (in_array($_GET['page'],$pages)) {
        $page = $_GET['page'];
        $home->index($page);
    }else{
        include('views/includes/404.php');
    }
}else{
    $home->index('index');
}


// require_once './views/includes/footer.php';
