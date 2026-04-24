<?php
session_start();

require_once __DIR__ . '/../config/constants.php';

$projectsFile = __DIR__ . '/../data/projects.json';
$message = '';
$error = '';

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['admin_authenticated'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'login') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
            $_SESSION['admin_authenticated'] = true;
            header('Location: index.php');
            exit;
        }

        $error = 'Invalid login details.';
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio Admin Login</title>
        <style>
            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
                background: #10131b;
                color: #f4f6ff;
                font-family: Arial, sans-serif;
            }

            .card {
                width: min(420px, 92vw);
                padding: 24px;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.04);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            h1 {
                margin-top: 0;
                font-size: 22px;
            }

            input,
            button {
                width: 100%;
                padding: 12px;
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                margin-top: 10px;
                font: inherit;
            }

            button {
                cursor: pointer;
                background: #ffd663;
                color: #10131b;
                font-weight: 700;
            }

            .error {
                margin-top: 10px;
                color: #ff9b9b;
            }

            .hint {
                margin-top: 12px;
                font-size: 13px;
                color: #c6cbe0;
            }
        </style>
    </head>

    <body>
        <form class="card" method="post" action="">
            <h1>Portfolio Admin</h1>
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <?php if ($error): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <p class="hint">Default login: admin / ChangeThisAdmin123!</p>
        </form>
    </body>

    </html>
    <?php
    exit;
}

$projects = [];
if (file_exists($projectsFile)) {
    $decoded = json_decode(file_get_contents($projectsFile), true);
    if (is_array($decoded)) {
        $projects = $decoded;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'save') {
    $incoming = $_POST['projects'] ?? [];
    $updated = [];

    foreach ($incoming as $row) {
        $title = trim($row['title'] ?? '');
        if ($title === '') {
            continue;
        }

        $techList = array_values(array_filter(array_map('trim', explode(',', $row['technologies'] ?? ''))));
        $featureList = array_values(array_filter(array_map('trim', explode('|', $row['features'] ?? ''))));

        $updated[] = [
            'id' => (int) ($row['id'] ?? 0),
            'title' => $title,
            'category' => trim($row['category'] ?? 'Web development'),
            'images' => [trim($row['image'] ?? 'assets/images/project-1.jpg')],
            'alt' => trim($row['alt'] ?? strtolower($title)),
            'description' => trim($row['description'] ?? ''),
            'demoUrl' => trim($row['demoUrl'] ?? '#'),
            'githubUrl' => trim($row['githubUrl'] ?? '#'),
            'story' => trim($row['story'] ?? ''),
            'features' => $featureList,
            'technologies' => $techList,
        ];
    }

    usort($updated, static function ($a, $b) {
        return ($a['id'] <=> $b['id']);
    });

    file_put_contents($projectsFile, json_encode($updated, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    $projects = $updated;
    $message = 'Projects saved successfully.';
}

$nextId = 1;
if ($projects) {
    $max = max(array_map(static fn($item) => (int) ($item['id'] ?? 0), $projects));
    $nextId = $max + 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin</title>
    <style>
        body {
            margin: 0;
            background: #0f121a;
            color: #e8ebf7;
            font-family: Arial, sans-serif;
        }

        .wrap {
            max-width: 1200px;
            margin: 24px auto;
            padding: 0 16px;
        }

        h1 {
            margin: 0 0 16px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            gap: 12px;
            flex-wrap: wrap;
        }

        .button,
        button {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: #ffd663;
            color: #171b25;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .button.secondary {
            background: transparent;
            color: #e8ebf7;
        }

        .card {
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            padding: 16px;
            margin-bottom: 14px;
            background: rgba(255, 255, 255, 0.03);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 10px;
        }

        input,
        textarea {
            width: 100%;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 0, 0.2);
            color: #e8ebf7;
            padding: 8px;
            font: inherit;
        }

        textarea {
            min-height: 80px;
        }

        label {
            font-size: 13px;
            color: #c7cde2;
        }

        .msg {
            margin-bottom: 12px;
            color: #b8ffcf;
        }

        .helper {
            color: #a9b1cc;
            font-size: 13px;
            margin-top: 6px;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="topbar">
            <h1>Portfolio Projects Admin</h1>
            <div>
                <a class="button secondary" href="../index.php" target="_blank" rel="noopener noreferrer">Open Site</a>
                <a class="button secondary" href="?logout=1">Logout</a>
            </div>
        </div>

        <?php if ($message): ?>
            <p class="msg"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <input type="hidden" name="action" value="save">

            <?php foreach ($projects as $index => $project): ?>
                <section class="card">
                    <div class="grid">
                        <label>ID
                            <input type="number" name="projects[<?php echo $index; ?>][id]" value="<?php echo (int) ($project['id'] ?? 0); ?>">
                        </label>
                        <label>Title
                            <input type="text" name="projects[<?php echo $index; ?>][title]" value="<?php echo htmlspecialchars($project['title'] ?? ''); ?>">
                        </label>
                        <label>Category
                            <input type="text" name="projects[<?php echo $index; ?>][category]" value="<?php echo htmlspecialchars($project['category'] ?? ''); ?>">
                        </label>
                        <label>Alt Text
                            <input type="text" name="projects[<?php echo $index; ?>][alt]" value="<?php echo htmlspecialchars($project['alt'] ?? ''); ?>">
                        </label>
                        <label>Main Image
                            <input type="text" name="projects[<?php echo $index; ?>][image]" value="<?php echo htmlspecialchars(($project['images'][0] ?? $project['image'] ?? '')); ?>">
                        </label>
                        <label>Live Demo URL
                            <input type="text" name="projects[<?php echo $index; ?>][demoUrl]" value="<?php echo htmlspecialchars($project['demoUrl'] ?? '#'); ?>">
                        </label>
                        <label>GitHub URL
                            <input type="text" name="projects[<?php echo $index; ?>][githubUrl]" value="<?php echo htmlspecialchars($project['githubUrl'] ?? '#'); ?>">
                        </label>
                        <label>Technologies (comma separated)
                            <input type="text" name="projects[<?php echo $index; ?>][technologies]" value="<?php echo htmlspecialchars(implode(', ', $project['technologies'] ?? [])); ?>">
                        </label>
                    </div>

                    <label>Description
                        <textarea name="projects[<?php echo $index; ?>][description]"><?php echo htmlspecialchars($project['description'] ?? ''); ?></textarea>
                    </label>
                    <label>Story (What I built & why)
                        <textarea name="projects[<?php echo $index; ?>][story]"><?php echo htmlspecialchars($project['story'] ?? ''); ?></textarea>
                    </label>
                    <label>Features (separate with |)
                        <input type="text" name="projects[<?php echo $index; ?>][features]" value="<?php echo htmlspecialchars(implode(' | ', $project['features'] ?? [])); ?>">
                    </label>
                </section>
            <?php endforeach; ?>

            <section class="card">
                <h2>Add New Project</h2>
                <div class="grid">
                    <label>ID
                        <input type="number" name="projects[new][id]" value="<?php echo $nextId; ?>">
                    </label>
                    <label>Title
                        <input type="text" name="projects[new][title]" placeholder="New project title">
                    </label>
                    <label>Category
                        <input type="text" name="projects[new][category]" placeholder="Web development">
                    </label>
                    <label>Main Image
                        <input type="text" name="projects[new][image]" placeholder="assets/images/project-new.jpg">
                    </label>
                    <label>Live Demo URL
                        <input type="text" name="projects[new][demoUrl]" placeholder="projects/your-project/index.html">
                    </label>
                    <label>Technologies (comma)
                        <input type="text" name="projects[new][technologies]" placeholder="PHP, Laravel, MySQL">
                    </label>
                </div>
                <label>Description
                    <textarea name="projects[new][description]" placeholder="Project summary"></textarea>
                </label>
                <p class="helper">Tip: to remove a project, clear its title and save.</p>
            </section>

            <button type="submit">Save All Projects</button>
        </form>
    </div>
</body>

</html>
