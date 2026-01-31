<div class="row g-4 mb-5">
    <!-- Stats Cards -->
    <div class="col-md-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-white-50 text-uppercase fw-bold mb-1">Total Artikel</h6>
                        <h2 class="mb-0 fw-bold"><?= $total_artikel ?></h2>
                    </div>
                    <div class="p-2 bg-white bg-opacity-25 rounded">
                        <i class="fas fa-file-alt fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-white-50 text-uppercase fw-bold mb-1">Total Views</h6>
                        <h2 class="mb-0 fw-bold"><?= $total_views ?></h2>
                    </div>
                    <div class="p-2 bg-white bg-opacity-25 rounded">
                        <i class="fas fa-eye fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="text-white-50 text-uppercase fw-bold mb-1">Status</h6>
                        <h2 class="mb-0 fw-bold">Active</h2>
                    </div>
                    <div class="p-2 bg-white bg-opacity-25 rounded">
                        <i class="fas fa-server fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
        <h6 class="m-0 fw-bold text-primary"><i class="fas fa-list me-2"></i>Daftar Artikel</h6>
        <a href="<?= base_url('admin/tambah') ?>" class="btn btn-sm btn-primary rounded-pill px-3"><i class="fas fa-plus me-1"></i> Tambah Baru</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0">Judul</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0">Info</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0">Status</th>
                        <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($artikel)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 opacity-25"></i>
                                <p>Belum ada artikel</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($artikel as $a): ?>
                        <tr>
                            <td class="px-4">
                                <div class="fw-bold text-dark"><?= htmlspecialchars($a['judul']) ?></div>
                                <div class="small text-muted text-truncate" style="max-width: 300px;">
                                    <?= htmlspecialchars($a['slug']) ?>
                                </div>
                            </td>
                            <td class="px-4">
                                <div class="small text-muted"><i class="far fa-user me-1"></i> <?= htmlspecialchars($a['penulis']) ?></div>
                                <div class="small text-muted"><i class="far fa-calendar me-1"></i> <?= date('d M Y', strtotime($a['tanggal_dibuat'])) ?></div>
                            </td>
                            <td class="px-4">
                                <?php if($a['status'] == 'published'): ?>
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">Published</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Draft</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 text-end">
                                <a href="<?= base_url('admin/edit/'.$a['id']) ?>" class="btn btn-sm btn-outline-primary rounded-circle" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="<?= base_url('admin/hapus/'.$a['id']) ?>" class="btn btn-sm btn-outline-danger rounded-circle ms-1" onclick="return confirm('Yakin hapus artikel ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
