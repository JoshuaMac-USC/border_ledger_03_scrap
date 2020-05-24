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
      <script>
          // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
    $('#border_name').select2({
        ajax: { 
          url: "{{route('locations.getLocations')}}",
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