<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME; ?></title>
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;500;600;700&family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS customizado -->
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/style.css">
    
    <style>
        :root {
            --primary: #084176;
            --secondary: #4d8ea2;
            --accent: #f4d03f;
            --dark: #094174;
            --light: #e1e8ee;
        }

        * {
            font-family: 'Urbanist', sans-serif;
        }

        .font-pixelify {
            font-family: 'Pixelify Sans', cursive;
        }

        body {
            background: linear-gradient(to bottom, #4d8ea2, #094174);
            color: #fff;
            min-height: 100vh;
        }

        .btn-tactile {
            transition: all 0.16s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .btn-tactile:active {
            transform: scale(0.97);
        }

        .btn-tactile:hover {
            opacity: 0.85;
        }

        @keyframes float-1 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes float-2 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(-3deg); }
        }

        @keyframes float-3 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-25px) rotate(8deg); }
        }

        @keyframes float-4 {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-18px) rotate(-5deg); }
        }

        .animate-float-1 {
            animation: float-1 4s ease-in-out infinite;
        }

        .animate-float-2 {
            animation: float-2 5s ease-in-out infinite;
        }

        .animate-float-3 {
            animation: float-3 4.5s ease-in-out infinite;
        }

        .animate-float-4 {
            animation: float-4 5.5s ease-in-out infinite;
        }

        .glass-effect {
            background: rgba(225, 232, 238, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 66px;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        }

        .sidebar-liquid {
            clip-path: polygon(0 66px, 0 0, 66px 0, 100% 0, 100% 500px, 100% 540px, 85% 560px, 70% 540px, 70% 480px, 50% 480px, 50% 520px, 30% 540px, 15% 560px, 0 540px, 0 500px);
        }
    </style>
</head>
<body>
    <!-- Notificações Flash -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="errorNotification">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
        <script>
            setTimeout(() => {
                const notification = document.getElementById('errorNotification');
                if (notification) notification.remove();
            }, 5000);
        </script>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" id="successNotification">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
        <script>
            setTimeout(() => {
                const notification = document.getElementById('successNotification');
                if (notification) notification.remove();
            }, 5000);
        </script>
    <?php endif; ?>

    <!-- Conteúdo da página -->
    <?php echo $content ?? ''; ?>

    <!-- JavaScript customizado -->
    <script src="<?php echo APP_URL; ?>/js/main.js"></script>
</body>
</html>
