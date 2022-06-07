<?php
 session_start();

 require_once('includes/mysql.php');

 $categoriesQuery = mysqli_query($conn, 'select a.id, a.name, count(b.id) as num_of_items from categories a, items b where a.id = b.category_id group by a.id, a.name order by count(b.id) desc limit 5');
 $itemsQuery = mysqli_query($conn, 'select * from items order by id desc limit 5');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function addToCart(itemId) {
            let items = JSON.parse(localStorage.getItem('items'));

            if (!items) {
                items = [];
            }

            items.push(itemId);

            localStorage.setItem('items', JSON.stringify(items));
            let inputElement = document.getElementById('item_ids');
            inputElement.value = JSON.stringify(items);
        }
    </script>
</head>
<body>
    <?php while($category = mysqli_fetch_assoc($categoriesQuery)): ?>
        <div><?= $category['name'] ?> (<?= $category['num_of_items'] ?> items)</div>
    <?php endwhile; ?>
    <h2>Items</h2>
    <?php while($item = mysqli_fetch_assoc($itemsQuery)): ?>
        <div>
            <?= $item['name'] ?>
            <a onclick="addToCart(<?= $item['id'] ?>)" href="#">Add to cart</a>
        </div>
    <?php endwhile; ?>
    <form>
        <input type="hidden" id="item_ids">
        <button type="submit">Checkout</button>
    </form>
    <div id="items"></div>
    <script>
        async function main () {

            let httpResponse = await fetch('/api/items.php');
            let items = await httpResponse.json();

            let itemsWrapper = document.getElementById('items');

            for (let i = 0; i < items.length; i++) {
                let tmpElement = document.createElement('h1');
                tmpElement.innerText = items[i].item_name;
                itemsWrapper.append(tmpElement);
            }
        }

        main();
    </script>
</body>
</html>
