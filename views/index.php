<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-white">Shopping List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body body class="bg-gray-50 dark:bg-gray-900">
    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
        role="alert">
        <center><span class="font-medium">Warning</span> <br>Clearing cookies will delete the "current user" and will
            make so that the list it's gone.</center>
    </div>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4 text-white">Shopping List</h1>
        <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            <?php echo $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
        <form action="#" method="post" class="mb-4">
            <input type="text" name="item" placeholder="Enter item" class="border p-2 mr-2">
            <input type="number" name="price" placeholder="Enter price" class="border p-2 mr-2">
            <button type="submit" name="add"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add
            </button>
        </form>
        <ul>
            <?php foreach ($items as $item) : ?>
            <form action="#" method="post" class="mb-4">
                <li class="flex items-center mb-2">
                    <input type="text" name="edit_item" value="<?php echo $item['name']; ?>"
                        class="border p-2 flex-grow">
                    <label class="text-white"> &nbsp; Price: </label><input type="number" name="edit_price"
                        value="<?php echo $item['price']; ?>" class="border p-2"> &nbsp;
                    <input type="checkbox" name="check_item" value="1" <?php echo $item['checked'] ? 'checked' : ''; ?>
                        class="mr-2">
                    <button type="submit" name="update" value="<?php echo $item['id']; ?>"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                        Update
                    </button>
                    <button type="submit" name="delete" value="<?php echo $item['id']; ?>"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                        Delete
                    </button>
                </li>
            </form>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>