const videoPreviewModal = document.getElementById('video-preview-modal');
const qrDataElementModal = document.getElementById('qr-data-modal');
// const amountDisplayElement = document.querySelector('.qrscan h4');

let lastScannedCode = null;
// let totalAmount = 0;



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
                mobile_number: 'USER_MOBILE_NUMBER', // Replace with actual mobile number
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
                    updateAmount(amount); // Add the amount to the total and update the display
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

// Function to update the total amount
// Function to update the total amount
const initialTotalAmount = parseFloat(document.getElementById('total-amount').value);
let totalAmount = isNaN(initialTotalAmount) ? 0 : initialTotalAmount;

const amountDisplayElement = document.querySelector('.qrscan h4');

// Function to update the total amount
function updateAmount(amount) {
    totalAmount += amount; // Add the amount to the total
    amountDisplayElement.textContent = `You have Won ${totalAmount} Rs.`; // Update displayed amount

    // Update the hidden input field value
    document.getElementById('total-amount').value = totalAmount;

    // Send the updated total amount to the server

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
document.getElementById('closes').addEventListener('click', function () {
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
