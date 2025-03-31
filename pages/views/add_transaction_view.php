<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactie Toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-6 rounded-lg shadow-md w-96">
    <h2 class="text-2xl font-bold mb-4">Nieuwe Transactie</h2>
    <form method="post">
        <label class="block">Bedrag (€)</label>
        <input type="number" name="amount" step="0.01" min="0.01" class="w-full p-2 border rounded mb-3" required>

        <label class="block">Type</label>
        <select name="type" class="w-full p-2 border rounded mb-3">
            <option value="inkomen">Inkomen</option>
            <option value="uitgave">Uitgave</option>
        </select>

        <label class="block">Categorie</label>
        <input type="text" name="category" class="w-full p-2 border rounded mb-3" required>

        <label class="block">Datum</label>
        <input type="date" name="date" class="w-full p-2 border rounded mb-3" required>

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Toevoegen</button>
    </form>
    <a href="transactions.php" class="block text-center text-blue-500 mt-3">Terug naar Transacties</a>
</div>
</body>
</html>