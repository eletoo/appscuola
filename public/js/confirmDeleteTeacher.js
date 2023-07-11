function confirmDelete(teacherId){
    // show the modal for confirmation
    $("#deleteModal").modal("show");
    // if the user clicks on the delete button
    $("#delete").click(function(){
        // call the deleteTeacher function
        deleteTeacher(teacherId);
    });
}


function deleteTeacher(teacherId){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // send the id to the deleteTeacher.php file
    $.ajax({
        method: "DELETE",
        url: `/personale/docenti/${teacherId}`,
        data: {teacherId: teacherId},
        success: function(data){
            // reload the page
            location.reload();
        }
    });

}