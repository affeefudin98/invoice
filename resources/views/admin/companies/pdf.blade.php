<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
  
  <body>
    <table id=companies class="table table-bordered">
    <thead>
      <tr>
        <td><b>Name</b></td>
        <td><b>Address</b></td>
        <td><b>Contact</b></td>     
        <td><b>Email</b></td>  
        <td><b>Website</b></td>  
        <td><b>PIC Name</b></td>  
        <td><b>PIC ID</b></td>  
      </tr>
      </thead>
      <tbody>
          @foreach ($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->address}}</td>
                <td>{{$company->contact}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->PIC_name}}</td>
                <td>{{$company->PIC_id}}</td>  
            </tr>   
          @endforeach
      </tbody>
    </table>
  </body>
</html>