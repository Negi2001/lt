<!DOCTYPE html>
<html lang="en">

<head>
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

            <div class="row pt-3">
                <div class="col-md-12 pt-5 pb-5">
                    <div class="text-center qrscan">
                        <h2 class="congrate pt-4 blinkerq">🎉CONGRATULATIONS🎉</h2>
                        <h4>You have won 360 RS.</h4>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="text-center qrscan">
                        <h4>3 QR Codes <br /> Successfully Added</h4>
                    </div>
                </div>

                <div class="col-md-12 pt-5">
                    <form action="<?php echo base_url('userqr/upiid') ?>" class="needs-validation mt-4" novalidate>
                        <div class="scanqr pt-3">
                            <button type="button" id="scan-btn" class="scan-btn green mb-3" data-toggle="modal" data-target="#qrModal1">SCAN NEW QR</button>
                        </div>

                        <div class="text-center pt-5 pb-5 d-flex justify-content-center">
                            <button type="submit" class="nextbutton">NEXT</button>
                        </div>
                    </form>
                </div>
            </div>
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
                    <p id="qr-data-modal">UPI ID: </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="select-upi">Select UPI ID</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>