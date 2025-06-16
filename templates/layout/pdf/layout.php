<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= h($this->fetch('title')) ?></title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .container { margin: 0 auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>