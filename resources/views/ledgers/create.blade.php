@extends('layouts.app')

@section('content')
<div class="wrapper create-ledger">
    <h1>Create a new record</h1>

    <form action="/ledgers" method="POST">
    @csrf
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname">
    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname">
    <label for="age">Age:</label>
    <input type="text" id="age" name="age">

    <label for="id_type">ID Type:</label>
    <select name="id_type" id="id_type">
    <option value="Driver's License">Driver's License</option>
    <option value="School ID">School ID</option>
    <option value="Government ID">Government ID</option>
    <option value="Company ID">Company ID</option>
    </select>

    <label for="id_number">ID Number:</label>
    <input type="text" id="id_number" name="id_number">    

    <label for="mode_of_transpo">Mode of Transportation:</label>
    <select name="mode_of_transpo" id="mode_of_transpo">
    <option value="Vehicle">Vehicular</option>
    <option value="Non-Vehicle">Non-Vehicular</option>
    </select>

    <label for="vplatenum">Plate Number:</label>
    <input type="text" id="vplatenum" name="vplatenum">   

    <label for="purpose">Purpose:</label>
    <input type="text" id="purpose" name="purpose">   

    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination">   

    <label for="border_name">Border Name:</label>
    <input type="text" id="border_name" name="border_name">   

    <input type="submit" value="Add Record">
    </form>
</div>
@endsection