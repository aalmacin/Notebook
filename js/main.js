$(document).ready(function() {

  $("body").on("pageshow", function() {

    function closeNote() {
      $("#noteOverlay").hide();
      var txtArea = $("#noteOverlay .newNote");
      txtArea.val("");
      txtArea.data('id', '');
      $('.enterNote.error').hide();
      updateNoteList();
    }
    function updateNoteList() {
      var allNotes = $('#allNotes');
      allNotes.empty();
      $.getJSON('api/getNotes.php', function(notes) {
        $.each(notes, function(i, note) {
          var fullElement = "<li class='note ui-li-static ui-body-inherit ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-first-child ui-btn-up-c' data-id='" + note.id + "' data-corners='false' data-shadow='false' data-iconshadow='true' data-wrapperels='div' data-icon='arrow-r' data-iconpos='right' data-theme='c'><div class='ui-btn-inner ui-li'><div class='ui-btn-text'><a class='ui-link-inherit'><span class='noteTxt'>" + note.note + "</span></a></div><span class='ui-icon ui-icon-arrow-r ui-icon-shadow'>&nbsp;</span></div></li>";
          allNotes.append(fullElement);
        });
      });

    }

    $('#addNoteButton .addNote').click(function() {
      $("#noteOverlay").show();
      $('#deleteNote').hide();
    });

    $('#noteOverlay .cancelButton').click(function() {
      closeNote();
    });

    $(document).on('click', '.note', function() {
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
});
