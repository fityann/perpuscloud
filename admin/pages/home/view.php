<div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden bg-[#1a222c]">
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 pt-20 gap-4 md:grid-cols-3 md:gap-6 2xl:gap-7.5">

                <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] px-7.5 py-6 shadow-default">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-[#313d4a] text-primary mb-4">
                        <i class="fa-solid fa-users-gear text-lg text-white"></i>
                    </div>
                    <div class="flex items-end justify-between">
                        <div>
                            <h4 class="text-2xl font-bold text-white">
                                <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM users")); ?>
                            </h4>
                            <span class="text-sm font-medium text-gray-400">Total Petugas</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] px-7.5 py-6 shadow-default">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-[#313d4a] text-success mb-4">
                        <i class="fa-solid fa-user-group text-lg text-white"></i>
                    </div>
                    <div class="flex items-end justify-between">
                        <div>
                            <h4 class="text-2xl font-bold text-white">
                                <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM anggota")); ?>
                            </h4>
                            <span class="text-sm font-medium text-gray-400">Total Anggota</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] px-7.5 py-6 shadow-default">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-[#313d4a] text-secondary mb-4">
                        <i class="fa-solid fa-book-open text-lg text-white"></i>
                    </div>
                    <div class="flex items-end justify-between">
                        <div>
                            <h4 class="text-2xl font-bold text-white">
                                <?php
                                $res = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(stok) as total FROM buku"));
                                echo $res['total'] ?? 0;
                                ?>
                            </h4>
                            <span class="text-sm font-medium text-gray-400">Total Stok Buku</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7.5">
                <div class="col-span-12 xl:col-span-8 rounded-sm border border-[#2e3a47] bg-[#24303f] px-5 pt-7.5 pb-5 shadow-default sm:px-7.5">
                    <div class="flex flex-wrap items-start justify-between gap-3 sm:flex-nowrap mb-6">
                        <div>
                            <h4 class="text-xl font-bold text-white">Statistik Peminjaman</h4>
                            <p class="text-sm font-medium text-gray-400">Data 7 hari terakhir</p>
                        </div>
                    </div>
                    <div class="w-full h-80">
                        <canvas id="chartPeminjaman"></canvas>
                    </div>
                </div>

                <div class="col-span-12 xl:col-span-4 rounded-sm border border-[#2e3a47] bg-[#24303f] p-6 shadow-default">
                    <h4 class="text-xl font-bold text-white mb-2">Status Perpustakaan</h4>
                    <p class="text-sm text-gray-400 mb-6">Persentase buku yang sedang dipinjam saat ini.</p>

                    <div class="relative flex justify-center items-center my-4">
                        <div class="text-center text-white">
                            <?php
                            $total_buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(stok) as t FROM buku"))['t'];
                            $total_pinjam = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM peminjaman WHERE status='dipinjam'"));
                            $persen = ($total_buku > 0) ? round(($total_pinjam / $total_buku) * 100, 2) : 0;
                            ?>
                            <h2 class="text-5xl font-extrabold text-primary"><?= $persen ?>%</h2>
                            <p class="text-gray-400 mt-2 italic text-xs">Buku di tangan peminjam</p>
                        </div>
                    </div>

                    <div class="mt-10 space-y-4">
                        <div class="flex items-center justify-between border-b border-[#2e3a47] pb-2">
                            <span class="text-gray-400">Buku Dipinjam</span>
                            <span class="text-white font-bold"><?= $total_pinjam ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Total Koleksi</span>
                            <span class="text-white font-bold"><?= $total_buku ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
$labels = [];
$data_count = [];
for ($i = 6; $i >= 0; $i--) {
    $d = date('Y-m-d', strtotime("-$i days"));
    $labels[] = date('d M', strtotime($d));
    $q = mysqli_query($koneksi, "SELECT COUNT(id) as total FROM peminjaman WHERE DATE(tanggal_pinjam) = '$d'");
    $data_count[] = mysqli_fetch_assoc($q)['total'];
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chartPeminjaman').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label: 'Jumlah Pinjam',
                    data: <?= json_encode($data_count) ?>,
                    borderColor: '#3C50E0',
                    backgroundColor: 'rgba(60, 80, 224, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointBackgroundColor: '#3C50E0'
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: '#2e3a47'
                        },
                        ticks: {
                            color: '#64748B'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#64748B'
                        }
                    }
                }
            }
        });
    });
</script>