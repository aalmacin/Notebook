$(document).ready(function() {
  $('#addNoteButton .addNote').click(function() {
    $("#noteOverlay").show();
  });

  $('#noteOverlay .cancelButton').click(function() {
    $("#noteOverlay").hide();
    $("#noteOverlay .newNote").val("");
  });

  $('.note').click(function() {
    $("#noteOverlay").show();
    var txt = $($(this).find("span.noteTxt")).text();
    $("#noteOverlay .newNote").val(txt);
  });
});
