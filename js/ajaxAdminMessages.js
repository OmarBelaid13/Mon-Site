// Global listen to loading page
$(function () {
  // Control form on submit event
  $("#form_delete").on("submit", function (event) {
    // Block form auto refresh
    event.preventDefault();

    // Storage of form data to prepare for sending
    const form = new FormData(this);

    // Data transmission before the request
    del_messages(form);
  });
});

/**
 * Insert message
 * @param {FormData} form
 */
function del_messages(form) {
  // Request Ajax POST
  if (contenu.value !== "") {
    fetch("index.php?controller=admin&action=delete_messages", {
      method: "post",
      body: form,
    })
      .then((response) => response.text())
      .then((msg) => {
        // Message "Messages supprimés"
        const $messageSuccesDelete = $(".message_succes_delete");

        // Form
        const $form = $(".form_del");

        // Display notifications if success or error
        $messageSuccesDelete
          .addClass("message_succes_delete_hide")
          .show(800)
          .delay(4000)

        $form.addClass("message_succes_delete_hide").hide(400).delay(4000);
      });
  }
}
