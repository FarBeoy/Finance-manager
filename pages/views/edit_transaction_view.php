<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactie Bewerken</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center transition-all duration-300">

<div class="bg-white p-6 rounded-lg shadow-lg w-96 transition-transform transform hover:scale-105">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Bewerk Transactie</h2>
    <form method="post">

        <label class="block text-gray-700">Bedrag (€)</label>
        <input type="number" name="amount" step="0.01" min="0.01" class="w-full p-2 border rounded mb-3 focus:ring focus:ring-blue-200" value="<?php echo escape($transaction['amount']); ?>" required>

        <label class="block text-gray-700">Type</label>
        <select name="type" class="w-full p-2 border rounded mb-3 focus:ring focus:ring-blue-200">
            <option value="inkomen" <?php echo ($transaction['type'] == 'inkomen') ? 'selected' : ''; ?>>Inkomen</option>
            <option value="uitgave" <?php echo ($transaction['type'] == 'uitgave') ? 'selected' : ''; ?>>Uitgave</option>
        </select>

        <label class="block text-gray-700">Categorie</label>
        <input type="text" name="category" class="w-full p-2 border rounded mb-3 focus:ring focus:ring-blue-200" value="<?php echo escape($transaction['category']); ?>" required>

        <label class="block text-gray-700">Datum</label>
        <input type="date" name="date" class="w-full p-2 border rounded mb-3 focus:ring focus:ring-blue-200" value="<?php echo escape($transaction['date']); ?>" required>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition-all">Bijwerken</button>
    </form>
    <a href="transactions.php" class="block text-center text-blue-500 mt-3 hover:underline">Terug naar Transacties</a>
</div>

</body>
</html>
