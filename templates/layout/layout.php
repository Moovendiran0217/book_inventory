<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Books</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha384-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?= $this->Html->css(['layout']) ?>
    <?= $this->fetch('css') ?>
</head>

<body class="d-flex flex-column min-vh-100">
    
    <header class="sticky-top">
        <?php
        $role = $this->request->getAttribute('identity');
        if ($role && $role->get('role') === 'Admin') {
            echo $this->element('admin_header');
        } else if ($role && $role->get('role') === 'User') {
            echo $this->element('user_header');
        } else {
            echo '<p class="display-5 fw-semibold ms-3 ms-lg-5 text-white"><span class="text-warning fw-bold">Zara</span> Books</p>';
        }
        ?>
    </header>

    <main class="my-3">
        <?= $this->fetch('content'); ?>
    </main>

    <footer class="text-white text-center mt-auto p-3">
        <p>&copy 2025 Zara Books. All Rights Reserved</p>
    </footer>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-IhbD0b/5WcK1OhGzYY+yHbCjkYwGnKhNkKo7/Ov+AXkUGXvZcKqdb4iA1Yk3oG4t" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

<script>
    setTimeout(function() {
        var flashMessages = document.querySelectorAll('.flash-message, .message, .flash');
        flashMessages.forEach(function(msg) {
            msg.style.display = 'none';
        });
    }, 2000); // 2000 milliseconds = 2 seconds
</script>

</html>