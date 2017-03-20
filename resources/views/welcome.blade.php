<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel CRUD Operations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
  @if ($set == 'edit')
  <h2>Edit Information</h2>
  <form class="form-inline" method="post" action="/update-customer">
     @foreach ($customer as $cus)
      
    <div class="form-group">
      <input type="hidden" name="id" value='{{$cus->id}}' >
      <label for="cname">Name:</label>
      <input type="cname" name="cname" class="form-control" value ='{{$cus->cname}}'  id="email" placeholder="Enter customer name">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="address" name="address" value = '{{$cus->address}}' class="form-control" id="address" placeholder="Enter address">
    </div>
     <div class="form-group">
      <label for="phoneno">Phone no:</label>
      <input type="phoneno" name="phoneno" value = '{{$cus->phoneno}}' class="form-control" id="phoneno" placeholder="Enter phone no">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-default">Submit</button>
      @endforeach
  </form>
  @else
  <h2>Add new record</h2>
  <form class="form-inline" method="post" action="/addcustomer">
    <div class="form-group">
      <label for="cname">Name:</label>
      <input type="cname" name="cname" class="form-control" id="email" placeholder="Enter customer name">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="address" name="address" class="form-control" id="address" placeholder="Enter address">
    </div>
     <div class="form-group">
      <label for="phoneno">Phone no:</label>
      <input type="phoneno" name="phoneno" class="form-control" id="phoneno" placeholder="Enter phone no">
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  @endif
  
</div>
@if ($set == 'view')
<h1> List of Records </h1>
   <table class="table table-striped">
    <thead>
      <tr>
        <th>Customer name</th>
        <th>Address</th>
        <th>Phone no</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($customers as $item)
     <tr><td>{{ $item->cname }} </td><td>{{ $item->address }} </td><td>{{ $item->phoneno }} </td>
     <td><a href="./edit/{{ $item->id }}"> Edit</a></td>
     <td><a href="./delete/{{ $item->id }}"> Delete</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endif
</body>
</html>
