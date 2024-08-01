<!DOCTYPE html>
<html lang="en">

<style>
    .scan-btn {
        display: flex;
        justify-content: center;
        font-size: 16px;
        text-align: center;
        width: 66%;
        padding: 10px;
        border-radius: 5px;
        margin: auto;
        color: #ffffff;
        font-weight: 400;
        background: #024b91;
        margin-top: 10px;
    }

    .scan-btn p {
        display: flex;
        justify-content: center;
        margin: auto;
    }
</style>
</head>

<body>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pt-3">
                        <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="" width="50%">
                    </div>
                </div>
            </div>

            <form action="<?php echo base_url('Packet/withdraw') ?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="row pt-3">
                    <div class="col-md-12 pt-5 pb-5">
                        <div class="text-center qrscan">
                            <h2 class="congrate pt-4 blinkerq">🎉CONGRATULATIONS🎉</h2>
                            <h4 id="amount-display">You have Won <?php echo $total_amount; ?> Rs.</h4>
                            <input type="hidden" id="total-amount" name="total_amount" value="<?php echo $total_amount; ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="text-center qrscan">
                            <h4 id="qr-count">0 QR Codes <br /> Successfully Added</h4>
                        </div>
                    </div>

                    <div class="col-md-12 pt-5">
                        <div class="scanqr pt-3">
                            <button type="button" id="scan-btn" class="scan-btn green mb-3" data-toggle="modal" data-target="#qrModal1">SCAN NEW QR</button>
                        </div>
                    </div>

                    <div class="text-center pt-5 pb-5 d-flex justify-content-center">
                        <button type="submit" class="nextbutton">NEXT</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog text-black" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Scan QR CODE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <video id="video-preview-modal" width="100%" height="100%" autoplay playsinline></video>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closes">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>