<div class="modal fade" id="gantiVoucher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <span class="fz-14 fw-600 modal-title" id="exampleModalLabel">Pilih Voucher</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 mb-4 bg-voucher-abu py-4 d-flex align-items-center justify-content-center gap-2">
                <div class="left d-none d-lg-block">
                    <span class="fz-12 fw-600">Tambah Voucher</span>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2 fz-12" type="text" placeholder="Masukkan Kode Voucher">
                    <button class="btn-voucher fz-12 text-light btn-voucher-abu px-3 d-flex align-items-center justify-content-center">
                        Pakai
                    </button>
                </form>
            </div>
            <?php foreach($vouchers as $v) : ?>
            <?php if(time() < strtotime($v['expiry'])) { ?>
            <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                <div class="col-12 d-flex align-items-center gap-2">
                    <img src="assets/img/gratisongkir.png" alt="" class="gratisongkir">
                    <div class="d-flex flex-column">
                        <span class="fz-12">Min. Belanja Rp. <?= $v['min_buy'] ?></span>
                        <span class="fz-10 blue">Berakhir dlm 9 jam</span>
                    </div>
                    <input type="radio" name="radio" onclick="
                    document.getElementById('diskon').innerText = '<?= $v['discount'] ?>';
                    document.getElementById('total').innerText = parseInt(document.getElementById('total').innerText) - '<?= $v['discount'] ?>';
                    document.getElementById('voucherID').value = '<?= $v['id'] ?>';
                    document.getElementById('voucherID1').value = '<?= $v['id'] ?>';
                    document.getElementById('voucherDisc').value = '<?= $v['discount'] ?>';
                    document.getElementById('discText').innerText = 'Rp. <?= $v['discount'] ?>';
                    ">
                    <span class="checkmark position-absolute top-50 me-2"></span>
                </div>
            </label>
            <?php } else { ?>
                <label class="radioWrapper ps-2 row d-flex align-items-start py-3">
                <div class="col-12 d-flex align-items-center gap-2">
                    <img src="assets/img/gratisongkiroff.png" alt="" class="gratisongkir">
                    <div class="d-flex flex-column">
                        <span class="fz-12">Min. Belanja Rp. <?= $v['min_buy'] ?></span>
                        <span class="fz-10 blue">Telah Kadaluarsa</span>
                    </div>
                    <span class="checkmark position-absolute top-50 me-2"></span>
                </div>
            </label>
            <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="fz-12 fw-600 btn btn-secondary" data-bs-dismiss="modal">Nanti saja</button>
            <button type="button" class="fz-12 fw-600 btn btn-primary" data-bs-dismiss="modal">Konfirmasi</button>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>