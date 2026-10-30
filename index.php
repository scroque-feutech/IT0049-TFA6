<?php
declare(strict_types=1);

function load_env(string $file): array
{
    $values = [];
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) continue;
        [$key, $value] = explode('=', $line, 2);
        $values[trim($key)] = trim($value, " \	\"'");
    }
    return $values;
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$env = load_env(__DIR__ . '/.env');
$page = $_GET['page'] ?? 'home';
if (!in_array($page, ['home', 'about', 'customers', 'users'], true)) {
    http_response_code(404);
    $page = '404';
}

$customers = [];
$users = [];
$database_error = null;

try {
    $pdo = new PDO(
        'mysql:host=' . ($env['DB_HOST'] ?? '') . ';port=' . ($env['DB_PORT'] ?? '3306') . ';dbname=' . ($env['DB_DATABASE'] ?? '') . ';charset=utf8mb4',
        $env['DB_USERNAME'] ?? '',
        $env['DB_PASSWORD'] ?? '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
    $customers = $pdo->query('SELECT full_name, email, phone FROM customers ORDER BY id')->fetchAll();
    $users = $pdo->query('SELECT username, full_name FROM users ORDER BY id')->fetchAll();
} catch (Throwable $exception) {
    $database_error = 'Database is not connected. Import database/pos.sql and update .env with your InfinityFree MySQL credentials.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTA V POS | TFA 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header"><div class="container">
    <div class="brand">GTA V POS - TFA 6</div>
    <nav><a href="/">Home</a><a href="/about">About</a><a href="/customers">Customers</a><a href="/users">Users</a></nav>
</div></header>
<main class="container">
<?php if ($database_error !== null && $page !== 'home' && $page !== 'about'): ?>
    <section class="card warning"><h1>Database Setup Required</h1><p><?= e($database_error) ?></p></section>
<?php elseif ($page === 'home'): ?>
    <section class="hero"><p class="eyebrow">IT0049 Web System Technologies</p><h1>GTA V Laravel POS</h1><p class="lead">TFA 6 database-backed customer and user account management.</p><div class="actions"><a class="button" href="/customers">View Customers</a><a class="button secondary" href="/users">View Users</a></div></section>
<?php elseif ($page === 'about'): ?>
    <section class="card"><p class="eyebrow">TFA 6</p><h1>From Arrays to Eloquent</h1><p>This version displays customer and user records retrieved from a MySQL database.</p><p>The records are based on GTA V characters for the laboratory demonstration.</p></section>
<?php elseif ($page === 'customers'): ?>
    <section class="card"><p class="eyebrow">Database Records</p><h1>Customer Accounts</h1><div class="table-wrap"><table><thead><tr><th>Full Name</th><th>Email</th><th>Phone</th></tr></thead><tbody>
    <?php foreach ($customers as $customer): ?><tr><td><?= e($customer['full_name']) ?></td><td><?= e($customer['email']) ?></td><td><?= e($customer['phone']) ?></td></tr><?php endforeach; ?>
    </tbody></table></div></section>
<?php elseif ($page === 'users'): ?>
    <section class="card"><p class="eyebrow">Database Records</p><h1>User Accounts</h1><div class="table-wrap"><table><thead><tr><th>Username</th><th>Full Name</th></tr></thead><tbody>
    <?php foreach ($users as $user): ?><tr><td><?= e($user['username']) ?></td><td><?= e($user['full_name']) ?></td></tr><?php endforeach; ?>
    </tbody></table></div></section>
<?php else: ?><section class="card"><h1>Page Not Found</h1></section><?php endif; ?>
</main><footer><div class="container">TFA 6 Laravel POS Data Layer</div></footer>
</body></html>
