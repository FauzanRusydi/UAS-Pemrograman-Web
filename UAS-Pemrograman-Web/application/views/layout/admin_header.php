<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title . ' - ' : '' ?>Admin CMS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bs-primary: #2563eb;
            --bs-secondary: #475569;
            --bs-body-bg: #f1f5f9;
        }
        
        body {
            font-family: 'Manrope', sans-serif;
            background-color: var(--bs-body-bg);
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            background: #1e293b;
            color: #fff;
            padding-top: 1rem;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }
        
        .sidebar-brand {
            padding: 0 1.5rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-link {
            color: #94a3b8;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-right: 3px solid var(--bs-primary);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 2rem;
        }
        
        /* Top Navbar */
        .top-navbar {
            background: #fff;
            padding: 1rem 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Mobile Toggle -->
    <button class="btn btn-primary d-lg-none position-fixed bottom-0 end-0 m-3 rounded-circle shadow p-3" style="z-index: 1050;" onclick="document.querySelector('.sidebar').classList.toggle('show')">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <nav class="sidebar">
        <a href="<?= base_url('admin') ?>" class="sidebar-brand">
            <i class="fas fa-cube me-2 text-primary"></i> CMS Admin
        </a>
        
        <div class="d-flex align-items-center px-4 py-4 text-white">
            <div class="avatar bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                <i class="fas fa-user"></i>
            </div>
            <div>
                <small class="text-secondary d-block" style="font-size: 0.75rem;">Logged as</small>
                <div class="fw-bold"><?= $this->session->userdata('nama_lengkap') ?></div>
            </div>
        </div>
        
        <ul class="nav flex-column mt-2">
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == '') ? 'active' : '' ?>" href="<?= base_url('admin') ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'tambah') ? 'active' : '' ?>" href="<?= base_url('admin/tambah') ?>">
                    <i class="fas fa-plus-circle"></i> Tambah Artikel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(2) == 'kategori') ? 'active' : '' ?>" href="<?= base_url('admin/kategori') ?>">
                    <i class="fas fa-folder"></i> Kategori
                </a>
            </li>
            <div class="my-3 mx-4 border-top border-secondary opacity-25"></div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Lihat Website
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="<?= base_url('auth/logout') ?>" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar in Main Content -->
        <div class="top-navbar">
            <h4 class="mb-0 fw-bold text-dark"><?= isset($page_title) ? $page_title : 'Dashboard' ?></h4>
            <div class="text-secondary small">
                <?= date('l, d F Y') ?>
            </div>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> <?= $this->session->flashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
