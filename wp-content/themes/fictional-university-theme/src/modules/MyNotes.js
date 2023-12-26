import $ from 'jquery';

class MyNotes{
    constructor(){
        this.events();
    }
    events(){

        $("#my-notes").on("click", ".delete-note", this.deleteNote);
        $("#my-notes").on("click", ".edit-note", this.editNote.bind(this));
        $("#my-notes").on("click", ".update-note", this.updateNote.bind(this));
        $(".submit-note").on("click", this.createNote.bind(this));
    }

    //Methods will go here
    deleteNote(e){
        var thisNote = $(e.target).parents("li"); //to select li element - the parent of the delete button we clicked on
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', universityData.nonce); // to pass our 'nonce' (from functions.php) to be authorized to do the delete 
            },
            url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
            type: 'DELETE',
            success: function(response){
                thisNote.slideUp(); // to remove element with animation
                console.log('congrats');
                console.log(response);
                if(response.userNoteCount < 5){
                    $(".note-limit-message").removeClass("active");
                }
            },
            error: function(response){
                console.log('sorry');
                console.log(response);
            }
        })
    }

    updateNote(e){
        var thisNote = $(e.target).parents("li");

        var ourUpdatedPost = {
            'title': thisNote.find(".note-title-field").val(),
            'content': thisNote.find("note-body-field").val()
        }

        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', universityData.nonce); // to pass our 'nonce' (from functions.php) to be authorized to do the delete 
            },
            url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
            type: 'POST',
            data: ourUpdatedPost,
            success: function(response){
                thisNote.find(".note-title-field, .note-body-field").attr("readonly", "readonly").removeClass("note-active-field");
                thisNote.find(".update-note").removeClass("update-note--visible");
                thisNote.find(".edit-note").html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
                thisNote.data("state", "cancel");
                console.log('congrats');
                console.log(response);
            },
            error: function(response){
                console.log('sorry');
                console.log(response);
            }
        })
    }

    createNote(e){
        var ourNewPost = {
            'title': $(".new-note-title").val(),
            'content': $(".new-note-body").val(),
            'status': 'publish', // default is draft
        }

        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', universityData.nonce); // to pass our 'nonce' (from functions.php) to be authorized to do the delete 
            },
            url: universityData.root_url + '/wp-json/wp/v2/note/', // without id, just post type
            type: 'POST',
            data: ourNewPost,
            success: function(response){
                $(".new-note-title").val("");
                $(".new-note-body").val("");
                $(`<li data-id="${response.id}">
                <input type="text" class="note-title-field" value="${response.title.raw}">
                <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
                <textarea readonly class="note-body-field">${response.content.raw}</textarea>
                <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
                </li>`).prependTo("#my-notes").hide().slideDown();

                console.log('congrats');
                console.log(response);
            },
            error: function(response){
                if(response.responseText == "You have reached your note limit."){
                    $(".note-limit-message").addClass("active");
                }
                console.log('sorry');
                console.log(response);
            }
        })
    }

    editNote(e){
        var thisNote = $(e.target).parents("li");
        if(thisNote.data("state") == "editable"){
            this.makeNoteReadOnly(thisNote);
        }
        else{
            this.makeNoteEditable(thisNote);
        }
    }
    makeNoteEditable(thisNote){
        thisNote.find(".note-title-field, .note-body-field").removeAttr("readonly").addClass("note-active-field");
        thisNote.find(".update-note").addClass("update-note--visible");
        thisNote.find(".edit-note").html('<i class="fa fa-times" aria-hidden="true"></i> Cancel');
        thisNote.data("state", "editable");
    }

    makeNoteReadOnly(thisNote){
        thisNote.find(".note-title-field, .note-body-field").attr("readonly", "readonly").removeClass("note-active-field");
        thisNote.find(".update-note").removeClass("update-note--visible");
        thisNote.find(".edit-note").html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
        thisNote.data("state", "cancel");
    }
}

export default MyNotes;