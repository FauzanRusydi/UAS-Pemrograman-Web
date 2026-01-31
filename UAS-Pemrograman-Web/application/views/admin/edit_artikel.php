<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="fas fa-edit me-2"></i>Edit Artikel</h6>
            </div>
            <div class="card-body p-4">
                <?= validation_errors('<div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>', '</div>'); ?>

                <form action="<?= base_url('admin/edit/'.$artikel['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">JUDUL ARTIKEL</label>
                        <input type="text" name="judul" class="form-control" value="<?= set_value('judul', $artikel['judul']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary">KONTEN</label>
                        <textarea name="konten" class="form-control" rows="15" required><?= set_value('konten', $artikel['konten']) ?></textarea>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                             <label class="form-label fw-bold small text-secondary">KATEGORI</label>
                             <div class="card bg-light border-0">
                                 <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                                     <?php 
                                        // $artikel_kategori is already an array of IDs from the controller
                                        $current_cats = $artikel_kategori ?? [];
                                     ?>
                                     <?php if(empty($kategori)): ?>
                                        <p class="text-muted small fst-italic mb-0">Belum ada kategori.</p>
                                     <?php else: ?>
                                        <?php foreach($kategori as $k): ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="kategori_id[]" value="<?= $k['id'] ?>" id="cat_<?= $k['id'] ?>" <?= in_array($k['id'], $current_cats) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="cat_<?= $k['id'] ?>">
                                                    <?= htmlspecialchars($k['nama']) ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                     <?php endif; ?>
                                 </div>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-secondary">STATUS PUBLIKASI</label>
                            <select name="status" class="form-select">
                                <option value="published" <?= $artikel['status'] == 'published' ? 'selected' : '' ?>>Published (Tayang)</option>
                                <option value="draft" <?= $artikel['status'] == 'draft' ? 'selected' : '' ?>>Draft (Konsep)</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end border-top pt-4">
                        <a href="<?= base_url('admin') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
