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
    <table id=products class="table table-bordered">
    <thead>
      <tr>
        <td><b>Name</b></td>
        <td><b>Description</b></td>
        <td><b>Price</b></td>     
      </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
            </tr>   
          @endforeach
      </tbody>
    </table>
  </body>
</html>