<?php

$urutan = $_GET['urutan'];
$id = $_GET['id'];

$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/lamaranUser.php?id_user=' . $id);
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl_get);
curl_close($curl_get);

$lamaranTerlama = json_decode($result, true);
$lamaranTerbaru = array_reverse($lamaranTerlama);

$jlhDataPerHalaman= 6;
$jlhData = count($lamaranTerbaru);
$jlhHalaman = ceil($jlhData / $jlhDataPerHalaman);
$halamanAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataPerHalaman * $halamanAktif) - $jlhDataPerHalaman;


$dataLimitBaru = array_slice($lamaranTerbaru, $awalData, $jlhDataPerHalaman);
$dataLimitLama = array_slice($lamaranTerlama, $awalData, $jlhDataPerHalaman);

?>

<?php if ($urutan == 'terbaru') : ?>
    <div class="row" id="daftarLamaran">
        <?php foreach ($dataLimitBaru as $data) : ?>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog position-relative overflow-hidden shadow rounded" style="box-shadow: 1px 4px 8px 1px #e1e0e0 ! important">
                    <div class="position-relative overflow-hidden">
                        <img src="<?= $data['logo']; ?>" style="width: 180px" alt="" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="content p-4 bg-light">
                        <h4><a href="#" class="title text-dark"><?= $data['nama_pekerjaan']; ?></a></h4>
                        <p class="text-muted"><?= $data['email']; ?></p>
                        <p class="text-info" style="margin-bottom: 0px"><i class="mdi mdi-send"></i> Dikirim Tanggal : <?= $data['tgl_submit']; ?></p>
                        <?php if ($data['status'] == '0') : ?>
                            <p class="text-primary"><i class="mdi mdi-file-restore"></i> Status : Menunggu</p>
                        <?php elseif ($data['status'] == '1') : ?>
                            <p class="text-info"><i class="mdi mdi-book-open"></i> Status : Review</p>
                        <?php elseif ($data['status'] == '2') : ?>
                            <p class="text-warning"><i class="mdi mdi-calendar-clock"></i> Status : Pending</p>
                        <?php elseif ($data['status'] == '3') : ?>
                            <p class="text-success"><i class="mdi mdi-checkbox-marked-circle"></i> Status : Diterima</p>
                        <?php elseif ($data['status'] == '4') : ?>
                            <p class="text-danger"><i class="mdi mdi-close-circle"></i> Status : Ditolak</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!--end col-->
        <?php endforeach; ?>

        <div class="col-lg-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination job-pagination justify-content-center mb-0">
                    <li class="page-item">
                        <?php if ($halamanAktif > 1) : ?>
                            <a class="page-link" href="?hal=<?= $halamanAktif - 1; ?>">
                                <i class="mdi mdi-chevron-double-left f-15"></i>
                            </a>
                        <?php else : ?>
                            <a class="page-link" href="?hal=<?= 1; ?>">
                                <i class="mdi mdi-chevron-double-left f-15"></i>
                            </a>
                        <?php endif; ?>
                    </li>

                    <?php for ($i = 1; $i <= $jlhHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <li class="page-item">
                        <?php if ($halamanAktif < $jlhHalaman) : ?>
                            <a class="page-link" href="?hal=<?= $halamanAktif + 1; ?>">
                                <i class="mdi mdi-chevron-double-right f-15"></i>
                            </a>
                        <?php else : ?>
                            <a class="page-link" href="?hal=<?= $jlhHalaman; ?>">
                                <i class="mdi mdi-chevron-double-right f-15"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
<?php elseif ($urutan == 'terlama') : ?>
    <div class="row" id="daftarLamaran">
        <?php foreach ($dataLimitLama as $data) : ?>
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="blog position-relative overflow-hidden shadow rounded" style="box-shadow: 1px 4px 8px 1px #e1e0e0 ! important">
                    <div class="position-relative overflow-hidden">
                        <img src="<?= $data['logo']; ?>" style="width: 180px" alt="" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="content p-4 bg-light">
                        <h4><a href="#" class="title text-dark"><?= $data['nama_pekerjaan']; ?></a></h4>
                        <p class="text-muted"><?= $data['email']; ?></p>
                        <p class="text-info" style="margin-bottom: 0px"><i class="mdi mdi-send"></i> Dikirim Tanggal : <?= $data['tgl_submit']; ?></p>
                        <?php if ($data['status'] == '0') : ?>
                            <p class="text-primary"><i class="mdi mdi-file-restore"></i> Status : Menunggu</p>
                        <?php elseif ($data['status'] == '1') : ?>
                            <p class="text-info"><i class="mdi mdi-book-open"></i> Status : Review</p>
                        <?php elseif ($data['status'] == '2') : ?>
                            <p class="text-warning"><i class="mdi mdi-calendar-clock"></i> Status : Pending</p>
                        <?php elseif ($data['status'] == '3') : ?>
                            <p class="text-success"><i class="mdi mdi-checkbox-marked-circle"></i> Status : Diterima</p>
                        <?php elseif ($data['status'] == '4') : ?>
                            <p class="text-danger"><i class="mdi mdi-close-circle"></i> Status : Ditolak</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!--end col-->
        <?php endforeach; ?>
        <div class="col-lg-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination job-pagination justify-content-center mb-0">
                    <li class="page-item">
                        <?php if ($halamanAktif > 1) : ?>
                            <a class="page-link" href="?hal=<?= $halamanAktif - 1; ?>">
                                <i class="mdi mdi-chevron-double-left f-15"></i>
                            </a>
                        <?php else : ?>
                            <a class="page-link" href="?hal=<?= 1; ?>">
                                <i class="mdi mdi-chevron-double-left f-15"></i>
                            </a>
                        <?php endif; ?>
                    </li>

                    <?php for ($i = 1; $i <= $jlhHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <li class="page-item active"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <li class="page-item">
                        <?php if ($halamanAktif < $jlhHalaman) : ?>
                            <a class="page-link" href="?hal=<?= $halamanAktif + 1; ?>">
                                <i class="mdi mdi-chevron-double-right f-15"></i>
                            </a>
                        <?php else : ?>
                            <a class="page-link" href="?hal=<?= $jlhHalaman; ?>">
                                <i class="mdi mdi-chevron-double-right f-15"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
        
    </div>
<?php endif; ?>