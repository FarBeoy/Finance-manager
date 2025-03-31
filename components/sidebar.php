<aside class="w-1/4 min-h-screen bg-white shadow-lg p-6">
    <div class="text-center mb-6">
        <h2 class="mt-4 text-lg font-semibold"><?php echo htmlspecialchars($username); ?></h2>
        <p class="text-gray-500">Financieel Beheer</p>
    </div>
    <nav>
        <ul>
            <li class="mb-4"><a href="dashboard.php" class="text-blue-600 font-semibold">Dashboard</a></li>
            <li class="mb-4"><a href="transactions.php">Transacties</a></li>
            <li class="mb-4"><a href="income.php">Inkomsten</a></li>
            <li class="mb-4"><a href="expenses.php">Uitgaven</a></li>
        </ul>
    </nav>
    <form method="POST" action="logout.php" class="mt-6">
        <button class="w-full bg-red-500 text-white py-2 rounded">Uitloggen</button>
    </form>
</aside>
