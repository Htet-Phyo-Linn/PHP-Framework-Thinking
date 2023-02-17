<?php
    use core\App;
    
    require "core/functions.php";
    App::bind("config", require "config.php");

    App::bind("database", new QueryBuilder(
        Connection::make(App::get("config")['database'])
    ));

?>
