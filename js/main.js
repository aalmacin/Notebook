$(document).ready(function() {

  function closeNote() {
    $("#noteOverlay").hide();
    var txtArea = $("#noteOverlay .newNote");
    txtArea.val("");
    txtArea.data('id', '');
    $('.enterNote.error').hide();
  }

  $('#addNoteButton .addNote').click(function() {
    $("#noteOverlay").show();
    $('#deleteNote').hide();
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
    $('#deleteNote').show();
  });

  $("#saveNote").click(function() {
    var txtArea = $("#noteOverlay .newNote");
    var id = txtArea.data('id');
    var txt = $("#noteOverlay .newNote").val();
    if(txt == '') {
      $('.enterNote.error').show();
      return false;
    }
    $.post("api/saveNote.php", {note: txt, id: id}, function() {
      closeNote();
    });
  });

  $("#deleteNote").click(function() {
    var txtArea = $("#noteOverlay .newNote");
    var id = txtArea.data('id');
    var conf = confirm("Are you sure you want to delete this note?");
    if(conf) {
      $.post("api/deleteNote.php", {id: id}, function() {
        closeNote();
      });
    }
  });
});
