function checkSecretary(button)
{
    firstName = $("#firstname");
    firstName_msg = $("#invalid-firstname");
    
    lastName = $("#lastname");
    lastName_msg = $("#invalid-lastname");
    
    var regularExpression = new RegExp("^([a-zA-Z]+)$", "g");
    var error = false;
    
    if (firstName.val().trim() === "")
    {
        firstName_msg.html("Il campo 'Nome' non può essere vuoto");
        firstName.focus();
        error = true;
    } else if (!firstName.val().trim().match(regularExpression)) {
        firstName_msg.html("Il nome deve contenere solo lettere (no cifre, no caratteri speciali)");
        firstName.focus();
        error = true;
    } else if (firstName.val().trim().length > 20) {
        firstName_msg.html("Il campo 'Nome' non può contenere più di 20 caratteri");
        error = true;
    } else {
        firstName_msg.html("");
    }

    if (lastName.val().trim() === "")
    {
        lastName_msg.html("Il campo 'Cognome' non può essere vuoto");
        lastName.focus();
        error = true;
    } else if (!lastName.val().trim().match(regularExpression))
    {
        lastName_msg.html("Il cognome deve contenere solo lettere (no cifre, no caratteri speciali)");
        lastName.focus();
        error = true;
    } else if (lastName.val().trim().length > 20) {	
        lastName_msg.html("Il campo 'Cognome' non può contenere più di 20 caratteri");
        error = true;
    } else {
        lastName_msg.html("");
    }

    
    if (!error)
    {
        if (button === "register")
        {
            teacher_id = $("input[name=teacher_id]").val();
            password = $("input[name=password]").val();

            $.ajax('/ajaxSecretary', {

                method: 'GET',

                data: {firstname: firstName.val().trim(), lastname: lastName.val().trim(), site_id: null},

                success: function (data) {

                    if (data.found)
                    {
                        error = true;
                        lastName_msg.html("Il segretario è già presente nel database");
                    } else {
                        $('form[name=secretaryRegistration]').submit();
                        return;
                    }
                }

            });
        } 
    }
    
}