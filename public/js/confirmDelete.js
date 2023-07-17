function confirmDelete(teacher_id, isTeacher){
    // show the modal for confirmation
    $("#deleteModal").modal("show");
    // if the user clicks on the delete button
    if (isTeacher)
        $("#delete").click(function(){
            // call the deleteTeacher function
            deleteTeacher(teacher_id);
        });
    else 
        $("#delete").click(function(){
            // call the deleteTeacher function
            deleteSecretary(teacher_id);
        });
}

function deleteTeacher(teacher_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // send the id to the deleteTeacher.php file
    $.ajax({
        method: "DELETE",
        url: `/personale/docenti/${teacher_id}`,
        data: {teacher_id: teacher_id},
        success: function(data){
            // reload the page
            location.reload();
        }
    });
}

function deleteSecretary(secretary_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "DELETE",
        url: `/personale/segreteria/${secretary_id}`,
        data: {secretary_id: secretary_id},
        success: function(data){
            // reload the page
            location.reload();
        }
    });

}