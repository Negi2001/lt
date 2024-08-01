<!DOCTYPE html>
<html lang="en">

<style>
    .scan-btn {
        display: flex;
        justify-content: center;
        font-size: 16px;
        text-align: center;
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

            <div class="row pt-5">
                <div class="col-md-12 pt-4">
                    <div class="text-center">
                        <h3 class="paymentdetail">Please enter your payment details</h3>
                    </div>
                    <form action="<?php echo base_url('Packet/thankyou') ?>" class="needs-validation" novalidate>
                        <div class="pt-3 user">
                            <label class="form-label">UPI ID</label>
                            <div>
                                <input type="text" autocomplete="off" id="upi" class="form-control new-form" placeholder="Enter UPI ID" required="">
                            </div>
                        </div>

                        <div class="text-center mt-5">
                            <h2>OR</h2>
                        </div>

                        <div class="scanqr pt-5">
                            <button type="button" id="scan-qr" class="scan-btn green mb-3" data-toggle="modal" data-target="#qrModal1">SCAN UPI QR CODE</button>
                        </div>

                        <div class="text-center pt-5 d-flex justify-content-center">
                            <button type="submit" class="nextbutton">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="qr-bar" style="display: none;">

        <div class="close-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="53" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </div>

        <p class="scanned-qr"></p>

        <div id="video-container">
            <video id="qr-video"></video>
        </div>


        <label for="file-selector" class="upload-qr ">
            <P class="upload-btn-text">Upload from gallery </P>
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-photo-scan">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 8h.01" />
                <path d="M6 13l2.644 -2.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                <path d="M13 13l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l1.644 1.644" />
                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
            </svg>

        </label>


        <input type="file" id="file-selector" style="visibility: hidden;">

        <!-- <p class="select-upi" id="getupi" > Select UPI & Continue</p> -->

        <div style="display: none;">
            <b>Detected QR code: </b>
            <span id="file-qr-result">None</span>
            <button id="start-scanner"> start scanner</button>
        </div>

    </div>

    <div style="display: none;">
        <div>
            <div>
                <label>
                    Highlight Style
                    <select id="scan-region-highlight-style-select">
                        <option value="default-style">Default style</option>
                        <option value="example-style-1">Example custom style 1</option>
                        <option value="example-style-2">Example custom style 2</option>
                    </select>
                </label>
                <label>
                    <input id="show-scan-region" type="checkbox">
                    Show scan region canvas
                </label>
            </div>
            <div>
                <select id="inversion-mode-select">
                    <option value="original">Scan original (dark QR code on bright background)</option>
                    <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
                    <option value="both">Scan both</option>
                </select>
                <br>
            </div>
            <b>Device has camera: </b>
            <span id="cam-has-camera"></span>
            <br>
            <div>
                <b>Preferred camera:</b>
                <select id="cam-list">
                    <option value="environment" selected>Environment Facing (default)</option>
                    <option value="user">User Facing</option>
                </select>
            </div>
            <b>Camera has flash: </b>
            <span id="cam-has-flash"></span>
            <div>
                <button id="flash-toggle">📸 Flash: <span id="flash-state">off</span></button>
            </div>
            <br>
            <b>Detected QR code: </b>
            <span id="cam-qr-result">None</span>
            <br>
            <b>Last detected at: </b>
            <span id="cam-qr-result-timestamp"></span>
            <br>
            <button id="start-button">Start</button>
            <button id="stop-button">Stop</button>
            <hr>

        </div>


    </div>


    <script type="module">
        import QrScanner from "<?php echo base_url(); ?>assets/js/qr-scanner.min.js";

        const video = document.getElementById('qr-video');
        const videoContainer = document.getElementById('video-container');
        const camHasCamera = document.getElementById('cam-has-camera');
        const camList = document.getElementById('cam-list');
        const camHasFlash = document.getElementById('cam-has-flash');
        const flashToggle = document.getElementById('flash-toggle');
        const flashState = document.getElementById('flash-state');
        const camQrResult = document.getElementById('cam-qr-result');
        const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
        const fileSelector = document.getElementById('file-selector');
        const fileQrResult = document.getElementById('file-qr-result');

        function setResult(label, result) {
            const scannedQR = document.querySelector('.scanned-qr');

            if (result && result.data) {
                const upiPattern = /upi:\/\/pay\?pa=([^&]+)/;
                const match = upiPattern.exec(result.data);

                if (match && match[1]) {
                    // If QR code data matches UPI pattern
                    scannedQR.textContent = `UPI ID: ${match[1]}`;
                    document.getElementById("upi").value = `${match[1]}`;
                    document.querySelector('.qr-bar').style.display = 'none';

                    scannedQR.style.color = 'green';
                } else {
                    // If QR code data doesn't match UPI pattern
                    scannedQR.textContent = 'Invalid QR Code';
                    scannedQR.style.color = 'red'; // You can change the color as needed
                }
            } else {
                // If no QR code is detected
                scannedQR.textContent = 'None';
                scannedQR.style.color = 'inherit';
            }
            camQrResultTimestamp.textContent = new Date().toString();
            clearTimeout(label.highlightTimeout);
            label.highlightTimeout = setTimeout(() => scannedQR.style.color = 'inherit', 100);
        }


        // ####### Web Cam Scanning #######

        const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
            onDecodeError: error => {
                camQrResult.textContent = error;
                camQrResult.style.color = 'inherit';
            },
            highlightScanRegion: true,
            highlightCodeOutline: true,
        });

        const updateFlashAvailability = () => {
            scanner.hasFlash().then(hasFlash => {
                camHasFlash.textContent = hasFlash;
                flashToggle.style.display = hasFlash ? 'inline-block' : 'none';
            });
        };


        QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

        // for debugging
        window.scanner = scanner;

        document.getElementById('scan-region-highlight-style-select').addEventListener('change', (e) => {
            videoContainer.className = e.target.value;
            scanner._updateOverlay(); // reposition the highlight because style 2 sets position: relative
        });

        document.getElementById('show-scan-region').addEventListener('change', (e) => {
            const input = e.target;
            const label = input.parentNode;
            label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
            scanner.$canvas.style.display = input.checked ? 'block' : 'none';
        });

        document.getElementById('inversion-mode-select').addEventListener('change', event => {
            scanner.setInversionMode(event.target.value);
        });

        camList.addEventListener('change', event => {
            scanner.setCamera(event.target.value).then(updateFlashAvailability);
        });

        flashToggle.addEventListener('click', () => {
            scanner.toggleFlash().then(() => flashState.textContent = scanner.isFlashOn() ? 'on' : 'off');
        });

        document.getElementById('start-button').addEventListener('click', () => {
            scanner.start();
        });

        document.getElementById('stop-button').addEventListener('click', () => {
            scanner.stop();
        });

        // ####### File Scanning #######

        fileSelector.addEventListener('change', event => {
            const file = fileSelector.files[0];
            if (!file) {
                return;
            }
            QrScanner.scanImage(file, {
                    returnDetailedScanResult: true
                })
                .then(result => setResult(fileQrResult, result))
                .catch(e => setResult(fileQrResult, {
                    data: e || 'No QR code found.'
                }));
        });



        document.getElementById("scan-qr").addEventListener('click', () => {
            document.querySelector(".qr-bar").style.display = "block";
            scanner.setInversionMode("both");


            scanner.start().then(() => {
                updateFlashAvailability();
                // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
                // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
                // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
                // start the scanner earlier.
                QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
                    const option = document.createElement('option');
                    option.value = camera.id;
                    option.text = camera.label;
                    camList.add(option);
                }));
            });
        })


        // document.getElementById('getupi').addEventListener('click', ()=>{
        //         document.querySelector(".qr-bar").style.display="none";
        //     });


        document.querySelector('.close-btn').addEventListener('click', () => {
            document.querySelector('.qr-bar').style.display = 'none';

        })
    </script>

</body>

</html>