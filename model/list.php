<?php
$menu_list ="<a href=?option=current>Current</a> | <a href=?option=completed>Completed</a> | <a href=?option=upload>Upload</a>";
echo $menu_list;
echo "<hr>";

$lists = get_list();

