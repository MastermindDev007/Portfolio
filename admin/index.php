<?php
declare(strict_types=1);

session_start();
require_once __DIR__ . '/../config/constants.php';

$dataDir = realpath(__DIR__ . '/../data') ?: (__DIR__ . '/../data');

$collections = [
    'projects' => [
        'label' => 'Projects',
        'icon' => 'briefcase-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'projects.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'category', 'label' => 'Category', 'type' => 'text'],
            ['name' => 'alt', 'label' => 'Alt Text', 'type' => 'text'],
            ['name' => 'image', 'label' => 'Primary Image', 'type' => 'text'],
            ['name' => 'images', 'label' => 'Gallery Images', 'type' => 'array_text', 'full' => true, 'help' => 'One image path per line.'],
            ['name' => 'demoUrl', 'label' => 'Live Demo URL', 'type' => 'text'],
            ['name' => 'githubUrl', 'label' => 'GitHub URL', 'type' => 'text'],
            ['name' => 'technologies', 'label' => 'Technologies', 'type' => 'array_csv', 'help' => 'Separate by comma.'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'full' => true],
            ['name' => 'story', 'label' => 'Story', 'type' => 'textarea', 'full' => true],
            ['name' => 'features', 'label' => 'Features', 'type' => 'array_text', 'full' => true, 'help' => 'One feature per line.'],
        ],
    ],
    'blog' => [
        'label' => 'Blog Posts',
        'icon' => 'create-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'blog.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'category', 'label' => 'Category', 'type' => 'text'],
            ['name' => 'date', 'label' => 'Publish Date', 'type' => 'date'],
            ['name' => 'readTime', 'label' => 'Read Time', 'type' => 'text'],
            ['name' => 'image', 'label' => 'Cover Image', 'type' => 'text'],
            ['name' => 'alt', 'label' => 'Image Alt', 'type' => 'text'],
            ['name' => 'url', 'label' => 'Article URL', 'type' => 'text'],
            ['name' => 'excerpt', 'label' => 'Excerpt', 'type' => 'textarea', 'full' => true],
        ],
    ],
    'experience' => [
        'label' => 'Experience',
        'icon' => 'ribbon-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'experience.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Role', 'type' => 'text', 'required' => true],
            ['name' => 'company', 'label' => 'Company', 'type' => 'text'],
            ['name' => 'location', 'label' => 'Location', 'type' => 'text'],
            ['name' => 'duration', 'label' => 'Duration', 'type' => 'text'],
            ['name' => 'website', 'label' => 'Website', 'type' => 'text'],
            ['name' => 'badge', 'label' => 'Badge', 'type' => 'text'],
            ['name' => 'status', 'label' => 'Status', 'type' => 'text'],
            ['name' => 'isActive', 'label' => 'Active', 'type' => 'boolean', 'full' => false],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
            ['name' => 'highlights', 'label' => 'Highlights', 'type' => 'array_text', 'full' => true, 'help' => 'One highlight per line.'],
        ],
    ],
    'education' => [
        'label' => 'Education',
        'icon' => 'school-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'education.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Course / Degree', 'type' => 'text', 'required' => true],
            ['name' => 'university', 'label' => 'University', 'type' => 'text'],
            ['name' => 'college', 'label' => 'College', 'type' => 'text'],
            ['name' => 'badge', 'label' => 'Badge', 'type' => 'text'],
            ['name' => 'status', 'label' => 'Status', 'type' => 'text'],
            ['name' => 'note', 'label' => 'Note', 'type' => 'textarea', 'full' => true],
            ['name' => 'isActive', 'label' => 'Active', 'type' => 'boolean', 'full' => false],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'services' => [
        'label' => 'Services',
        'icon' => 'construct-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'services.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'icon', 'label' => 'Icon Path', 'type' => 'text'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'full' => true],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'companies' => [
        'label' => 'Companies',
        'icon' => 'business-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'companies.json',
        'primary_field' => 'name',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'name', 'label' => 'Company Name', 'type' => 'text', 'required' => true],
            ['name' => 'avatar', 'label' => 'Logo / Avatar Path', 'type' => 'text'],
            ['name' => 'position', 'label' => 'Position', 'type' => 'text'],
            ['name' => 'period', 'label' => 'Period', 'type' => 'text'],
            ['name' => 'website', 'label' => 'Website', 'type' => 'text'],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'full' => true],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'skills' => [
        'label' => 'Skills',
        'icon' => 'code-slash-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'skills.json',
        'primary_field' => 'category',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'category', 'label' => 'Category', 'type' => 'text', 'required' => true],
            ['name' => 'icon', 'label' => 'Ionicon Name', 'type' => 'text'],
            ['name' => 'percentage', 'label' => 'Percentage', 'type' => 'number', 'full' => false],
            ['name' => 'technologies', 'label' => 'Technologies', 'type' => 'text', 'full' => true],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'certifications' => [
        'label' => 'Certifications',
        'icon' => 'medal-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'certifications.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'issuer', 'label' => 'Issuer', 'type' => 'text'],
            ['name' => 'score', 'label' => 'Score', 'type' => 'text'],
            ['name' => 'grade', 'label' => 'Grade', 'type' => 'text'],
            ['name' => 'date', 'label' => 'Date', 'type' => 'text'],
            ['name' => 'icon', 'label' => 'Ionicon Name', 'type' => 'text'],
            ['name' => 'color', 'label' => 'Color Key', 'type' => 'text'],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'interests' => [
        'label' => 'Interests',
        'icon' => 'sparkles-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'interests.json',
        'primary_field' => 'title',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'full' => true],
            ['name' => 'delay', 'label' => 'Animation Delay', 'type' => 'text', 'full' => false],
        ],
    ],
    'tech-stack' => [
        'label' => 'Tech Stack',
        'icon' => 'hardware-chip-outline',
        'file' => $dataDir . DIRECTORY_SEPARATOR . 'tech-stack.json',
        'primary_field' => 'name',
        'fields' => [
            ['name' => 'id', 'label' => 'ID', 'type' => 'number', 'full' => false],
            ['name' => 'name', 'label' => 'Technology', 'type' => 'text', 'required' => true],
            ['name' => 'icon', 'label' => 'Ionicon Name', 'type' => 'text'],
            ['name' => 'color', 'label' => 'Color', 'type' => 'text'],
        ],
    ],
];

$sections = [
    'dashboard' => ['label' => 'Dashboard', 'icon' => 'grid-outline'],
    'inquiries' => ['label' => 'Inquiries', 'icon' => 'mail-open-outline'],
];

foreach ($collections as $key => $config) {
    $sections[$key] = ['label' => $config['label'], 'icon' => $config['icon']];
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function readJsonArray(string $path): array
{
    if (!file_exists($path)) {
        return [];
    }

    $raw = file_get_contents($path);
    if ($raw === false) {
        return [];
    }

    $decoded = json_decode($raw, true);
    return is_array($decoded) ? $decoded : [];
}

function writeJsonArray(string $path, array $data): bool
{
    $encoded = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    if ($encoded === false) {
        return false;
    }

    return file_put_contents($path, $encoded) !== false;
}

function parseFieldValue(array $field, array $rowInput)
{
    $name = $field['name'];
    $type = $field['type'] ?? 'text';
    $raw = $rowInput[$name] ?? '';

    if ($type === 'boolean') {
        return !empty($raw) && $raw !== '0';
    }

    if ($type === 'number') {
        return (int) $raw;
    }

    $text = trim((string) $raw);

    if ($type === 'array_csv') {
        if ($text === '') {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode(',', $text)), static fn($item) => $item !== ''));
    }

    if ($type === 'array_text') {
        if ($text === '') {
            return [];
        }
        $parts = preg_split('/\r\n|\r|\n/', $text) ?: [];
        return array_values(array_filter(array_map('trim', $parts), static fn($item) => $item !== ''));
    }

    return $text;
}

function rowHasContent(array $row, string $primaryField): bool
{
    $value = $row[$primaryField] ?? null;

    if (is_array($value)) {
        return count($value) > 0;
    }

    if (is_bool($value)) {
        return $value;
    }

    if (is_numeric($value)) {
        return (float) $value > 0;
    }

    return trim((string) $value) !== '';
}

function hasIdField(array $fields): bool
{
    foreach ($fields as $field) {
        if (($field['name'] ?? '') === 'id') {
            return true;
        }
    }
    return false;
}

function getMaxId(array $rows): int
{
    if (!$rows) {
        return 0;
    }

    $ids = array_map(static fn($row) => (int) ($row['id'] ?? 0), $rows);
    return max($ids);
}

function getEditorValue(array $field, array $row): string
{
    $name = $field['name'];
    $type = $field['type'] ?? 'text';
    $value = $row[$name] ?? '';

    if ($name === 'image' && ($value === '' || $value === null)) {
        $images = $row['images'] ?? [];
        if (is_array($images) && !empty($images)) {
            $value = (string) $images[0];
        }
    }

    if ($type === 'array_csv') {
        return is_array($value) ? implode(', ', $value) : trim((string) $value);
    }

    if ($type === 'array_text') {
        return is_array($value) ? implode(PHP_EOL, $value) : trim((string) $value);
    }

    if ($type === 'boolean') {
        return (!empty($value) && $value !== '0') ? '1' : '0';
    }

    return is_scalar($value) ? (string) $value : '';
}

function renderRowMarkup(array $fields, array $row, string $indexToken): string
{
    ob_start();
    ?>
    <article class="collection-item" data-row-item>
        <div class="collection-item-head">
            <h3>Item</h3>
            <button type="button" class="btn btn-danger" data-remove-row>
                <ion-icon name="trash-outline"></ion-icon>
                Remove
            </button>
        </div>
        <div class="field-grid">
            <?php foreach ($fields as $field): ?>
                <?php
                $name = $field['name'];
                $label = $field['label'] ?? ucfirst($name);
                $type = $field['type'] ?? 'text';
                $isFull = !empty($field['full']);
                $required = !empty($field['required']) ? 'required' : '';
                $help = $field['help'] ?? '';
                $value = getEditorValue($field, $row);
                $fieldName = 'rows[' . $indexToken . '][' . $name . ']';
                ?>
                <label class="field <?php echo $isFull ? 'field-full' : ''; ?>">
                    <span><?php echo e($label); ?></span>
                    <?php if ($type === 'textarea' || $type === 'array_csv' || $type === 'array_text'): ?>
                        <textarea name="<?php echo e($fieldName); ?>" rows="<?php echo ($type === 'textarea') ? '4' : '3'; ?>" <?php echo $required; ?>><?php echo e($value); ?></textarea>
                    <?php elseif ($type === 'boolean'): ?>
                        <input type="hidden" name="<?php echo e($fieldName); ?>" value="0">
                        <div class="toggle-wrap">
                            <input type="checkbox" name="<?php echo e($fieldName); ?>" value="1" <?php echo $value === '1' ? 'checked' : ''; ?>>
                            <span>Enabled</span>
                        </div>
                    <?php else: ?>
                        <input
                            type="<?php echo e($type); ?>"
                            name="<?php echo e($fieldName); ?>"
                            value="<?php echo e($value); ?>"
                            <?php echo $required; ?>
                            <?php echo $name === 'id' ? 'class="id-input"' : ''; ?>>
                    <?php endif; ?>
                    <?php if ($help !== ''): ?>
                        <small><?php echo e($help); ?></small>
                    <?php endif; ?>
                </label>
            <?php endforeach; ?>
        </div>
    </article>
    <?php
    return (string) ob_get_clean();
}

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
        $username = trim((string) ($_POST['username'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');

        if ($username === ADMIN_USERNAME && $password === ADMIN_PASSWORD) {
            $_SESSION['admin_authenticated'] = true;
            session_regenerate_id(true);
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/admin.css">
    </head>

    <body class="admin-login-body">
        <main class="login-shell">
            <section class="login-panel">
                <p class="login-kicker">ADMIN AREA</p>
                <h1>Portfolio Command Center</h1>
                <p class="login-copy">Manage projects, blog, resume content, and inquiries without editing code files manually.</p>

                <form method="post" action="">
                    <input type="hidden" name="action" value="login">
                    <label>
                        Username
                        <input type="text" name="username" placeholder="Username" required>
                    </label>
                    <label>
                        Password
                        <input type="password" name="password" placeholder="Password" required>
                    </label>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <?php if ($error !== ''): ?>
                        <p class="flash flash-error"><?php echo e($error); ?></p>
                    <?php endif; ?>
                    <p class="helper">Default: <strong>admin / ChangeThisAdmin123!</strong></p>
                </form>
            </section>
        </main>
    </body>

    </html>
    <?php
    exit;
}

$currentSection = strtolower(trim((string) ($_GET['section'] ?? 'dashboard')));
if (!isset($sections[$currentSection])) {
    $currentSection = 'dashboard';
}

$inquiriesFile = $dataDir . DIRECTORY_SEPARATOR . 'inquiries.json';
$inquiries = readJsonArray($inquiriesFile);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string) ($_POST['action'] ?? '');

    if ($action === 'save_collection') {
        $collectionKey = (string) ($_POST['collection_key'] ?? '');
        if (!isset($collections[$collectionKey])) {
            $error = 'Invalid section.';
        } else {
            $config = $collections[$collectionKey];
            $rowsInput = $_POST['rows'] ?? [];
            if (!is_array($rowsInput)) {
                $rowsInput = [];
            }

            $existingRows = readJsonArray($config['file']);
            $maxId = getMaxId($existingRows);
            $hasId = hasIdField($config['fields']);
            $prepared = [];

            foreach ($rowsInput as $rowInput) {
                if (!is_array($rowInput)) {
                    continue;
                }

                $parsed = [];
                foreach ($config['fields'] as $field) {
                    $parsed[$field['name']] = parseFieldValue($field, $rowInput);
                }

                if (!rowHasContent($parsed, $config['primary_field'])) {
                    continue;
                }

                if ($hasId) {
                    $id = (int) ($parsed['id'] ?? 0);
                    if ($id <= 0) {
                        $id = ++$maxId;
                    }
                    $parsed['id'] = $id;
                    $maxId = max($maxId, $id);
                }

                if ($collectionKey === 'projects') {
                    $image = trim((string) ($parsed['image'] ?? ''));
                    $images = $parsed['images'] ?? [];
                    if (!is_array($images)) {
                        $images = [];
                    }
                    if ($image !== '' && (empty($images) || $images[0] !== $image)) {
                        array_unshift($images, $image);
                        $images = array_values(array_unique($images));
                    }
                    if ($image === '' && !empty($images)) {
                        $image = (string) $images[0];
                    }
                    $parsed['image'] = $image;
                    $parsed['images'] = $images;
                }

                $prepared[] = $parsed;
            }

            if ($hasId) {
                usort($prepared, static fn($a, $b) => ((int) ($a['id'] ?? 0)) <=> ((int) ($b['id'] ?? 0)));
            }

            if (writeJsonArray($config['file'], $prepared)) {
                $message = $config['label'] . ' saved successfully.';
            } else {
                $error = 'Unable to save ' . $config['label'] . '.';
            }

            $currentSection = $collectionKey;
        }
    }

    if ($action === 'save_inquiries') {
        $statusInput = $_POST['inquiries_status'] ?? [];
        $deleteInput = $_POST['delete_inquiries'] ?? [];

        if (!is_array($statusInput)) {
            $statusInput = [];
        }

        if (!is_array($deleteInput)) {
            $deleteInput = [];
        }

        $deleteIds = array_flip(array_map('strval', $deleteInput));
        $updated = [];

        foreach ($inquiries as $inq) {
            $id = (string) ($inq['id'] ?? '');
            if ($id === '') {
                continue;
            }

            if (isset($deleteIds[$id])) {
                continue;
            }

            $newStatus = strtolower(trim((string) ($statusInput[$id] ?? ($inq['status'] ?? 'new'))));
            $allowed = ['new', 'read', 'replied', 'archived'];
            if (!in_array($newStatus, $allowed, true)) {
                $newStatus = 'new';
            }

            $inq['status'] = $newStatus;
            $updated[] = $inq;
        }

        if (writeJsonArray($inquiriesFile, $updated)) {
            $message = 'Inquiry list updated.';
            $inquiries = $updated;
        } else {
            $error = 'Unable to update inquiries.';
        }

        $currentSection = 'inquiries';
    }
}

$metrics = [];
foreach ($collections as $key => $config) {
    $rows = readJsonArray($config['file']);
    $metrics[$key] = is_array($rows) ? count($rows) : 0;
}

$newInquiries = 0;
foreach ($inquiries as $inq) {
    if (strtolower((string) ($inq['status'] ?? '')) === 'new') {
        $newInquiries++;
    }
}

$currentCollection = $collections[$currentSection] ?? null;
$currentRows = $currentCollection ? readJsonArray($currentCollection['file']) : [];
if ($currentCollection && empty($currentRows)) {
    $currentRows = [[]];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin.css">
</head>

<body>
    <div class="admin-shell">
        <aside class="admin-sidebar" data-admin-sidebar>
            <div class="brand">
                <p>Dev Davda</p>
                <h2>Admin Panel</h2>
            </div>

            <button class="sidebar-toggle" type="button" data-admin-sidebar-toggle>
                <ion-icon name="menu-outline"></ion-icon>
                Menu
            </button>

            <nav>
                <p class="nav-label">Overview</p>
                <a href="?section=dashboard" class="<?php echo $currentSection === 'dashboard' ? 'active' : ''; ?>">
                    <ion-icon name="grid-outline"></ion-icon>
                    Dashboard
                </a>
                <a href="?section=inquiries" class="<?php echo $currentSection === 'inquiries' ? 'active' : ''; ?>">
                    <ion-icon name="mail-open-outline"></ion-icon>
                    Inquiries
                    <span class="badge"><?php echo $newInquiries; ?></span>
                </a>

                <p class="nav-label">User Content</p>
                <?php foreach ($collections as $key => $config): ?>
                    <a href="?section=<?php echo e($key); ?>" class="<?php echo $currentSection === $key ? 'active' : ''; ?>">
                        <ion-icon name="<?php echo e($config['icon']); ?>"></ion-icon>
                        <?php echo e($config['label']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="topbar">
                <div>
                    <p class="kicker">Portfolio Control Center</p>
                    <h1><?php echo e($sections[$currentSection]['label'] ?? 'Dashboard'); ?></h1>
                </div>
                <div class="topbar-actions">
                    <a class="btn btn-ghost" href="../index.php" target="_blank" rel="noopener noreferrer">Open Site</a>
                    <a class="btn btn-ghost" href="?logout=1">Logout</a>
                </div>
            </header>

            <?php if ($message !== ''): ?>
                <p class="flash flash-success"><?php echo e($message); ?></p>
            <?php endif; ?>
            <?php if ($error !== ''): ?>
                <p class="flash flash-error"><?php echo e($error); ?></p>
            <?php endif; ?>

            <?php if ($currentSection === 'dashboard'): ?>
                <section class="dashboard-grid">
                    <article class="metric-card">
                        <p>Total Projects</p>
                        <h3><?php echo (int) ($metrics['projects'] ?? 0); ?></h3>
                    </article>
                    <article class="metric-card">
                        <p>Total Blog Posts</p>
                        <h3><?php echo (int) ($metrics['blog'] ?? 0); ?></h3>
                    </article>
                    <article class="metric-card">
                        <p>Experience Entries</p>
                        <h3><?php echo (int) ($metrics['experience'] ?? 0); ?></h3>
                    </article>
                    <article class="metric-card">
                        <p>Education Entries</p>
                        <h3><?php echo (int) ($metrics['education'] ?? 0); ?></h3>
                    </article>
                    <article class="metric-card accent">
                        <p>New Inquiries</p>
                        <h3><?php echo $newInquiries; ?></h3>
                    </article>
                    <article class="metric-card">
                        <p>Total Inquiries</p>
                        <h3><?php echo count($inquiries); ?></h3>
                    </article>
                </section>

                <section class="dashboard-panel">
                    <h2>Quick Actions</h2>
                    <div class="quick-actions">
                        <a class="btn btn-primary" href="?section=projects">Manage Projects</a>
                        <a class="btn btn-primary" href="?section=blog">Manage Blog</a>
                        <a class="btn btn-primary" href="?section=inquiries">Review Inquiries</a>
                        <a class="btn btn-primary" href="?section=experience">Update Resume Content</a>
                    </div>
                </section>
            <?php elseif ($currentSection === 'inquiries'): ?>
                <section class="dashboard-panel">
                    <h2>Contact Inquiries</h2>
                    <p>Inquiries are captured from the contact form and can be tracked here by status.</p>

                    <form method="post" action="?section=inquiries">
                        <input type="hidden" name="action" value="save_inquiries">

                        <?php if (empty($inquiries)): ?>
                            <p class="empty-state">No inquiries found yet.</p>
                        <?php else: ?>
                            <div class="inquiry-list">
                                <?php
                                usort($inquiries, static function ($a, $b) {
                                    return strcmp((string) ($b['createdAt'] ?? ''), (string) ($a['createdAt'] ?? ''));
                                });
                                ?>
                                <?php foreach ($inquiries as $inq): ?>
                                    <?php
                                    $id = (int) ($inq['id'] ?? 0);
                                    $createdAt = (string) ($inq['createdAt'] ?? '');
                                    $displayDate = $createdAt !== '' ? date('d M Y, h:i A', strtotime($createdAt)) : '-';
                                    ?>
                                    <article class="inquiry-item">
                                        <div class="inquiry-head">
                                            <h3><?php echo e((string) ($inq['subject'] ?? 'No subject')); ?></h3>
                                            <span>#<?php echo $id; ?></span>
                                        </div>
                                        <p class="inquiry-meta">
                                            <strong><?php echo e((string) ($inq['name'] ?? '-')); ?></strong>
                                            <a href="mailto:<?php echo e((string) ($inq['email'] ?? '')); ?>"><?php echo e((string) ($inq['email'] ?? '-')); ?></a>
                                            <time><?php echo e($displayDate); ?></time>
                                        </p>
                                        <p class="inquiry-message"><?php echo e((string) ($inq['message'] ?? '')); ?></p>
                                        <div class="inquiry-actions">
                                            <label>
                                                Status
                                                <select name="inquiries_status[<?php echo $id; ?>]">
                                                    <?php
                                                    $status = strtolower((string) ($inq['status'] ?? 'new'));
                                                    $statusOptions = ['new' => 'New', 'read' => 'Read', 'replied' => 'Replied', 'archived' => 'Archived'];
                                                    foreach ($statusOptions as $value => $label):
                                                    ?>
                                                        <option value="<?php echo e($value); ?>" <?php echo $status === $value ? 'selected' : ''; ?>><?php echo e($label); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                            <label class="delete-option">
                                                <input type="checkbox" name="delete_inquiries[]" value="<?php echo $id; ?>">
                                                Delete inquiry
                                            </label>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Inquiry Changes</button>
                        <?php endif; ?>
                    </form>
                </section>
            <?php elseif ($currentCollection): ?>
                <section class="dashboard-panel">
                    <h2><?php echo e($currentCollection['label']); ?></h2>
                    <p>Edit and publish content directly from this admin section.</p>

                    <form method="post" action="?section=<?php echo e($currentSection); ?>" class="collection-form" data-collection-form>
                        <input type="hidden" name="action" value="save_collection">
                        <input type="hidden" name="collection_key" value="<?php echo e($currentSection); ?>">

                        <div class="collection-list" data-collection-list>
                            <?php foreach ($currentRows as $index => $row): ?>
                                <?php echo renderRowMarkup($currentCollection['fields'], is_array($row) ? $row : [], (string) $index); ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="collection-footer">
                            <button type="button" class="btn btn-ghost" data-add-row>
                                <ion-icon name="add-outline"></ion-icon>
                                Add Item
                            </button>
                            <button type="submit" class="btn btn-primary">Save <?php echo e($currentCollection['label']); ?></button>
                        </div>

                        <template data-row-template>
                            <?php echo renderRowMarkup($currentCollection['fields'], [], '__INDEX__'); ?>
                        </template>
                    </form>
                </section>
            <?php endif; ?>
        </main>
    </div>

    <script type="module" src="assets/admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
