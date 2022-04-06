// Script for to confirm del of messages

$(document).ready(function($) {
  // console.log($('#delete'));
  $('#delete').click(function() {
    let response = confirm("Confirmez vous la suppression ? ATTENTION, ACTION IRREVERSIBLE !");
    // if response is no
    if(!response) {
      return false; // Cancel click ,and so, heref attribute
    } else {
      return true;
    }
  });
});