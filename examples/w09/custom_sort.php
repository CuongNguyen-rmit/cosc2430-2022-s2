<?php

// compare 2 items based on price
function cmp_price($p1, $p2)
{
  return $p1['price'] - $p2['price'] < 1 ? 1 : -1;
}

// compare 2 items based on name
function cmp_name($p1, $p2)
{
  return strcmp($p1['name'], $p2['name']);
}

// compare 2 items based on weight
function cmp_weight($p1, $p2)
{
  return (int)$p1['weight'] - (int)$p2['weight'];
}


$products = [];
$products[] = ['price' => 100, 'name' => 'phone', 'weight' => 10.1];
$products[] = ['price' => 800, 'name' => 'computer', 'weight' => 100.5];
$products[] = ['price' => 50, 'name' => 'monitor', 'weight' => 200.2];
$products[] = ['price' => 500, 'name' => 'tablet', 'weight' => 50.3];

echo '<h2>Before sort</h2>';
echo '<pre>';
print_r($products);
echo '</pre>';
echo '<hr>';

usort($products, "cmp_price");
echo '<h2>After sorting price</h2>';
echo '<pre>';
print_r($products);
echo '</pre>';
echo '<hr>';

usort($products, "cmp_name");
echo '<h2>After sorting name</h2>';
echo '<pre>';
print_r($products);
echo '</pre>';
echo '<hr>';

usort($products, "cmp_weight");
echo '<h2>After sorting weight</h2>';
echo '<pre>';
print_r($products);
echo '</pre>';
echo '<hr>';
