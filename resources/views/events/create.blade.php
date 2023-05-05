@extends('layouts.master')

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "dd-mm-yy"
    });
</script>

@section('title', 'Inserisci Assenza')

@section('breadcrumb')

@endsection

<head>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
</head>

@section('body')
<form action="{{ route('events.store') }}" method="post">
  @csrf
  Task name:
  <br />
  <input type="text" name="name" />
  <br /><br />
  Task description:
  <br />
  <textarea name="description"></textarea>
  <br /><br />
  Start time:
  <br />
  <input type="text" name="task_date" class="date" />
  <br /><br />
  <input type="submit" value="Save" />
</form>
@endsection