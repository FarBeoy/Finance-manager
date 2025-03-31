<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkomsten</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<div class="flex">
    <?php include('../components/sidebar.php'); ?>
    <main class="w-3/4 p-6">
        <header class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
            <h1 class="text-2xl font-bold">Inkomsten</h1>
            <p class="text-gray-600">Welkom terug, <?php echo htmlspecialchars($username); ?>!</p>
        </header>
        <div class="bg-white p-6 rounded-lg shadow mt-6">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">Bedrag</th>
                    <th class="border p-3">Categorie</th>
                    <th class="border p-3">Datum</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($incomeTransactions as $transaction): ?>
                    <tr>
                        <td class="border p-3">&#8364; <?php echo escape(number_format($transaction['amount'], 2, ',', '.')); ?></td>
                        <td class="border p-3"><?php echo escape($transaction['category']); ?></td>
                        <td class="border p-3"><?php echo escape($transaction['date']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>