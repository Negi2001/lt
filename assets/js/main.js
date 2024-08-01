$(document).ready(function () {
    $("#numberfield, #age1").on("input", function (event) {
        var inputValue = $(this).val();
        var sanitizedValue = sanitizeInput(inputValue);
        $(this).val(sanitizedValue);
    });

    function sanitizeInput(input) {
        var sanitizedNumber = input.replace(/\D/g, "");
        return sanitizedNumber;
    }
})

$(document).ready(function () {
    $("#textInputField, #username1, #city1, #outlet1").on("input", function (event) {
        var inputValue = $(this).val();
        var sanitizedValue = sanitizeInput(inputValue);
        $(this).val(sanitizedValue);
    });

    function sanitizeInput(input) {
        var sanitizedText = input.replace(/[^a-zA-Z ]/g, "");
        return sanitizedText;
    }
});



$('.otpsection').find('input').each(function () {
    $(this).attr('maxlength', 1);
    $(this).on('keyup', function (e) {
        var parent = $($(this).parent());

        if (e.keyCode === 8 || e.keyCode === 37) {
            var prev = parent.find('input#' + $(this).data('previous'));

            if (prev.length) {
                $(prev).select();
            }
        } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
            var next = parent.find('input#' + $(this).data('next'));

            if (next.length) {
                $(next).select();
            } else {
                if (parent.data('autosubmit')) {
                    parent.submit();
                }
            }
        }
    });
});


var timerInterval;

document.getElementById('getOtpBtn').addEventListener('click', function () {
    var mobileNumber = document.getElementById('numberfield').value;
    var pattern = /^[6-9][0-9]{9}$/;

    if (pattern.test(mobileNumber)) {
        document.querySelector('.otpsection').style.display = 'block';
        document.getElementById('submitBtn').style.display = 'block';
        document.getElementById('timerContainer').style.display = 'block';
        document.getElementById('getOtpBtn').style.display = 'none';
        startTimer();
    } else {
        alert('Please enter a valid mobile number.');
    }
});

document.getElementById('resendOtpBtn').addEventListener('click', function () {
    startTimer();
});

function startTimer() {
    var timerElement = document.getElementById('timer');
    var resendButton = document.getElementById('resendOtpBtn');
    var timeLeft = 90;

    clearInterval(timerInterval);

    timerElement.innerHTML = timeLeft + 's';
    timerElement.style.display = 'block';
    resendButton.style.display = 'none';

    timerInterval = setInterval(function () {
        timeLeft -= 1;
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerElement.style.display = 'none';
            resendButton.style.display = 'block';
        } else {
            timerElement.innerHTML = timeLeft + 's';
        }
    }, 1000);
}



const loader = document.getElementById('loader');
const infoImage = document.getElementById('infoImage');

infoImage.addEventListener('click', () => {
    loader.style.display = 'flex';
    setTimeout(() => {
        loader.style.display = 'none';
    }, 2000);
});