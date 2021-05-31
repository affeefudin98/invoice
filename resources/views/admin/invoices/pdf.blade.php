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
          <th>Invoice No</th>
          <th>From</th>
          <th>To</th>
          <th>Paymethod</th>
          <th>Note</th>
          <th>Term</th>
          <th>Date created</th>
          <th>Due date</th>   
        </tr>
        </thead>
        <tbody>
              @foreach ($invoices as $invoice)
              <tr>
                  <td>{{$invoice->id}}</td>
                  <td>{{$invoice->sender->name}}</td>
                  <td>{{$invoice->receiver->name}}</td>
                  <td>{{$invoice->paymethod->bank_name }}</td>
                  <td>{{$invoice->note}}</td>
                  <td>{{$invoice->term}}</td>
                  <td>{{$invoice->date_created}}</td>
                  <td>{{$invoice->due_date}}</td>
              </tr>   
            @endforeach
        </tbody>
    </table>
  </body>
</html>
