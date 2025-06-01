<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Data Libur</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary shadow-lg">
                    <div class="card-header">
                        <h3 class="card-title">Update Data Libur</h3>
                    </div>

                    <form action="<?= base_url('/hr/update-libur') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div id="form-libur-wrapper">
                                <!-- Form pertama -->
                                <div class="form-libur-row row mb-3">
                                    <div class="col-md-4">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal[]" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Keterangan</label>
                                        <select class="form-control" name="keterangan[]" required>
                                            <option value="libur">Libur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button type="button" class="btn btn-success btn-add-form">+ Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            <a href="<?= base_url('hr/master-data-jadwal') ?>" class="btn btn-danger btn-lg">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Script Tambah/Hapus Form -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('form-libur-wrapper');

        function updateButtons() {
            const allRows = wrapper.querySelectorAll('.form-libur-row');
            allRows.forEach((row, index) => {
                const buttonContainer = row.querySelector('.col-md-4.d-flex');
                buttonContainer.innerHTML = '';

                const button = document.createElement('button');
                button.type = 'button';

                if (index === allRows.length - 1) {
                    // Baris terakhir => tombol tambah
                    button.className = 'btn btn-success btn-add-form';
                    button.textContent = '+ Tambah';
                } else {
                    // Baris sebelumnya => tombol hapus
                    button.className = 'btn btn-danger btn-remove-form';
                    button.textContent = '- Hapus';
                }

                buttonContainer.appendChild(button);
            });
        }

        wrapper.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-add-form')) {
                const row = e.target.closest('.form-libur-row');
                const clone = row.cloneNode(true);

                // Kosongkan input
                clone.querySelector('input').value = '';
                clone.querySelector('select').value = 'libur';

                wrapper.appendChild(clone);
                updateButtons();
            }

            if (e.target.classList.contains('btn-remove-form')) {
                e.target.closest('.form-libur-row').remove();
                updateButtons();
            }
        });

        // Jalankan pertama kali
        updateButtons();
    });
</script>

