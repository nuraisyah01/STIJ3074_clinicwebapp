function validateLoginForm() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    if (username === '' || password === '') {
        document.getElementById('loginMessage').innerText = 'Please fill out all fields.';
        return false;
    }

    return true;
}

function validateRegistrationForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (name === '' || email === '' || password === '') {
        document.getElementById('registrationMessage').innerText = 'Please fill out all required fields.';
        return false;
    }

    return true;
}

function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}

function rememberMe() {
    var email = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var remember = document.getElementById('idremember').checked;

    if (remember) {
        if (email && password) {
            setCookie('username', email, 30);
            setCookie('password', password, 30);
            alert('Credentials Stored');
        } else {
            alert('Please fill in both email and password to remember.');
        }
    } else {
        eraseCookie('username');
        eraseCookie('password');
        alert('Credentials Removed');
    }
}

function loadCookies() {
    var username = getCookie('username');
    var password = getCookie('password');
    if (username && password) {
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;
        document.getElementById('idremember').checked = true;
    }
}
document.addEventListener('DOMContentLoaded', function() {
    loadCookies();
});
