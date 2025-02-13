// script.js
document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let age = document.getElementById('age').value;
    let email = document.getElementById('email').value;
    let pincode = document.getElementById('pincode').value;
    let password = document.getElementById('password').value;

    // Name validation (alphabets and spaces only)
    let nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(name)) {
        alert('Name should only contain alphabets and spaces.');
        return;
    }

    // Age validation (integer between 18 and 60)
    if (age < 18 || age > 60) {
        alert('Age should be between 18 and 60.');
        return;
    }

    // Email validation (handled by HTML5 input type)
    
    // PIN code validation (6 digits only)
    let pincodeRegex = /^\d{6}$/;
    if (!pincodeRegex.test(pincode)) {
        alert('PIN code should contain 6 digits.');
        return;
    }

    // Password validation (8+ characters, one lower, one upper, one special character, and one digit)
    let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert('Password should be at least 8 characters long and include one lower case letter, one upper case letter, one digit, and one special character.');
        return;
    }

    alert('Registration successful!');
});
