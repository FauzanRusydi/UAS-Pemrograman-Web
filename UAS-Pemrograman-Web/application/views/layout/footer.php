    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3"><i class="fas fa-cube me-2"></i>TechPortal</h5>
                    <p class="text-secondary small">portal berita dan artikel teknologi terkini dengan desain modern dan performa cepat.</p>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled text-secondary">
                        <li><a href="<?= base_url() ?>" class="text-decoration-none text-secondary hover-white">Beranda</a></li>
                        <li><a href="<?= base_url('auth/login') ?>" class="text-decoration-none text-secondary hover-white">Login Admin</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                    <p class="text-secondary small">info@techportal.com</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-secondary small">
                &copy; <?= date('Y') ?> TechPortal CMS. All rights reserved. CodeIgniter 3 Project.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .hover-white:hover { color: #fff !important; }
    </style>
</body>
</html>
