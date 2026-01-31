<div class="container mb-5">
    <div class="row">
        <!-- Main Content Area -->
        <div class="col-lg-8">
            <div class="mb-5">
                <h2 class="fw-bold mb-3">Hasil Pencarian</h2>
                <p class="lead text-secondary">
                    Menampilkan hasil untuk: <span class="fw-bold text-dark">"<?= htmlspecialchars($keyword) ?>"</span>
                </p>
            </div>
            
            <?php if(empty($artikel)): ?>
                <div class="text-center py-5">
                    <div class="mb-3 text-muted">
                        <i class="fas fa-search fa-4x opacity-25"></i>
                    </div>
                    <h4 class="fw-bold">Tidak ditemukan</h4>
                    <p class="text-secondary">Maaf, kami tidak dapat menemukan artikel yang cocok dengan kata kunci tersebut.</p>
                    <a href="<?= base_url() ?>" class="btn btn-primary rounded-pill mt-3">Kembali ke Beranda</a>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach($artikel as $item): ?>
                        <div class="col-md-6">
                            <div class="custom-card h-100 d-flex flex-column">
                                <div class="card-img-top-wrapper">
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light text-muted">
                                        <i class="fas fa-file-alt fa-3x opacity-25"></i>
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
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Cari Lagi</h5>
                    <form action="<?= base_url('welcome/search') ?>" method="get">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control bg-light border-0" value="<?= htmlspecialchars($keyword) ?>" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

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
        </div>
    </div>
</div>
