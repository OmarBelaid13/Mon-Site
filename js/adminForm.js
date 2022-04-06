/* ============== Input control of inputs ================ */
console.log('hello');
// Retrieving DOM elements
const form = document.querySelector("#form_connexion_admin");
const login = document.querySelector("#name");
const password = document.querySelector("#password");


/**
 * Check that a message is present
 * @param {*} chaine_message
 */
function testPassword(chaine_message) {
  let regex_text = new RegExp("[a-zA-Z0-9]");
  if (regex_text.test(password.value)) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check that a name is present
 * @param {*} chaine_nom
 */
function testName(chaine_nom) {
  let regex_text = new RegExp("[a-zA-Z]");
  if (regex_text.test(login.value)) {
    return true;
  } else {
    return false;
  }
}

// To submit form
form.addEventListener("submit", function (e) {
  // If the name test returns FALSE, blocking of the form submission
  if (!testName(login.value)) {
    e.preventDefault();
    document.querySelector(".admin_small_error_nom").innerHTML =
      "N'oubliez pas votre login";
    login.classList.add("error_mail");
  } else {
    login.classList.remove("error_mail");
  }
});

// To submit form
form.addEventListener("submit", function (e) {
  // If the name test returns FALSE, blocking of the form submission
  if (!testPassword(password.value)) {
    e.preventDefault();
    document.querySelector(".admin_small_error_password").innerHTML =
      "N'oubliez pas votre password";
    password.classList.add("error_mail");
  } else {
    password.classList.remove("error_mail");
  }
});
