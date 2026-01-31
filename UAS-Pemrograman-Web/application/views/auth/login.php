<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TechPortal Admin</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
            background: #fff;
        }
        .login-header {
            background: #1e293b;
            padding: 2.5rem 2rem;
            text-align: center;
            color: #fff;
        }
        .login-body {
            padding: 2.5rem 2rem;
        }
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            border-color: #2563eb;
        }
        .btn-login {
            background-color: #2563eb;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.2s;
        }
        .btn-login:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <div class="mb-3">
                <i class="fas fa-cube fa-3x text-primary"></i>
            </div>
            <h4 class="fw-bold mb-1">Admin Portal</h4>
            <p class="text-white-50 small mb-0">Sign in to manage your content</p>
        </div>
        <div class="login-body">
            
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <div><?= $this->session->flashdata('error') ?></div>
                </div>
            <?php endif; ?>
            
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <div><?= $this->session->flashdata('success') ?></div>
                </div>
            <?php endif; ?>

            <?= validation_errors('<div class="alert alert-warning small mb-4">', '</div>'); ?>

            <form action="<?= base_url('auth/login') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label text-secondary small fw-bold">USERNAME</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                        <input type="text" name="username" class="form-control border-start-0 ps-0" placeholder="Enter username" required autofocus>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="form-label text-secondary small fw-bold">PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control border-start-0 ps-0" placeholder="Enter password" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-login text-white">
                    Sign In <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>
        </div>
        <div class="text-center pb-4 text-muted small">
            &copy; 2026 TechPortal CMS
        </div>
    </div>

</body>
</html>
