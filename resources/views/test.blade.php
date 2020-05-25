@extends('layouts.app')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<form action="/ledgers" method="POST">
    @csrf
                  <label for="border_name">Border Name:</label>
                  <select style="width:150px" name="border_name" id="border_name">
                <option value=''></option>
                  </select>
    <br>
    <input type="submit" value="Add Record">
    </form>

    <script type="text/javascript">

// CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){

  $( "#border_name" ).select2({
    ajax: { 
      url: "{{route('locations.dataAjax')}}",
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          _token: CSRF_TOKEN,
          search: params.term // search term
        };
      },
      processResults: function (response) {
        return {
          results: response
        };
      },
      cache: true
    }

  });

});
</script>
@endsection