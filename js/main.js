$(document).ready(function() {

  function closeNote() {
    $("#noteOverlay").hide();
    var txtArea = $("#noteOverlay .newNote");
    txtArea.val("");
    txtArea.data('id', '');
  }

  $('#addNoteButton .addNote').click(function() {
    $("#noteOverlay").show();
  });

  $('#noteOverlay .cancelButton').click(function() {
    closeNote();
  });

  $('.note').click(function() {
    $("#noteOverlay").show();
    var txtArea = $("#noteOverlay .newNote");
    txtArea.data('id', $(this).data("id"));
    var txt = $($(this).find("span.noteTxt")).text();
    $("#noteOverlay .newNote").val(txt);
  });

  $("#saveNote").click(function() {
    var txtArea = $("#noteOverlay .newNote");
    var id = txtArea.data('id');
    var txt = $("#noteOverlay .newNote").val();
    $.post("api/saveNote.php", {note: txt, id: id}, function() {
      closeNote();
    });
  });

  $("#deleteNote").click(function() {
  });
});
