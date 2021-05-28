
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
    
  </style>
  <body>
    <table id=companies class="table table-bordered">
    <thead>
      <tr>
        <th>Invoice ID</th>
        <th>From</th>
        <th>To</th>
        <th>Product</th>
        <th>Paymethod</th>
        <th>Note</th>
        <th>Term</th>
        <th>Date created</th>
        <th>Due date</th>   
      </tr>
      </thead>
      <tbody>
            <tr>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->sender->name}}</td>
                <td>{{$invoice->receiver->name}}</td>
                <td>
                  @foreach ($invoice->products as $product)
                    <li>{{ $product->name }}</li> <br>
                  @endforeach
                </td>
                <td>{{$invoice->paymethod->bank_name }}</td>
                <td>{{$invoice->note}}</td>
                <td>{{$invoice->term}}</td>
                <td>{{$invoice->date_created}}</td>
                <td>{{$invoice->due_date}}</td>
            </tr>   
      </tbody>
    </table>
  </body>
</html>

