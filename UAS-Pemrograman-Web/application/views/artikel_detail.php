<div class="container mb-5">
    <div class="row">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= character_limiter($artikel['judul'], 20) ?></li>
                </ol>
            </nav>

            <article class="bg-white rounded-3 shadow-sm p-4 p-md-5 mb-5">
                <header class="mb-4">
                    <div class="mb-3">
                         <!-- Dynamically try to find the category badge if available, otherwise skip or do a DB join in model if needed. 
                              Since $artikel doesn't explicitly have category name here without join, we skip or rely on data passed.
                              User didn't provide complete model, so assuming standard fields. -->
                         <span class="badge bg-primary bg-opacity-10 text-primary">Artikel</span>
                    </div>
                    <h1 class="fw-bold display-6 mb-3"><?= htmlspecialchars($artikel['judul']) ?></h1>
                    <div class="d-flex align-items-center text-muted small border-bottom pb-4">
                        <span class="me-3"><i class="far fa-user me-1"></i> <?= htmlspecialchars($artikel['penulis']) ?></span>
                        <span class="me-3"><i class="far fa-calendar me-1"></i> <?= date('d M Y', strtotime($artikel['tanggal_dibuat'])) ?></span>
                        <span><i class="far fa-eye me-1"></i> <?= $artikel['views'] ?> views</span>
                    </div>
                </header>
                
                <div class="article-content fs-5 text-secondary" style="line-height: 1.8;">
                    <?= $artikel['konten'] ?>
                </div>
                
                <hr class="my-5">
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url() ?>" class="btn btn-light rounded-pill"><i class="fas fa-arrow-left me-2"></i> Kembali</a>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-sm btn-outline-info rounded-circle"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-sm btn-outline-secondary rounded-circle"><i class="fas fa-link"></i></button>
                    </div>
                </div>
            </article>
        </div>

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
            
            <!-- Latest/Related could go here -->
        </div>
    </div>
</div>
