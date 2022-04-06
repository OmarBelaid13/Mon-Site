// Global listen to loading page
$(function () {
  // Control form on submit event
  $("#form").on("submit", function (event) {
    // Block form auto refresh
    event.preventDefault();

    // Storage of form data to prepare for sending
    const form = new FormData(this);

    // Data transmission before the request
    insert(form);
  });
});

const PATH = "index.php?controller=contact&action=save_messages";
/**
 * Insert message
 * @param {FormData} form
 */
function insert(form) {
  // Request Ajax POST
  if (nom.value !== "" && prenom.value !== "" && email.value !== "" && message.value !== "") {
    fetch(PATH, {
      method: "post",
      body: form,
    })
      .then((response) => response.text())
      .then((msg) => {
        // Message "Message envoyé"
        const $messageSent = $(".message_sent");
        // Form
        const $form = $(".form_return");
    
        // Display notifications if success or error
        $messageSent.addClass("message_sent_hide").show(800).delay(4000);

        $form.addClass("message_sent_hide").hide(400).delay(4000);
  
        // Clean form
        $("#form")[0].reset();
      });
  }
}
