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

@section('body')
    <form action="{{ route('eventi.store') }}" method="post">
    @csrf

    Data Assenza:
    <br />
    <input type="text" name="data_evento" class="date" placeholder="Data Assenza" />
    <br /><br />
    Ora inizio:
    <br />
    <input type="text" name="ora_inizio" class="time" placeholder="Ora inizio"></input>
    <br /><br />
    Ora fine:
    <br />
    <input type="text" name="ora_fine" class="time" placeholder="Ora fine" />
    <br /><br />
    Descrizione/Motivazione:
    <br />
    <textarea name="descrizione" placeholder="Descrizione/Motivazione"></textarea>
    <br /><br />
    <input type="submit" value="Save" />
    </form>
@endsection