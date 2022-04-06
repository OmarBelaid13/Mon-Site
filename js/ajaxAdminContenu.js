// Global listen to loading page
$(function () {
  // Control form on submit event
  $("#update_form").on("submit", function (event) {
    // Block form auto refresh
    event.preventDefault();

    // Storage of form data to prepare for sending
    const form = new FormData(this);

    // Data transmission before the request
    insert_update(form);
  });
});

/**
 * Insert message
 * @param {FormData} form
 */
function insert_update(form) {
  // Request Ajax POST
  if (
    contenu.value !== "" 
  ) {
    fetch("index.php?controller=admin&action=update_text", {
      method: "post",
      body: form,
    })
      .then((response) => response.text())
      .then((msg) => {
        // Message "Le contenu à été modifié"
        const $messageSucces = $(".message_succes");

        // Form
        const $form = $(".form_contenu");

        // Display notifications if success or error
        $messageSucces.addClass("message_succes_hide").show(800).delay(4000).hide(800);

        $form.addClass("message_succes_hide").hide(400).delay(4000).show(800);

      });
  }
}
