<!DOCTYPE html>
<html lang="id">
<?php
session_start();
if (!isset($_SESSION['status_login']) && $_SESSION['status_login'] !== true) {
    $_SESSION['message'] = "Please login to access the admin dashboard.";
    header('Location: ../index.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpus Cloud</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#3C50E0', // Warna Biru khas TailAdmin
                        secondary: '#80CAEE',
                        dark: '#1C2434',
                        body: '#64748B',
                        success: '#10B981', // Hijau
                        danger: '#FB5454', // Merah
                        bglight: '#F1F5F9',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        /* Chart Animations */
        @keyframes growUp {
            from {
                height: 0;
            }

            to {
                height: var(--h);
            }
        }

        .bar-animate {
            animation: growUp 1s ease-out forwards;
        }
    </style>
</head>

<body class="relative bg-bglight font-sans text-dark antialiased">
    <?php include '../template/navbar.php'; ?>
    <div class="flex h-screen overflow-hidden">
        <?php include '../template/sidebar.php'; ?>

        <?php include 'content.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>