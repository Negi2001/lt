<!DOCTYPE html>
<html lang="en">


<body>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pt-3">
                        <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="" width="50%">
                    </div>
                </div>

                <div class="col-md-12 text-center pt-5 select1">
                    <a href="<?= base_url('userqr/qrscan') ?>">
                        <div class="selecttab">
                            <div class="pb-2">
                                <img src="<?= base_url('assets') ?>/images/scan-code.png" alt="" width="25%">
                            </div>
                            <a href="<?= base_url('userqr/qrscan') ?>">SCAN QR</a>
                        </div>
                    </a>

                    <a href="<?= base_url('userqr/qps') ?>">
                        <div class="selecttab mt-5">
                            <div class="pb-2">
                                <img src="<?= base_url('assets') ?>/images/sheet.png" alt="" width="25%">

                            </div>
                            <a href="<?= base_url('userqr/qps') ?>">MILESTONE STATUS</a>
                        </div>
                    </a>

                    <a href="<?= base_url('userqr/history') ?>">
                        <div class="selecttab mt-5">
                            <div class="pb-2">
                                <img src="<?= base_url('assets') ?>/images/history.png" alt="" width="25%">

                            </div>
                            <a href="<?= base_url('userqr/history') ?>">PAYMENT HISTORY</a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>