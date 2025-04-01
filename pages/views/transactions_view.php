<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacties</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen transition-all duration-300">
<div class="flex">
    <?php include('../components/sidebar.php'); ?>

    <main class="w-3/4 p-6">

        <header class="flex justify-between items-center bg-white p-6 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl">
            <h1 class="text-3xl font-semibold text-gray-800">Transacties</h1>
            <p class="text-gray-600 text-lg">Welkom terug, <?php echo escape($username); ?>!</p>
            <a href="add_transaction.php" class="bg-green-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-700 hover:scale-105 transition-all">
                + Toevoegen
            </a>
        </header>

        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border p-3">Bedrag</th>
                    <th class="border p-3">Type</th>
                    <th class="border p-3">Categorie</th>
                    <th class="border p-3">Datum</th>
                    <th class="border p-3">Actie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr class="text-center bg-white hover:bg-gray-50 transition-all">
                        <td class="border p-3">
                            &#8364; <?php echo escape(number_format($transaction['amount'], 2, ',', '.')); ?>
                        </td>
                        <td class="border p-3">
                            <?php echo escape(ucfirst($transaction['type'])); ?>
                        </td>
                        <td class="border p-3">
                            <?php echo escape($transaction['category']); ?>
                        </td>
                        <td class="border p-3">
                            <?php echo escape($transaction['date']); ?>
                        </td>
                        <td class="border p-3">
                            <a href="delete_transaction.php?id=<?php echo $transaction['id']; ?>" class="text-red-600 hover:text-red-800 transition-all"><i class="ri-delete-bin-6-line"></i> Verwijderen</a>
                            <a href="edit_transaction.php?id=<?php echo $transaction['id']; ?>" class="text-blue-600 hover:text-blue-800 transition-all"><i class="ri-pencil-line"></i> Bewerken</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>
</div>

</body>
</html>
