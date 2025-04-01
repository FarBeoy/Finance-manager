<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Inloggen</h1>

        <form method="POST" class="space-y-6">
            <div>
                <input type="email" name="email" placeholder="Email" class="p-4 border border-gray-300 rounded-lg shadow-sm w-full focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Wachtwoord" class="p-4 border border-gray-300 rounded-lg shadow-sm w-full focus:ring-2 focus:ring-blue-500" required>
            </div>

            <?php if (isset($error)): ?>
                <div class="text-red-500 text-center mb-4"><?php echo $error; ?></div>
            <?php endif; ?>

            <button type="submit" class="w-full p-4 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-500 transition-all">Inloggen</button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm">Geen account? <a href="register.php" class="text-blue-500 hover:underline">Registreer hier</a>.</p>
        </div>
    </div>
</div>

</body>
</html>
