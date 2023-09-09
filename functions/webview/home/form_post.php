<?php
function webview__home__form_post($data){
    ?>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <?php
                if ($data['allow_post']){
                    ?>
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Buat Postingan Baru</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <textarea class="form-control" name="text" placeholder="Tulis pesanmu di sini.."></textarea>
                            </div>
                            <div>
                                <div class="form-group row">
                                    <label for="fileToUpload" class="col-sm-2 col-form-label">Media</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/*" placeholder="upload gambar">
                                        <small>
                                            (Jika menambahkan media, biaya media akan diterapkan 
                                            <button type="button" onclick="document.getElementById('fileToUpload').value=''" style='font-size: smaller;'>kosongkan media</button>)
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 text-right">
                                <button type="submit" class=" btn btn-primary shadow-sm" onClick="this.form.submit(); this.disabled=true; this.value='Mengirim...'; ">
                                    <i class="fas fa-paper-plane fa-sm text-white-50"></i> Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger text-white">
                        <h6 class="m-0 font-weight-bold text-white">Tidak Bisa Membuat Postingan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body bg-light-danger">
                        Kuota menfess utama telah mencapai batas maksimum. Silakan tunggu.
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Biaya</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="m-3">
                        bla bla bla
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    

    <?php    
    return true;
}
    