<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financieel Dashboard</title>
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
            <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
            <p class="text-gray-600 text-lg">Welkom terug, <?php echo htmlspecialchars($username); ?>!</p>
        </header>

        <div class="grid grid-cols-3 gap-6 mt-6">

            <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-xl font-semibold text-gray-700">Totaal Inkomsten</h2>
                <p class="text-3xl font-bold text-green-500">&#8364; <?php echo number_format($incomeTotal, 2, ',', '.'); ?></p>
                <i class="ri-wallet-3-line text-4xl text-green-500 mt-2"></i>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-xl font-semibold text-gray-700">Totaal Uitgaven</h2>
                <p class="text-3xl font-bold text-red-500">&#8364; <?php echo number_format($expenseTotal, 2, ',', '.'); ?></p>
                <i class="ri-money-dollar-circle-line text-4xl text-red-500 mt-2"></i>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg text-center border border-gray-200 transition-transform transform hover:scale-105 hover:shadow-xl">
                <h2 class="text-xl font-semibold text-gray-700">Netto Waarde</h2>
                <p class="text-3xl font-bold <?php echo ($netWorth >= 0) ? 'text-green-500' : 'text-red-500'; ?>">
                    &#8364; <?php echo number_format($netWorth, 2, ',', '.'); ?>
                </p>
                <i class="ri-bar-chart-line text-4xl <?php echo ($netWorth >= 0) ? 'text-green-500' : 'text-red-500'; ?> mt-2"></i>
            </div>
        </div>

        <section class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800"><i class="ri-bank-card-line"></i> Jouw Banken</h2>

            <button onclick="toggleModal()" class="bg-blue-600 hover:bg-blue-700 transition-all text-white px-4 py-2 rounded shadow-md hover:scale-105">
                <i class="ri-add-line"></i> Bank Toevoegen
            </button>

            <div id="bankModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h2 class="text-xl font-semibold mb-4 text-gray-800"><i class="ri-bank-line"></i> Voeg een Bank Toe</h2>

                    <form action="add_bank.php" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-gray-700"><i class="ri-building-line"></i> Kies je Bank</label>
                            <select name="bank_name" required class="w-full p-2 border rounded focus:ring focus:ring-blue-200">
                                <option value="ING">ING</option>
                                <option value="ABN AMRO">ABN AMRO</option>
                                <option value="Rabobank">Rabobank</option>
                                <option value="Bunq">Bunq</option>
                                <option value="SNS Bank">SNS Bank</option>
                                <option value="ASN Bank">ASN Bank</option>
                                <option value="Regiobank">Regiobank</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700"><i class="ri-credit-card-line"></i> Kaartnummer</label>
                            <input type="text" name="card_number" required maxlength="16" class="w-full p-2 border rounded focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700"><i class="ri-bank-card-line"></i> Rekeningnummer</label>
                            <input type="text" name="account_number" required class="w-full p-2 border rounded focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <label class="block text-gray-700"><i class="ri-global-line"></i> IBAN</label>
                            <input type="text" name="iban" required class="w-full p-2 border rounded focus:ring focus:ring-blue-200">
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="toggleModal()" class="bg-gray-500 hover:bg-gray-600 transition text-white px-4 py-2 rounded">Annuleren</button>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 transition text-white px-4 py-2 rounded"><i class="ri-check-line"></i> Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>

            <table class="w-full border-collapse border border-gray-300 mt-4">
                <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="border p-3">Bank</th>
                    <th class="border p-3">Kaartnummer</th>
                    <th class="border p-3">Rekeningnummer</th>
                    <th class="border p-3">IBAN</th>
                    <th class="border p-3">Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $stmt = $db->prepare('SELECT * FROM bank_accounts WHERE user_id = :user_id');
                $stmt->bindValue(':user_id', $user_id);
                $stmt->execute();
                $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($accounts as $account) {
                    echo "<tr class='text-center bg-white hover:bg-gray-50 transition-all'>
                        <td class='border p-3'><i class='ri-bank-line'></i> {$account['bank_name']}</td>
                        <td class='border p-3'>**** **** **** " . substr($account['card_number'], -4) . "</td>
                        <td class='border p-3'>{$account['account_number']}</td>
                        <td class='border p-3'>{$account['iban']}</td>
                        <td class='border p-3'>
                            <form action='delete_bank.php' method='POST' onsubmit='return confirm(\"Weet je zeker dat je deze bank wilt verwijderen?\");'>
                                <input type='hidden' name='bank_id' value='{$account['id']}'>
                                <button type='submit' class='text-red-600 hover:text-red-800 transition-all'><i class='ri-delete-bin-6-line'></i></button>
                            </form>
                        </td>
                      </tr>";
                }
                ?>
                </tbody>
            </table>
        </section>

    </main>
</div>

<script>
    function toggleModal() {
        document.getElementById("bankModal").classList.toggle("hidden");
    }
</script>

</body>
</html>
