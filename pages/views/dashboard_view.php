<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financieel Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<div class="flex">
    <?php include('../components/sidebar.php'); ?>
    <main class="w-3/4 p-6">
        <header class="flex justify-between items-center bg-white p-4 rounded-lg shadow">
            <h1 class="text-2xl font-bold">Dashboard</h1>
            <p class="text-gray-600">Welkom terug, <?php echo htmlspecialchars($username); ?>!</p>
        </header>
        <div class="grid grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold">Totaal Inkomsten</h2>
                <p class="text-3xl font-bold">&#8364; <?php echo number_format($incomeTotal, 2, ',', '.'); ?></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold">Totaal Uitgaven</h2>
                <p class="text-3xl font-bold">&#8364; <?php echo number_format($expenseTotal, 2, ',', '.'); ?></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h2 class="text-xl font-semibold">Netto Waarde</h2>
                <p class="text-3xl font-bold text-green-500">&#8364; <?php echo number_format($netWorth, 2, ',', '.'); ?></p>
            </div>
        </div>
    </main>
</div>
</body>
</html>