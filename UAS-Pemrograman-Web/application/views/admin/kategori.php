<div class="row">
    <!-- Form Kategori -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="fas fa-plus-circle me-2"></i>Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <?= validation_errors('<div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>', '</div>'); ?>

                <form action="<?= base_url('admin/kategori') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">NAMA KATEGORI</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Teknologi" value="<?= set_value('nama') ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-secondary">DESKRIPSI</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Deskripsi singkat..."><?= set_value('deskripsi') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Daftar Kategori -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="fas fa-list me-2"></i>Daftar Kategori</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0">Nama</th>
                                <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0">Slug</th>
                                <th class="px-4 py-3 text-secondary text-uppercase small fw-bold border-0 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($kategori)): ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Belum ada kategori</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($kategori as $k): ?>
                                <tr>
                                    <td class="px-4 fw-bold text-dark"><?= htmlspecialchars($k['nama']) ?></td>
                                    <td class="px-4 text-muted small"><?= htmlspecialchars($k['slug']) ?></td>
                                    <td class="px-4 text-end">
                                        <a href="<?= base_url('admin/hapus_kategori/'.$k['id']) ?>" class="btn btn-sm btn-outline-danger rounded-circle" onclick="return confirm('Yakin hapus kategori ini?')" title="Hapus">
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
    </div>
</div>
