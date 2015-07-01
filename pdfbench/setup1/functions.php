<?php






function loadTemplate($page, $data = array()) {
    extract($data);
    $path = 'templates'. DIRECTORY_SEPARATOR . $page;
    ob_start();
    include $path;
    return ob_get_clean();
}