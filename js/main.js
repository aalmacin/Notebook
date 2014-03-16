$(document).ready(function() {
  $('#addNoteButton .addNote').click(function() {
    $("#noteOverlay").show();
  });

  $('#noteOverlay .cancelButton').click(function() {
    $("#noteOverlay").hide();
    $("#noteOverlay .newNote").val("");
  });
});
