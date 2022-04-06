/* ============== Input control of inputs ================ */

// Retrieving DOM elements
const form = document.querySelector("#form");
const nom = document.querySelector("#nom");
const prenom = document.querySelector("#prenom");
const email = document.querySelector("#email");
const message = document.querySelector("#message");

/**
 * Check that an email address in the correct format is correctly entered
 * @param {*} chaine_mail
 */
function testMail(chaine_mail) {
  let regex_mail = new RegExp("^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}.[a-z]{2,4}$");
  if (regex_mail.test(email.value)) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check that a name is present
 * @param {*} chaine_nom
 */
function testNom(chaine_nom) {
  let regex_text = new RegExp("[a-zA-Z]");
  if (regex_text.test(nom.value)) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check that a first name is present
 * @param {*} chaine_prenom
 */
function testPrenom(chaine_prenom) {
  let regex_text = new RegExp("[a-zA-Z]");
  if (regex_text.test(prenom.value)) {
    return true;
  } else {
    return false;
  }
}

/**
 * Check that a message is present
 * @param {*} chaine_message
 */
function testMessage(chaine_message) {
  let regex_text = new RegExp("[a-zA-Z0-9]");
  if (regex_text.test(message.value)) {
    return true;
  } else {
    return false;
  }
}

// To submit form
form.addEventListener("submit", function (e) {
  // If the email test returns FALSE, blocking of the form submission
  if (!testMail(email.value)) {
    e.preventDefault();
    document.querySelector(".small_error_mail").innerHTML =
      "Merci d'entrer une adresse mail au bon format";
    email.classList.add("error_mail");
  } else {
    email.classList.remove("error_mail");
  }
});

// To submit form
form.addEventListener("submit", function (e) {
  // If the name test returns FALSE, blocking of the form submission
  if (!testNom(nom.value)) {
    e.preventDefault();
    document.querySelector(".small_error_nom").innerHTML =
      "N'oubliez pas votre nom";
    nom.classList.add("error_mail");
  } else {
    nom.classList.remove("error_mail");
  }
});

// To submit form
form.addEventListener("submit", function (e) {
  // If the first name test returns FALSE, blocking of the form submission
  if (!testPrenom(prenom.value)) {
    e.preventDefault();
    document.querySelector(".small_error_prenom").innerHTML =
      "N'oubliez pas votre prénom";
    prenom.classList.add("error_mail");
  } else {
    prenom.classList.remove("error_mail");
  }
});

// To submit form
form.addEventListener("submit", function (e) {
  // If the message test returns FALSE, blocking of the form submission
  if (!testMessage(message.value)) {
    e.preventDefault();
    document.querySelector(".small_error_message").innerHTML =
      "N'oubliez pas votre message";
    message.classList.add("error_mail");
  } else {
    message.classList.remove("error_mail");
  }
});
