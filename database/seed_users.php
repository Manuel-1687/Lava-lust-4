<?php

$pdo = new PDO(
    'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_NAME') . ';charset=utf8mb4',
    getenv('DB_USER'),
    getenv('DB_PASSWORD'),
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$statement = $pdo->prepare(
    'INSERT INTO users (firstname, lastname, email, username) '
    . 'SELECT ?, ?, ?, ? WHERE NOT EXISTS '
    . '(SELECT 1 FROM users WHERE username = ?)'
);

$users = [
    ['Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz'],
    ['Maria', 'Santos', 'maria@example.com', 'mariasantos'],
    ['Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia'],
    ['Ana', 'Reyes', 'ana@example.com', 'anareyes'],
    ['Jose', 'Mendoza', 'jose@example.com', 'josemendoza'],
];

foreach ($users as $user) {
    $statement->execute([...$user, $user[3]]);
}

echo 'Users in database: ' . $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn() . PHP_EOL;