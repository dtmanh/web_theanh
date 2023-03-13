$(function(){
    var x = '';
    $('#allowSpacesTags').bind("input",function(event){
        event.preventDefault()
        $.ajax({
            url: $("#baseurl").val() + 'techadmin/product/getTagsByAlias',
            dataType: "HTML",
            data: {name:$('.tagit-new > input').val()},
            type: "POST",
            success:function(res){
                var retrievedJSON = "["+res+"]"; // normally from AJAX
               // var x = JSON.parse(retrievedJSON);
                var x = eval( '(' + retrievedJSON + ')' );
              //  alert(myArray);
               // x = res.split(" ");
                var sampleTags = x;
                //-------------------------------
                // Single field
                //-------------------------------
                $('#allowSpacesTags').tagit({
                    availableTags: sampleTags,
                    // This will make Tag-it submit a single form value, as a comma-delimited field.
                    singleField: true,
                    singleFieldNode: $('#mySingleField')
                });
                //-------------------------------
                // Tag events
                //-------------------------------
                var eventTags = $('#eventTags');

                var addEvent = function(text) {
                    $('#events_container').append(text + '<br>');
                };

                eventTags.tagit({
                    availableTags: sampleTags,
                    beforeTagAdded: function(evt, ui) {
                        if (!ui.duringInitialization) {
                            addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
                        }
                    },
                    afterTagAdded: function(evt, ui) {
                        if (!ui.duringInitialization) {
                            addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
                        }
                    },
                    beforeTagRemoved: function(evt, ui) {
                        addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
                    },
                    afterTagRemoved: function(evt, ui) {
                        addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
                    },
                    onTagClicked: function(evt, ui) {
                        addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
                    },
                    onTagExists: function(evt, ui) {
                        addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
                    }
                });

                //-------------------------------
                // Read-only
                //-------------------------------
                $('#readOnlyTags').tagit({
                    readOnly: true
                });

                //-------------------------------
                // Tag-it methods
                //-------------------------------
                $('#methodTags').tagit({
                    availableTags: sampleTags
                });

                //-------------------------------
                // Allow spaces without quotes.
                //-------------------------------
                $('#allowSpacesTags').tagit({
                    availableTags: sampleTags,
                    allowSpaces: true
                });

                //-------------------------------
                // Remove confirmation
                //-------------------------------
                $('#removeConfirmationTags').tagit({
                    availableTags: sampleTags,
                    removeConfirmation: true
                });
            }
        });
    });
    string = document.getElementById("myAnchor").value;
// Tạo thành mảng với mỗi phần tử ngăn bởi khoảng trắng
// kết quả là mảng có hai phần tử gồm: welcome và feetuts.net
    //var x  = string.split(" ");
    //alert(x);
    var sampleTags = '';

    //-------------------------------
    // Single field
    //-------------------------------
    $('#allowSpacesTags').tagit({
        availableTags: sampleTags,
        // This will make Tag-it submit a single form value, as a comma-delimited field.
        singleField: true,
        singleFieldNode: $('#mySingleField')
    });
    //-------------------------------
    // Tag events
    //-------------------------------
    var eventTags = $('#eventTags');

    var addEvent = function(text) {
        $('#events_container').append(text + '<br>');
    };

    eventTags.tagit({
        availableTags: sampleTags,
        beforeTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        afterTagAdded: function(evt, ui) {
            if (!ui.duringInitialization) {
                addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
            }
        },
        beforeTagRemoved: function(evt, ui) {
            addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        afterTagRemoved: function(evt, ui) {
            addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagClicked: function(evt, ui) {
            addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
        },
        onTagExists: function(evt, ui) {
            addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
        }
    });

    //-------------------------------
    // Read-only
    //-------------------------------
    $('#readOnlyTags').tagit({
        readOnly: true
    });

    //-------------------------------
    // Tag-it methods
    //-------------------------------
    $('#methodTags').tagit({
        availableTags: sampleTags
    });

    //-------------------------------
    // Allow spaces without quotes.
    //-------------------------------
    $('#allowSpacesTags').tagit({
        availableTags: sampleTags,
        allowSpaces: true
    });

    //-------------------------------
    // Remove confirmation
    //-------------------------------
    $('#removeConfirmationTags').tagit({
        availableTags: sampleTags,
        removeConfirmation: true
    });

});