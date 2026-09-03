<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$users = $users ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/users.css?v=3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <style nonce="<?= defined('CSP_NONCE') ? htmlspecialchars(CSP_NONCE, ENT_QUOTES, 'UTF-8') : '' ?>">
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --forest: #183b2a;
            --forest-deep: #10291e;
            --leaf: #3f7953;
            --sage: #9cad86;
            --khaki: #c7bd91;
            --paper: #f2edda;
            --glass: rgba(255, 255, 255, 0.68);
            --line: rgba(24, 59, 42, 0.14);
            --shadow: 0 24px 60px rgba(24, 59, 42, 0.18);
        }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 3rem 1.25rem;
            color: var(--forest-deep);
            font-family: 'DM Sans', sans-serif;
            background:
                radial-gradient(circle at 12% 8%, rgba(199, 189, 145, 0.72), transparent 28rem),
                radial-gradient(circle at 88% 88%, rgba(63, 121, 83, 0.28), transparent 30rem),
                linear-gradient(135deg, #d8d2ad 0%, #eef0d9 48%, #b9c8a3 100%);
        }

        .page-shell { width: min(100%, 1080px); margin: 0 auto; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            color: var(--forest-deep);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0;
        }

        .brand-mark {
            display: grid;
            width: 2.45rem;
            height: 2.45rem;
            place-items: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 0.75rem;
            color: var(--paper);
            background: var(--forest);
            box-shadow: 0 8px 18px rgba(24, 59, 42, 0.2);
        }

        .eyebrow {
            margin: 0;
            color: var(--leaf);
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .glass-panel {
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.62);
            border-radius: 1.25rem;
            background: var(--glass);
            box-shadow: var(--shadow);
            backdrop-filter: blur(18px);
        }

        .panel-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 1rem;
            padding: 2rem 2rem 1.5rem;
            border-bottom: 1px solid var(--line);
        }

        h1 {
            margin: 0.35rem 0 0;
            color: var(--forest-deep);
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2rem, 5vw, 3.3rem);
            line-height: 1;
            letter-spacing: 0;
        }

        .count {
            flex: 0 0 auto;
            padding: 0.55rem 0.85rem;
            border: 1px solid rgba(63, 121, 83, 0.25);
            border-radius: 999px;
            color: var(--forest);
            background: rgba(156, 173, 134, 0.28);
            font-size: 0.82rem;
            font-weight: 700;
        }

        .table-wrap { overflow-x: auto; padding: 0.75rem 1rem 1rem; }

        table { width: 100%; min-width: 680px; border-collapse: separate; border-spacing: 0 0.35rem; }

        th {
            padding: 0.75rem 1rem;
            color: var(--leaf);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-align: left;
            text-transform: uppercase;
        }

        td {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.75);
            border-bottom: 1px solid rgba(24, 59, 42, 0.08);
            background: rgba(255, 255, 255, 0.43);
            font-size: 0.94rem;
        }

        td:first-child { border-left: 1px solid rgba(24, 59, 42, 0.08); border-radius: 0.75rem 0 0 0.75rem; color: var(--leaf); font-weight: 700; }
        td:last-child { border-right: 1px solid rgba(24, 59, 42, 0.08); border-radius: 0 0.75rem 0.75rem 0; color: var(--forest); font-weight: 600; }
        tbody tr { transition: transform 160ms ease, filter 160ms ease; }
        tbody tr:hover { filter: brightness(1.04); transform: translateY(-2px); }
        .empty { color: var(--leaf); text-align: center; }

        @media (max-width: 600px) {
            body { padding: 1.5rem 0.75rem; }
            .panel-heading { align-items: flex-start; flex-direction: column; padding: 1.5rem; }
            .table-wrap { padding-inline: 0.5rem; }
        }
    </style>
</head>
<body>
    <main class="page-shell">
        <header class="topbar">
            <div class="brand"><span class="brand-mark">L</span><span>LavaLust</span></div>
            <p class="eyebrow">User directory</p>
        </header>

        <section class="glass-panel">
            <div class="panel-heading">
                <div>
                    <p class="eyebrow">Database records</p>
                    <h1>Users</h1>
                </div>
                <span class="count"><?= count($users) ?> <?= count($users) === 1 ? 'user' : 'users' ?></span>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td class="empty" colspan="5">No users found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= htmlspecialchars((string) ($user['id'] ?? $user->id ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars((string) ($user['firstname'] ?? $user->firstname ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars((string) ($user['lastname'] ?? $user->lastname ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars((string) ($user['email'] ?? $user->email ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars((string) ($user['username'] ?? $user->username ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>