function checkTimetable(button){
    var error = false;
    var regularExpression = new RegExp("^[1-5][A-Z]$", "g");

    date_err_msg = $("#invalidDay");
    hour_err_msg = $("#invalidHour");
    teacher_err_msg = $("#invalidTeacher");
    class_err_msg = $("#invalidClass");

    date = document.getElementById("day_of_week");
    teacher_id = document.getElementById("teacher_id");
    classe = document.getElementById("class");
    hour_of_schoolday = document.getElementsByName("hour_of_schoolday");

    hour_of_schoolday_checked = false;
    for (var i = 0; i < hour_of_schoolday.length; i++){
        if (hour_of_schoolday[i].checked){
            hour_of_schoolday_checked = true;
        }
    }

    date_err_msg.html("");
    hour_err_msg.html("");
    teacher_err_msg.html("");
    class_err_msg.html("");

    if (date.value === ""){
        date_err_msg.html("Seleziona un giorno della settimana");
        date.focus();
        error = true;
    }

    if(hour_of_schoolday_checked === false){
        hour_err_msg.html("Seleziona una fascia oraria");
        hour_of_schoolday[0].focus();
        error = true;
    }

    if (teacher_id.value === "0"){
        teacher_err_msg.html("Seleziona un insegnante");
        teacher_id.focus();
        error = true;
    }

    if (classe.value === "" || classe.value === null){
        class_err_msg.html("Inserisci una classe");
        classe.focus();
        error = true;
    }

    if (!classe.value.match(regularExpression)){
        class_err_msg.html("La classe deve essere nel formato '1A', '2B', '3C', '4D', '5E' (numero 1-5 + lettera maiuscola)");
        classe.focus();
        error = true;
    }

    var hour;
    for (var i = 0; i < hour_of_schoolday.length; i++){
        if (hour_of_schoolday[i].checked){
            hour = hour_of_schoolday[i].value;
        }
    }
    // if the teacher is already busy in that day and hour, show an error
    if (!error){
        $.ajax({
            url: `/timetable/check/${day_of_week.value}/${hour}/${teacher_id.value}`,
            type: "GET",
            data: {
                day_of_week: date.value,
                hour_of_schoolday: hour,
                teacher_id: teacher_id.value
            },
            success: function (response) {
                if (response){
                    teacher_err_msg.html("L'insegnante selezionato è già impegnato in quel giorno e in quella fascia oraria");
                    teacher_id.focus();
                    error = true;
                }else{
                    if (button === "save")
                    {
                        $('input[name=hour_of_schoolday]').value = hour;
                        $('form[name=timetableAdd]').submit();
                        
                        return true;
                    }
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            },
        });
    }
}