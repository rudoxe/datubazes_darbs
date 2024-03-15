<?php
require 'db.php';
require 'functions.php';

$books = getBooks($db);

include 'header.php';
include 'book_list.php';
include 'footer.php';
?>
