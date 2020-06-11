<?php
require_once('scr.php');
$site_key = '6LdxdvUUAAAAAC787QRuDWo3hm4_i4DTYS10fQiS'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
$secret_key = '6LdxdvUUAAAAALwXeTGq4GMZ_R8RRPZ2WlG21aRh'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki




//jika berhasil/ada post['id'], jika tidak ada ya tidak dijalankan
if ($_POST['id']) {

    $id = $_POST['id'];
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, "http://lokeritas.xyz/api-v1/karyakuDetail.php?id_karyaku=$id");
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $results = curl_exec($curl_get);
    curl_close($curl_get);

    $result = json_decode($results, true);
    //Semua Tips
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/karyaku_comments.php?id_karyaku=' . $id . '');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get_comment = curl_exec($curl_get);
    curl_close($curl_get);

    $result_get_comment = json_decode($result_get_comment, true);

    
}
?>

<!-- Modal Header -->
<div class="modal-header">
    <div class="container">
        <div class="row">
            <div class="col-1">
                <img src="<?= $result[0]['foto']; ?>" width="60px">
            </div>
            <div class="col-10" style="padding-left: 30px">
                <h5 style="margin-bottom:0px"><?= $result[0]['judul']; ?></h5>
                <p>oleh <a href="#" class="text-danger"><?= $result[0]['nama_depan'] . ' ' . $result[0]['nama_belakang']; ?></a></p>
            </div>
            <div class="col-1">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal body -->
<div class="modal-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="<?= $result[0]['gambar']; ?>" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-4 pt-2" style="margin:0px 0px 0px 0px !important">
                <div>
                    <!--end row-->
                    <div class="row pt-2">
                        <div class="col-12">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">
                                    <div class="container" style="padding: 0px 0px 0px 0px ! important">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="job-detail">
                                                            <div class="job-detail-desc">
                                                                <p class="text-dark mb-3"><?= $result[0]['deskripsi']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="job-detail">
                                                            <div class="job-detail-desc">
                                                                <p style="font-weight: bold;margin-bottom: 0px ! important"><i class="mdi mdi-comment-text"></i> <?= count($result_get_comment); ?> Komentar</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="rounded border mt-4 p-4">
                                                    <h5 class="text-dark">Komentar</h5>
                                                    <?php
                                                    foreach ($result_get_comment as $row) : ?>

                                                        <hr id="hr">
                                                        <img data-name="<?= $row['nama_depan'] . ' ' . $row['nama_belakang']; ?>" class="initial" style="border-radius: 5px;" width="30px">
                                                        <a href="http://<?php echo $row['email']; ?>"><?= $row['nama_depan'] . ' ' . $row['nama_belakang']; ?></a><span style="color: #a3a4a4;"> (<?php echo $row['email']; ?>)</span><br><span style="font-size: 30px;">&ldquo;</span> <?php echo $row['komentar']; ?>
                                                        <br>
                                                        <script>
                                                            $('.initial').initial();
                                                        </script>
                                                    <?php
                                                    endforeach; ?>


                                                </div>
                                                <div class="row bg-light rounded mx-auto mt-5" style="padding:20px">
                                                    <form name="contact-form" method="post" action="" style="width: 100%;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group blog-details-form">
                                                                    <i class="mdi mdi-comment-processing text-muted f-17"></i>
                                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                                    <textarea name="komentar" id="comments" rows="4" class="form-control blog-details" placeholder="Komentar" required=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div><br>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Kirim Komentar">
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- /form -->
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0">
                                                <div class="job-detail">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p class="text-dark">Pengguna ini siap untuk bekerja !</p>
                                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#hireSaya"><i class="mdi mdi-email"></i> Hire Saya</a>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <div class="single-post-item mb-2">
                                                                <div class="float-left mr-3">
                                                                    <i class="mdi mdi-tag text-muted mdi-24px"></i>
                                                                </div>
                                                                <div class="overview-details">
                                                                    <h6 class="text-muted mt-1"><?= $result[0]['tag']; ?></h6>
                                                                </div>
                                                            </div>
                                                            <div class="single-post-item mb-2">
                                                                <div class="float-left mr-3">
                                                                    <i class="mdi mdi-eye text-muted mdi-24px"></i>
                                                                </div>
                                                                <div class="overview-details">
                                                                    <h6 class="text-muted mt-1"><?= $result[0]['hit']; ?></h6>
                                                                </div>
                                                            </div>
                                                            <div class="single-post-item mb-4">
                                                                <div class="float-left mr-3">
                                                                    <i class="mdi mdi-calendar-today text-muted mdi-24px"></i>
                                                                </div>
                                                                <div class="overview-details">
                                                                    <h6 class="text-muted mt-1"><?= date("d F Y", strtotime($result['0']['published'])); ?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end teb pane-->
                            </div>
                            <!--end tab content-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
</div>