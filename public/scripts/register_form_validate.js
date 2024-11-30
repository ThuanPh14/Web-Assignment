function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
  
    // Check if username and password fields are empty
    if (username === '' || password === '') {
      alert('Please enter both username and password.');
      return false;
    }
  
    // Check password length
    if (password.length < 8) {
      alert('Password should be at least 8 characters long.');
      return false;
    }
  
    // Check confirm password length
    if (confirmPassword.length < 8) {
      alert('Confirm password should be at least 8 characters long.');
      return false;
    }
  
    // Check if password and confirm password match
    if (password !== confirmPassword) {
      alert('Password and confirm password do not match.');
      return false;
    }
  
    // Check password constraint: at least one special char, digit, upper case, and min length 8
    var passwordRegex = /^(?=.*[!@#$%^&*])(?=.*\d)(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(password)) {
      alert('Password should contain at least one special character, one digit, one uppercase letter, and be at least 8 characters long.');
      return false;
    }
  
    return true;
  }