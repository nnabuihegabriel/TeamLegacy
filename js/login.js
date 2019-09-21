const subBtn = document.querySelector('.submit'); //select the button
const username = document.querySelector('.username'); //select the username field
const password = document.querySelector('.password'); //selct the password field

const showPass = document.querySelector('.toggle-pass'); //select the password toggle btn
const errorElement = document.querySelector('.error'); //select the error element

//function to change the password field view
showPass.addEventListener('click', function(e){
  if ( e.target.classList.contains('fa-eye-slash')) {
    e.target.classList = 'fa fa-eye';
    password.setAttribute('type', 'text');
  } else {
    e.target.classList = 'fa fa-eye-slash';
    password.setAttribute('type', 'password');
  }
})

//function to show errors to the user
function showError(error) {
  errorElement.innerText = error;

  //check for the username field
  if (!username.value) {
    username.classList = 'username invalid';
  } else {
    username.classList = 'username';
  }

  //check for the password field
  if (!password.value) {
    password.classList = 'password invalid';
  } else {
    password.classList = 'password';
  }
}

//function to submit the form data
function submitData() {
  const url = '../functions/loginer.php';
  const formData = new FormData();

  formData.append('username', username.value);
  formData.append('password', password.value);

    fetch(url, {
      method: 'POST',
      body: formData,
    }).then(response => response.text())
      .then(data => {
        if (data === 'set') {
          return window.location.href = '../dashboard.php?m=Welcome Back!';
        } else if (data === 'already set') {
          return window.location.href = '../dashboard.php?m=Already Logged in!';
        } else {
          return showError(data);
        }
      })
      .catch( (error) => {
      showError('You are disconnected');
    });
}

//function to listen to the submit btn
//and to validate the form
//then submit it
subBtn.addEventListener('click', function(e) {
  if (username.value && password.value) {
    showError('');
    submitData();
  } else {
    showError('Please fill all fields');
  }
})
