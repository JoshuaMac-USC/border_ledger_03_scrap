@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<form action="/ledgers" method="POST">
    @csrf
                  <label for="border_name">Border Name:</label>
                  <select style="width:150px" name="border_name" id="border_name">
                <option value=''>--Select Border--</option>
                  </select>
    <br>

   <input name="path" type="hidden" value="Ingoing">
    <input type="submit" value="Add Record">
    </form>
    
    <script type="text/javascript">
$('#border_name').select2({
  placeholder: 'Select border',
  ajax: {
    url: '/ledger-ajax',
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.border,
                  id: item.id
              }
          })
      };
    },
    cache: true
  }
});


</script>
@endsection