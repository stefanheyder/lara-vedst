// Binds window if user has made input
$(document).ready(function() {
    $('.form-group').change(function() {
        $(window).bind('beforeunload', function() {
            return 'Beim Verlassen der Seite gehen alle Eingaben verloren.';
        });
    });

    $("form").submit(function () {
        if ($('#btnAdd') !== '.click')
            $(window).unbind('beforeunload');
    });
});


// Changes dropdown style for mobile view
$(function () {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.selectpicker').selectpicker('mobile');
    }
});


// Checks if user has made input -> if yes, a popup appears if user wants to leave the site
window.onload = function () {
    $('.questions' || '.input_checkboxitem' || '.selectpicker').change(function () {
        $(window).bind('beforeunload', function () {
            return 'Beim Verlassen der Seite gehen alle Eingaben verloren.';
        });
    });

    $("form").submit(function () {
        if ($('#btnAdd') !== '.click')
            $(window).unbind('beforeunload');

        if ($("[data-id=clonedInput_edit]").attr('style') == 'display: none') {
            $("[data-id=clonedInput_edit]").remove();
        }
    });
};


// Adding questions
$(function () {
    var count_questions = 1;
    var count_clicks = 0;
    $('#btnAdd').click(function () {

        $('#questions' + count_questions).attr('style', 'display: block');

        count_clicks++;

        if (window.location.pathname === '/survey/create' || count_clicks > 1) {

            count_questions++;

            var num = $('.clonedInput').length,
                newNum = new Number(num + 1),
                newElem = $('#questions' + num).clone().attr('id', 'questions' + newNum).fadeIn('slow');

            newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').html('Frage #' + newNum);

            newElem.find('.questions').attr('for', 'ID' + newNum + 'questions[]');
            newElem.find('.questions').attr('id', 'ID' + newNum + 'questions[]');
            newElem.find('#question').val('');


            newElem.find('.label_checkboxitem').attr('for', 'ID' + newNum + '_checkboxitem');
            newElem.find('.input_checkboxitem').attr('id', 'ID' + newNum + '_checkboxitem').val([]);

            newElem.find('.selectpicker').attr('id', 'field_type' + (newNum - 1));
            newElem.find('.btn-success').attr('id', 'button_answ' + (newNum - 1));
            newElem.find('.hidden').attr('id', 'hiddenField' + (newNum - 1));
            newElem.find('.hidden').attr('value', '1');

            newElem.find('.selectpicker').attr('onchange', 'javascript:check_question_type(' + (newNum - 1) + ');' + 'check_question_type2(' + (newNum - 1) + ');' + 'setField(' + (newNum - 1) + ');' + 'setField2(' + (newNum - 1) + ');');

            newElem.find('.answ_option').attr('id', 'answ_opt' + (newNum - 1));
            newElem.find('.btn-success').attr('onclick', 'javascript:clone_this(this, "new_passage",' + (newNum - 1) + ');');

            newElem.find('.answer_option').val('');
            newElem.find("[class^=passage]").remove();
            newElem.find('.btnRemove').attr('id', 'button_del_question' + newNum);

            newElem.find('.passage' + newNum).slice(1).remove();
            newElem.find('.passage' + (newNum - 1)).remove();
            newElem.find('.passage' + (newNum - 2)).remove();

            $('.del').attr('class', 'not_del');

            $('#questions' + num).after(newElem);
            $('#ID' + newNum + '_title').focus();

            newElem.find('.bootstrap-select').attr('class', '.bootstrap-select del');

            $('.del').find('.dropdown-toggle').remove();

            $('.selectpicker').selectpicker('refresh');

            newElem.find('.input_checkboxitem').attr('name', 'required[' + (newNum - 1) + ']');

            newElem.find('#button_answ' + (newNum - 1)).attr('style', 'display:none');

            $("form").submit(function () {
                $('.bootstrap-select').find('#field_type' + (newNum - 1));
                if ($('#field_type' + (newNum - 1)).val() === '0') {
                    bootbox.alert("Frage-Typ muss bei Frage " + (newNum) + " ausgewählt sein");
                    return false;
                }
            });

            $(document).ready(function () {
                $('.questions' || '.input_checkboxitem' || '.selectpicker').change(function () {
                    $(window).bind('beforeunload', function () {
                        return 'Beim Verlassen der Seite gehen alle Eingaben verloren.';
                    });
                });

                var x = false;
                var z = 0;
                var field_type_not_selected = 0;
                var field_type_selected = 0;

                $("form").submit(function () {
                    x = false;
                    z = 0;
                    field_type_not_selected = 0;
                    field_type_selected = 0;
                    if ($('#field_type').val() !== '' && $('#field_type' + (count_questions - 1)).val() !== '0') {
                        x = true;

                        check_unbind2();
                        for (i = 0; i < (count_questions - 2); i++) {
                            z++;
                            if ($('#field_type' + z).val() === '0')
                                field_type_not_selected++;
                            else
                                field_type_selected++;
                        }
                    }
                    if (z >= (count_questions - 2) && (field_type_not_selected + field_type_selected) === z)
                        check_unbind();

                });
                function check_unbind() {

                    if (x === true && field_type_not_selected === 0 && count_questions >= '3' && field_type_selected > 0) {
                        $(window).unbind('beforeunload');
                    }
                }

                function check_unbind2() {
                    if (x === true && count_questions === 2) {
                        $(window).unbind('beforeunload');
                    }
                }
            });

            $('.btnRemoveQuestion').attr('disabled', false);

            $('.btnRemoveQuestion').click(function () {
                newNum--;
            });
        }

        else {
            $(document).find('.clonedInput').attr('style', 'display: block');
        }

    });


// Deleting questions
    $(document).ready(function() {

        $(document).on("click", ".btnRemoveQuestion", function () {

            var temp = $(this).closest('.clonedInput');
            if (window.location.pathname === '/survey/create') {

                var tempId = parseInt(temp.attr('id').substring(9, 12)) - 1;
                var num = $('.clonedInput').length;

                temp.nextUntil("br").each(function () {
                    $(this).attr('id', "questions" + ++tempId);
                    $(this).find("[name^=reference]").attr('id', 'ID' + tempId + '_reference').html('Frage #' + tempId);
                    $(this).find("[name^=button_del_question]").attr('id', 'button_del_question' + tempId);
                    $(this).find("[name^=quest_label]").attr('id', 'ID' + tempId + 'questions[]').attr('for', 'ID' + tempId + 'questions[]');
                    $(this).find("[name^=type]").attr('id', 'hiddenField' + (tempId - 1));
                    $(this).find("[name^=type_select]").attr('id', 'field_type' + (tempId - 1)).attr('onchange', 'javascript:check_question_type(' + (tempId - 1) + '); check_question_type2(' + (tempId - 1) + '); setField(' + (tempId - 1) + ');' + 'setField2(' + (tempId - 1) + ');');
                    $(this).find("[name^=btn_answ]").attr('id', 'button_answ' + (tempId - 1));
                    $(this).find("[name^=btn_answ]").attr('onclick', 'javascript:clone_this(this,' + '"new_passage"' + ',' + (tempId - 1) + ');');
                    $(this).find("[name^=answer_options_div]").attr('id', 'answ_opt' + (tempId - 1));
                    $(this).find("[name^=cloneTable]").attr('class', 'passage' + (tempId - 1));
                    $(this).find("[id^=answer_option]").attr('name', 'answer_options[' + (tempId - 1) + '][]');
                    $(this).find("[name^=req_label]").attr('for', 'ID' + tempId + '_checkboxitem');
                    $(this).find("[name^=required]").attr('id', 'ID' + tempId + '_checkboxitem').attr('name', 'required[' + (tempId - 1) + ']');
                });

                $(this).closest(".clonedInput").remove();

                if (num - 1 === 1)
                    $('.btnRemoveQuestion').attr('disabled', true);

            }
            else {
                // In edit view user is asked if really wants to delete a question
                bootbox.confirm("Bist du sicher, dass du die Frage löschen möchtest?", function(confirmed) {
                    if (confirmed) {
                        var tempId = parseInt(temp.attr('id').substring(9, 12)) - 1;
                        var num = $('.clonedInput').length;

                        temp.nextUntil("br").each(function () {
                            $(this).attr('id', "questions" + ++tempId);
                            $(this).find("[name^=reference]").attr('id', 'ID' + tempId + '_reference').html('Frage #' + tempId);
                            $(this).find("[name^=button_del_question]").attr('id', 'button_del_question' + tempId);
                            $(this).find("[name^=quest_label]").attr('id', 'ID' + tempId + 'questions[]').attr('for', 'ID' + tempId + 'questions[]');
                            $(this).find("[name^=type]").attr('id', 'hiddenField' + (tempId - 1));
                            $(this).find("[name^=type_select]").attr('id', 'field_type' + (tempId - 1)).attr('onchange', 'javascript:check_question_type(' + (tempId - 1) + '); check_question_type2(' + (tempId - 1) + '); setField(' + (tempId - 1) + ');' + 'setField2(' + (tempId - 1) + ');');
                            $(this).find("[name^=btn_answ]").attr('id', 'button_answ' + (tempId - 1));
                            $(this).find("[name^=btn_answ]").attr('onclick', 'javascript:clone_this(this,' + '"new_passage"' + ',' + (tempId - 1) + ');');
                            $(this).find("[name^=answer_options_div]").attr('id', 'answ_opt' + (tempId - 1));
                            $(this).find("[name^=cloneTable]").attr('class', 'passage' + (tempId - 1));
                            $(this).find("[id^=answer_option]").attr('name', 'answer_options[' + (tempId - 1) + '][]');
                            $(this).find("[name^=req_label]").attr('for', 'ID' + tempId + '_checkboxitem');
                            $(this).find("[name^=required]").attr('id', 'ID' + tempId + '_checkboxitem').attr('name', 'required[' + (tempId - 1) + ']');
                        });

                        temp.remove();

                        if (num - 1 === 1)
                            $('.btnRemoveQuestion').attr('disabled', true);
                    }
                })
            }

            return false;

        });
    });

    $('.btnRemoveQuestion').attr('disabled', true);
});


// Adding answer options
function clone_this(button, objid, number){

    $(".passage").find('.answer_option').eq(0).attr({
        name: 'answer_options[' + number + ']' + '[]'
    });

    var clone_me = document.getElementById(objid).firstChild.cloneNode(true);

    button.parentNode.insertBefore(clone_me, button);

    if (number == '0')
        $('#answ_opt').find('table:last').attr('class', 'passage' + number );

    if (number >= 1)
        $('#answ_opt' + number).find('table:last').attr('class', 'passage' + (number ));
}


// Deleting answer options
function remove_this(objLink)
{
    objLink.parentNode.parentNode.parentNode.parentNode.parentNode.removeChild(objLink.parentNode.parentNode.parentNode.parentNode);
}


// Checks selected question type -> if type = 3 (dropdown) button for adding answer options is shown
function check_question_type(number) {

    if ($('#field_type').val() === "3")
        $('#button_answ').fadeTo('slow', 1)&
        $('#button_answ').attr('style', 'visibility:visible; margin-top: 10px');
    else
        void(0);

    if (document.getElementById('button_answ'))
        var att = document.getElementById('button_answ').getAttribute('style');
    else
        var att = document.getElementById('button_answ' + number).getAttribute('style');

    if (att === 'display:none')
        void(0);

    if ($('#field_type').val() !== "3" && att !== 'display:none' && number == '0')
        $('#button_answ').fadeTo('slow', 0) &
        $('#button_answ').attr('style', 'visibility:hidden') &
        timeOut(number);

    if ($('#field_type' + number).val() === "3")
        $('#button_answ' + number).fadeTo('slow', 1) &
        $('#button_answ' + number).attr('style', 'visibility:visible; margin-top: 10px');

    if (document.getElementById('button_answ' + number))
        var att2 = document.getElementById('button_answ' + number).getAttribute('style');
    if (att2 === 'display:none')
        void(0);

    if ($('#field_type' + number).val() !== "3" && att2 !== 'display:none')
        $('#button_answ' + number).fadeTo('slow', 0) &
        $('#button_answ' + number).attr('style', 'visibility:hidden') &
        timeOut2(number);

}


// Checks question type
function timeOut() {
    setTimeout(function(){

        var att = document.getElementById('button_answ').getAttribute('style');
        if (att === 'display:none')
            void(0);
        else
            $('#button_answ').attr('style', 'display:none');
    },700);
}


// Checks question type
function timeOut2(number) {
    setTimeout(function(){

        if (document.getElementById('button_answ' + number))
            var att2 = document.getElementById('button_answ' + number).getAttribute('style');
        if (att2 === 'display:none')
            void(0);
        else
            $('#button_answ' + number).attr('style', 'display:none');
    },700);
}


// Checks question type and removes answer options if type is changed and answer options exist
function check_question_type2(number) {

    if ($('#field_type').val() !== "3")
        $('#answ_opt').find('.passage' + number).fadeOut() & setTimeout(function () {
            $('#answ_opt').find('.passage' + number).remove();
        },700);

    if ($('#field_type' + number).val() !== "3")
        $('#answ_opt' + number).find('.passage' + number).fadeOut() & setTimeout(function () {
            $('#answ_opt' + number).find('.passage' + number).remove();
        },700);

}

// Checks question type -> has to be selected
$("form").submit(function() {

    if ($('#field_type').val() === '0') {
        bootbox.alert("Frage-Typ muss bei Frage 1 ausgewählt sein");
        return false;
    }
});


// Selected question type is copied to a hidden input field
function setField(number) {
        if (document.getElementById("field_type")) {
            toWhat = document.getElementById("field_type").value;
            document.getElementById("hiddenField").value = toWhat;
        }

        else {
            toWhat = document.getElementById("field_type" + number).value;
            document.getElementById("hiddenField" + number).value = toWhat;
        }

    }


// Selected question type is copied to a hidden input field
function setField2(number) {
    if (document.getElementById('field_type' + number))
        setField3();
    else
        void(0);

    function setField3() {
        toWhat = document.getElementById("field_type" + number).value;
        document.getElementById("hiddenField" + number).value = toWhat;
    }
}


// URL detection to differentiate create and edit view -> heading and other things
$(function () {

    if (window.location.pathname === '/survey/create') {
        $('#heading_create').attr('style', '');
        $('.question_edit').remove();
    }

    else {
        $('#heading_edit').attr('style', '');
        $('.create_survey').remove();
      //  $(document).find('#password_note').attr('style', 'color: #BDBDBD; display: block;');
        if ($('#ID2_reference').attr('name') == "reference") {
            $('.btnRemoveQuestion').attr('disabled', false);
        }
        else {
            $('.btnRemoveQuestion').attr('disabled', true);
        }

    }

});

// Sets a hidden input field to true for standard users (survey -> is private)
$('form').on( 'submit', function () {

    if ($('#required1').attr('disabled'))
        $('#required1_hidden').attr('checked', 'true');

});

$(function () {
    // -1 for the cloned input hidden div
    var amountOfQuestions =  $('div[id^=questions]').length - 1;
    for(var i = 0; i < amountOfQuestions; i++) {
        check_question_type(i);
        check_question_type2(i);
        setField(i);
        setField2(i);
    }

});
