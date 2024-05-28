<?php
// sort.php
$sort_order = 'default'; // Default sort order
if (isset($_POST['sort_order'])) {
    $sort_order = $_POST['sort_order'];
}

$order_by = "name ASC"; // Default order by clause
switch ($sort_order) {
    case 'name_asc':
        $order_by = "name ASC";
        break;
    case 'name_desc':
        $order_by = "name DESC";
        break;
    case 'price_asc':
        $order_by = "price ASC";
        break;
    case 'price_desc':
        $order_by = "price DESC";
        break;
}
?>
