<div class="container mb-5">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark m-0"><i class="fas fa-fire text-primary me-2"></i>Artikel Terbaru</h2>
            </div>
            
            <?php if(empty($artikel)): ?>
                <div class="alert alert-info border-0 shadow-sm rounded-3">
                    <i class="fas fa-info-circle me-2"></i> Belum ada artikel yang dipublikasikan.
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach($artikel as $item): ?>
                        <div class="col-md-6">
                            <div class="custom-card h-100 d-flex flex-column">
                                <div class="card-img-top-wrapper">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-muted">
                                        <i class="fas fa-image fa-3x opacity-25"></i>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-2">
                                        <small class="text-muted"><i class="far fa-calendar me-1"></i> <?= date('d M Y', strtotime($item['tanggal_dibuat'])) ?></small>
                                    </div>
                                    <h5 class="card-title fw-bold mb-3">
                                        <a href="<?= base_url('welcome/artikel/'.$item['slug']) ?>" class="article-title-link">
                                            <?= htmlspecialchars($item['judul']) ?>
                                        </a>
                                    </h5>
                                    <p class="card-text text-secondary small flex-grow-1">
                                        <?= word_limiter(strip_tags($item['konten']), 20) ?>
                                    </p>
                                    <div class="mt-3">
                                        <a href="<?= base_url('welcome/artikel/'.$item['slug']) ?>" class="btn btn-outline-primary btn-sm rounded-pill">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Search -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Pencarian</h5>
                    <form action="<?= base_url('welcome/search') ?>" method="get">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control bg-light border-0" placeholder="Cari artikel..." required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Kategori</h5>
                        <?php if(!empty($kategori)): ?>
                            <div class="d-flex flex-wrap gap-2">
                            <?php foreach($kategori as $kat): ?>
                                <a href="<?= base_url('welcome/kategori/'.$kat['slug']) ?>" class="badge-category">
                                    <?= htmlspecialchars($kat['nama']) ?>
                                </a>
                            <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0">Tidak ada kategori</p>
                        <?php endif; ?>
                </div>
            </div>

            <!-- Info -->
            <div class="card border-0 shadow-sm rounded-3 bg-dark text-white">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-white"><i class="fas fa-code me-2"></i>TechPortal Specs</h5>
                    <p class="small opacity-75 mb-0">
                        Built on CodeIgniter 3. <br>
                        Powered by Bootstrap 5.3 & FontAwesome 6. <br>
                        Optimized for speed.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
