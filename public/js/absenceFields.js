function checkAbsenceFields(button){
    var error = false;

    date_err_msg = $("#invalidDate");
    hour_err_msg = $("#invalidHour");
    description_err_msg = $("#invalidDescription");

    date = document.getElementById("day_of_week");
    hour_of_schoolday = document.getElementsByName("hour_of_schoolday[]");    
    description = document.getElementById("description");

    var hour_of_schoolday_checked = false;
    for(var i = 0; i < hour_of_schoolday.length; i++){
        if(hour_of_schoolday[i].checked){
            hour_of_schoolday_checked = true;
        }
    }

    date_err_msg.html("");
    hour_err_msg.html("");
    description_err_msg.html("");

    // if the description is empty throw error
    if (description.value === "" || description.value === null){
        description_err_msg.html("Inserisci le motivazioni dell'assenza");
        description.focus();
        error = true;
    }

    // if the date is before today or is empty (no date selected) throw error
    if (date.value === "" || date.value === null){
        date_err_msg.html("Seleziona una data");
        date.focus();
        error = true;
    }

    if (date.value <= new Date().toISOString().slice(0,10)){
        date_err_msg.html("Seleziona una data futura");
        date.focus();
        error = true;
    }

    if(hour_of_schoolday_checked === false){
        hour_err_msg.html("Seleziona almeno una fascia oraria");
        hour_of_schoolday[0].focus();
        error = true;
    }
    

    if(!error)
    {
        if ( button === "save")
        {
            var hours = [];
            for (var i = 0; i < hour_of_schoolday.length; i++){
                if (hour_of_schoolday[i].checked){
                    hours[i] = hour_of_schoolday[i].value;
                }
            }
            console.log(hours);
            $('input[name="hour_of_schoolday[]"]').value = hours;
            $('form[name=absenceForm]').submit();
            
            return true;
        }
    }
    return false;
}