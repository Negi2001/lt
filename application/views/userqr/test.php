<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?

public function check_qr_code()
{
    $qr_code = $this->input->post('qr_code');

    $this->db->select('amount, status');
    $this->db->from('qrscan');
    $this->db->where('specific_qr', $qr_code);
    $query = $this->db->get();

    header('Content-Type: application/json');

    if ($query->num_rows() > 0) {
        $result = $query->row();
        if ($result->status == 0) {
            // Update status to 1
            $this->db->set('status', 1);
            $this->db->where('specific_qr', $qr_code);
            $this->db->update('qrscan');

            // Format amount to remove leading zeros
            $amount = ltrim($result->amount, '0');
            // Ensure that if the amount is zero, it is properly handled
            $amount = $amount === '' ? '0' : $amount;
            echo json_encode(['match' => true, 'amount' => $amount]);
        } else {
            // Return a response indicating that the QR code has already been used
            echo json_encode(['match' => false, 'redirect' => true]);
        }
    } else {
        echo json_encode(['match' => false]);
    }
}
?>
<body>
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

                <form action="">
                    <div class="row pt-3">
                        <div class="col-md-12 pt-5 pb-5">
                            <div class="text-center qrscan">
                                <h2 class="congrate pt-4 blinkerq">🎉CONGRATULATIONS🎉</h2>
                                <h4>You have Won </h4>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="text-center qrscan">
                                <h4>3 QR Codes <br /> Successfully Added</h4>
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
                        <button type="button" class="btn btn-secondary" id="select-upi">Select UPI ID</button>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>





    <script>
        const videoPreviewModal = document.getElementById('video-preview-modal');
const qrDataElementModal = document.getElementById('qr-data-modal');
const amountDisplayElement = document.querySelector('.qrscan h4');
let lastScannedCode = null;
let totalAmount = 0;

// Function to start the camera in the modal
function startCameraInModal() {
    navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
        .then((stream) => {
            videoPreviewModal.srcObject = stream;
            captureAndDecodeModal();
        })
        .catch((error) => {
            console.error('Error accessing camera:', error);
        });
}

// Capture a frame from the video stream and decode the QR code in the modal
function captureAndDecodeModal() {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');

    const videoStyle = getComputedStyle(videoPreviewModal);
    const width = parseFloat(videoStyle.width);
    const height = parseFloat(videoStyle.height);

    canvas.width = width;
    canvas.height = height;
    context.drawImage(videoPreviewModal, 0, 0, width, height);

    const imageData = context.getImageData(0, 0, width, height);
    const code = jsQR(imageData.data, imageData.width, imageData.height, {
        inversionAttempts: 'dontInvert',
    });

    if (code && code.data !== lastScannedCode) {
        lastScannedCode = code.data; // Update the last scanned code
        console.log("Scanned QR Code Data:", code.data);

        fetch('/ltfoods/Packet/check_qr_code', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                qr_code: code.data,
            }),
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.match) {
                    const amount = parseFloat(data.amount); // Ensure amount is a number
                    totalAmount += amount; // Add the amount to the total
                    amountDisplayElement.textContent = `You have Won ${totalAmount} RS.`;
                } else {
                    // Redirect to failure page if QR code is already used
                    window.location.href = '/ltfoods/Packet/qrerror';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                qrDataElementModal.textContent = 'An error occurred while processing the QR code.';
            });
    }

    requestAnimationFrame(captureAndDecodeModal);
}

// Event listener for opening the modal
document.getElementById('scan-btn').addEventListener('click', function () {
    startCameraInModal();
    var myModal = new bootstrap.Modal(document.getElementById('qrModal'), {
        keyboard: false
    });
    myModal.show();
});

// Event listener for closing the modal
document.getElementById('select-upi').addEventListener('click', function () {
    // Hide the modal using Bootstrap's modal method
    $('#qrModal').modal('hide');
});

document.getElementById('qrModal').addEventListener('hidden.bs.modal', function () {
    // Stop the camera when the modal is closed
    const stream = videoPreviewModal.srcObject;
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        videoPreviewModal.srcObject = null;
    }
    // Reset the scanned code when the modal is closed
    lastScannedCode = null;
});

    </script>
</body>

</html>c