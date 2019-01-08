function ajaxlogin() {
    $.ajax({
        type: "POST",
        url: "loginchecker.php",
        data: { username: $("#usr").val()},
        success: function( result ) {
            console.log(result);
            if(result=="Занято!") {$("#usr-errors").html(result);
                $( "#register-btn" ).prop( "disabled", true );}
            else {$("#usr-errors").html(result);
                $( "#register-btn" ).prop( "disabled", false );}
        }
    });
}
function checkpasswords() {

    if($("#pswd1").val()!=$("#pswd2").val()){
        $("#pswd-errors").html("Пароли не совпадают!");
        $( "#register-btn" ).prop( "disabled", true );
    }
    else {
        $("#pswd-errors").html("Пароли совпадают!");
        $( "#register-btn" ).prop( "disabled", false );
    }

}
function insertBold() {
    $textarea = $("#message-area");
    var selectionStart = $textarea[0].selectionStart;
    var selectionEnd = $textarea[0].selectionEnd;

    $textarea.val($textarea.val() + '[bold][/bold]');

    $textarea[0].selectionStart = selectionStart;
    $textarea[0].selectionEnd = selectionEnd+6;
}
function insertItalic() {
    $textarea = $("#message-area");
    var selectionStart = $textarea[0].selectionStart;
    var selectionEnd = $textarea[0].selectionEnd;

    $textarea.val($textarea.val() + '[italic][/italic]');

    $textarea[0].selectionStart = selectionStart;
    $textarea[0].selectionEnd = selectionEnd+8;
}
function insertStrike(){
    $textarea = $("#message-area");
    var selectionStart = $textarea[0].selectionStart;
    var selectionEnd = $textarea[0].selectionEnd;

    $textarea.val($textarea.val() + '[underline][/underline]');

    $textarea[0].selectionStart = selectionStart;
    $textarea[0].selectionEnd = selectionEnd+11;
}