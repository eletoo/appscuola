<script>
    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#citycalendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($events as $tasks)
                    @foreach($tasks as $task)
                        {
                            title : decodeHtml('{{ $teachers_list->where('id',$task->teacher_id)->first()->lastname." ".$teachers_list->where('id',$task->teacher_id)->first()->firstname }}'),
                            start : decodeHtml('{{ $task->day_of_week }}'),
                            url : decodeHtml('{{ route('events.edit', $task->id) }}')
                        },
                    @endforeach 
                @endforeach
            ],
            locale: 'it'
        })
    });
</script>