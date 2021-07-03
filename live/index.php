<?php 
$tabs = [
  'home' => false,
  'accounts' => false
];

$page = $_SERVER['REQUEST_URI'] ?? '/home';
$page = str_replace('/', '', $page);
if (!file_exists('page/'.$page.'.php')) {
  $page = '404';
} else {
  $tabs[$page] = true;
}
$file = $page.'.php';

print_r([
  '$page' => $page,
  '$file' => $file,
  '$tabs' => $tabs,
]);
die();
?>