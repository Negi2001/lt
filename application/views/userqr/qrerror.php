<!DOCTYPE html>
<html lang="en">

<body>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pt-3">
                        <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="bg" width="50%">
                    </div>
                </div>
            </div>

            <div class="row text-center mt-5">
                <div class="col-md-12">
                    <div class="mb-5">
                        <img src="<?= base_url('assets') ?>/images/scan.png" alt="bg" width="40%"><br />
                        <div class="pt-5">
                            <img src="<?= base_url('assets') ?>/images/warning.png" alt="warning" width="30%">
                        </div>
                    </div>
                    <h5 style="color: #EE5253; font-weight: bold;">Sorry !</h5>
                    <h5 style="color:#EE5253; font-weight: bold;">This QR Code is Incorrect !</h5>

                    <div class="pt-5">
                        <a href="<?= base_url('userqr') ?>">
                            <button class="home">HOME</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>