<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="../public/tailwind.min.css">
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Shopping List</h1>
        <form action="" method="post" enctype="multipart/form-data" class="mb-4">
            <input type="text" name="item" placeholder="Enter item" class="border p-2 mr-2">
            <input type="file" name="image" class="mr-2">
            <button type="submit" name="add"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add
            </button>
        </form>
        <ul>
            <?php foreach ($items as $item) : ?>
            <li class="flex items-center mb-2">
                <input type="checkbox" name="check_item[]" value="<?php echo $item['id']; ?>"
                    <?php echo $item['checked'] ? 'checked' : ''; ?> class="mr-2">
                <input type="text" name="edit_item[]" value="<?php echo $item['name']; ?>" class="border p-2 flex-grow">
                <button type="submit" name="update" value="<?php echo $item['id']; ?>"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Edit
                </button>
                <button type="submit" name="delete" value="<?php echo $item['id']; ?>"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Delete
                </button>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>