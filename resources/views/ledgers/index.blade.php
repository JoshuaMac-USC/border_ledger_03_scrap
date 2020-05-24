@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- INGOING TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingoing">
  Ingoing
</button>

<!-- Modal -->
<div class="modal fade" id="ingoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Going In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="row justify-content-center">
      <div class="wrapper create-ledger">
    <h1>Create a new record</h1>

    <form action="/ledgers" method="POST">
    @csrf
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname">
    <br>
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname">
    <br>
    <label for="age">Age:</label>
    <input type="text" id="age" name="age">
    <br>

    <label for="id_type">ID Type:</label>
    <select name="id_type" id="id_type">
    <option value=""></option>
    <option value="Driver's License">Driver's License</option>
    <option value="School ID">School ID</option>
    <option value="Government ID">Government ID</option>
    <option value="Company ID">Company ID</option>
    </select>
    <br>

    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number">    
    <br>

    <label for="mode_of_transpo">Mode of Transportation:</label>
    <select name="mode_of_transpo" id="mode_of_transpo">
    <option value=""></option>
    <option value="Walking">Walking</option>
    <option value="PUV">PUV</option>
    <option value="Private Vehicle">Private Vehicle</option>
    <option value="Company Vehicle">Company Vehicle</option>
    </select>
    <br>

    <label for="vplatenum">Plate Number:</label>
    <input type="text" id="vplatenum" name="vplatenum">   
    <br>

    <label for="purpose">Purpose:</label>
    <input type="text" id="purpose" name="purpose">   
    <br>

    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination">   
    <br>

    <label for="border_name">Border Name:</label>
                  <select style="width:150px" name="border_name" id="border_name">
                <option value=''>--Select Border--</option>
                  </select>
    <br>

   <input name="path" type="hidden" value="Ingoing">
    <input type="submit" value="Add Record">
    </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- OUTGOING TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#outgoing">
  Outgoing
</button>

<!-- Modal -->
<div class="modal fade" id="outgoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Going Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="row justify-content-center">      
      <div class="wrapper create-ledger">
    <h1>Create a new record</h1>

    <form action="/ledgers" method="POST">
    @csrf
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname">
    <br>
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname">
    <br>
    <label for="age">Age:</label>
    <input type="text" id="age" name="age">
    <br>

    <label for="id_type">ID Type:</label>
    <select name="id_type" id="id_type">
    <option value="Driver's License">Driver's License</option>
    <option value="School ID">School ID</option>
    <option value="Government ID">Government ID</option>
    <option value="Company ID">Company ID</option>
    </select>
    <br>

    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number">    
    <br>

    <label for="mode_of_transpo">Mode of Transportation:</label>
    <select name="mode_of_transpo" id="mode_of_transpo">
    <option value="Walking">Walking</option>
    <option value="PUV">PUV</option>
    <option value="Private Vehicle">Private Vehicle</option>
    <option value="Company Vehicle">Company Vehicle</option>
    </select>
    <br>

    <label for="vplatenum">Plate Number:</label>
    <input type="text" id="vplatenum" name="vplatenum">   
    <br>

    <label for="purpose">Purpose:</label>
    <input type="text" id="purpose" name="purpose">   
    <br>

    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination">   
    <br>

    <label for="border_name">Border Name:</label>
                  <select style="width:150px" name="border_name" id="border_name">
                <option value=''>--Select Border--</option>
                  </select>
    <br>

   <input name="path" type="hidden" value="Outgoing">
    <input type="submit" value="Add Record">
    </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  View Ledgers
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ledger History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
      <table class="table table-striped">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>Name</th>
            <th>Age</th>
            <th>ID Type</th>
            <th>ID Number</th>
            <th>Mode of Transportation</th>
            <th>Plate Number</th>
            <th>Purpose</th>
            <th>Destination</th>
            <th>Border Name</th>
            <th>Ingoing/Outgoing</th>
         </tr>
         </thead>
         <tbody>
            @foreach($ledgers as $ledger)
            <tr>
               <td>{{ $ledger->created_at }}</td>
               <td>{{ $ledger->fname }} {{ $ledger->lname }}</td>
               <td>{{ $ledger->age }}</td>
               <td>{{ $ledger->id_type }}</td>
               <td>{{ $ledger->id_number }}</td>
               <td>{{ $ledger->mode_of_transpo }}</td>
               @if(is_null($ledger->vplatenum))
               <td>N/A</td>
               @endif
               <td>{{ $ledger->purpose }}</td>
               <td>{{ $ledger->destination }}</td>
               <td>{{ $ledger->border_name }}</td>
               <td>{{ $ledger->path }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $ledgers->links() }}
   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<table class="table table-striped">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>Name</th>
            <th>ID Type</th>
            <th>ID Number</th>
            <th>Plate Number</th>
            <th>Border Name</th>
            <th>Ingoing/Outgoing</th>
         </tr>
         </thead>
         <tbody>
            @foreach($ledgers as $ledger)
            <tr>
               <td>{{ $ledger->created_at }}</td>
               <td>{{ $ledger->fname }} {{ $ledger->lname }}</td>
               <td>{{ $ledger->id_type }}</td>
               <td>{{ $ledger->id_number }}</td>
               @if(is_null($ledger->vplatenum))
               <td>N/A</td>
               @endif
               @if(!is_null($ledger->vplatenum))
               <td>{{ $ledger->vplatenum }}</td>
               @endif
               <td>{{ $ledger->border_name }}</td>
               <td>{{ $ledger->path }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $ledgers->links() }}


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
})

$('#border_nameout').select2({
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
})


</script>
@endsection