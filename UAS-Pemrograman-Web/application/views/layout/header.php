docker<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>TechPortal CMS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts: Manrope -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bs-primary: #2563eb; /* Royal Blue */
            --bs-secondary: #475569; /* Slate */
            --bs-body-bg: #f8fafc;
            --bs-body-color: #1e293b;
        }
        
        body {
            font-family: 'Manrope', sans-serif;
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            line-height: 1.6;
        }
        
        /* Navbar Customization */
        .navbar-custom {
            background-color: #1e293b;
            padding: 1rem 0;
            backdrop-filter: blur(10px);
        }
        
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #fff !important;
        }

        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            font-weight: 500;
            margin: 0 10px;
            border-radius: 5px;
            transition: all 0.2s;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #fff !important;
            background-color: rgba(255,255,255,0.1);
        }

        /* Card Styles */
        .custom-card {
            border: none;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .card-img-top-wrapper {
            position: relative;
            overflow: hidden;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            height: 200px; /* Fixed height for consistency */
            background-color: #e2e8f0;
        }

        .card-img-top-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .custom-card:hover .card-img-top-wrapper img {
            transform: scale(1.05);
        }

        /* Badge Styles */
        .badge-category {
            background-color: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            padding: 0.5em 1em;
            border-radius: 9999px; /* Pill */
            text-decoration: none;
            font-size: 0.75rem;
            transition: all 0.2s;
        }

        .badge-category:hover {
            background-color: #0369a1;
            color: #fff;
        }

        /* Hero Section (if used) */
        .main-hero {
            background: #1e293b;
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Article Typography */
        .article-title-link {
            color: #1e293b;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }

        .article-title-link:hover {
            color: var(--bs-primary);
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-cube me-2"></i>TechPortal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Home</a>
                    </li>
                    <?php if(isset($kategori) && !empty($kategori)): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown">
                                Kategori
                            </a>
                            <ul class="dropdown-menu border-0 shadow-lg">
                                <?php foreach($kategori as $k): ?>
                                    <li><a class="dropdown-item" href="<?= base_url('kategori/'.$k['slug']) ?>"><?= $k['nama_kategori'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-outline-light ms-2 px-4" href="<?= base_url('auth/login') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="py-4">
