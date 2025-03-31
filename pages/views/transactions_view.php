<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacties</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<div class="flex">
    <?php include('../components/sidebar.php'); ?>
    <main class="w-3/4 p-6">
        <header class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
            <h1 class="text-2xl font-bold">Transacties</h1>
            <p class="text-gray-600">Welkom terug, <?php echo escape($username); ?>!</p>
            <a href="add_transaction.php" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                + Toevoegen
            </a>
        </header>
        <div class="bg-white p-6 rounded-lg shadow mt-6">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">Bedrag</th>
                    <th class="border p-3">Type</th>
                    <th class="border p-3">Categorie</th>
                    <th class="border p-3">Datum</th>
                    <th class="border p-3">Actie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
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
                            <a href="delete_transaction.php?id=<?php echo $transaction['id']; ?>" class="text-red-500 hover:text-red-700">Verwijderen</a>
                            <a href="edit_transaction.php?id=<?php echo $transaction['id']; ?>" class="text-blue-500 hover:text-blue-700">Bewerken</a>
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
