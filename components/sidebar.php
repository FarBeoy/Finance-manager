<aside class="w-1/4 min-h-screen bg-white text-gray-800 border-r border-gray-200 shadow-md p-6 transition-all duration-300">
    <div class="text-center mb-6">
        <h2 class="mt-4 text-xl font-semibold"><?php echo htmlspecialchars($username); ?></h2>
        <p class="text-gray-500 text-sm">Financieel Beheer</p>
    </div>
    <nav>
        <ul>
            <?php
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <li class="mb-4">
                <a href="dashboard.php" class="flex items-center px-3 py-2 rounded-lg <?php echo ($current_page == 'dashboard.php') ? 'bg-gray-100 text-blue-600 font-semibold' : 'text-gray-600'; ?> hover:bg-gray-100 hover:text-blue-600 transition-all">
                    <i class="ri-dashboard-line mr-3 text-xl"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-4">
                <a href="transactions.php" class="flex items-center px-3 py-2 rounded-lg <?php echo ($current_page == 'transactions.php') ? 'bg-gray-100 text-blue-600 font-semibold' : 'text-gray-600'; ?> hover:bg-gray-100 hover:text-blue-600 transition-all">
                    <i class="ri-exchange-dollar-line mr-3 text-xl"></i>
                    Transacties
                </a>
            </li>
            <li class="mb-4">
                <a href="income.php" class="flex items-center px-3 py-2 rounded-lg <?php echo ($current_page == 'income.php') ? 'bg-gray-100 text-blue-600 font-semibold' : 'text-gray-600'; ?> hover:bg-gray-100 hover:text-blue-600 transition-all">
                    <i class="ri-wallet-3-line mr-3 text-xl"></i>
                    Inkomsten
                </a>
            </li>
            <li class="mb-4">
                <a href="expenses.php" class="flex items-center px-3 py-2 rounded-lg <?php echo ($current_page == 'expenses.php') ? 'bg-gray-100 text-blue-600 font-semibold' : 'text-gray-600'; ?> hover:bg-gray-100 hover:text-blue-600 transition-all">
                    <i class="ri-money-dollar-circle-line mr-3 text-xl"></i>
                    Uitgaven
                </a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="logout.php" class="mt-6">
        <button class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition-all">
            <i class="ri-logout-box-line mr-2 text-xl"></i> Uitloggen
        </button>
    </form>
</aside>
