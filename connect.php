
<?php
    define(db_server, 'localhost');
    define(db_username, 'root');
    define(db_password, 'root');
    define(db_name, 'ecommers');

    $connect = mysqli_connect(db_server, db_username, db_password, db_name);

   
?>