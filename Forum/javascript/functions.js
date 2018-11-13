window.onload = function() {
    document.getElementById("focus").focus();
};


function send_reg() {
    var mag_verzenden  = 'ja';
    var warning = '';
    if (document.getElementById('password').value  !== document.getElementById('confirm_password').value) {
        mag_verzenden = 'nee';
        warning = 'De wachtwoorden moeten gelijk zijn.';
    } if (mag_verzenden === 'ja') {
        f_submit_form('reg');
    } else {
        alert(warning);
    }
}

