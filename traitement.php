<?php
session_start();
require_once './config/db.php';

if (isset($_POST['save'])) {
    $univname = $_POST['univ_name'];

    $req = $conn->prepare(
        'INSERT INTO phpajaxdb.universites(univ_name, univ_date_registration) VALUES(?, ?)'
    );
    $req->execute([$univname, $reg_date]);

    die('success');
}
