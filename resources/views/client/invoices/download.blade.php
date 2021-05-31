{{-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel='stylesheet' type="text/css" href="{{ asset('admin/css/styles.css') }}" />
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
</html> --}}


<<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice PDF</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Invoice #: {{ $invoice->id }}<br />
									Created: {{ $invoice->date_created }}<br />
									Due: {{ $invoice->due_date }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									From: <br>
									{{ $invoice->sender->name }}<br />
									{{ $invoice->sender->address }}<br />
									{{ $invoice->sender->email }}
								</td>

								<td>
									To: <br>
									{{ $invoice->receiver->name }}<br />
									{{ $invoice->receiver->address }}<br />
									{{ $invoice->receiver->email }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

        @php
          $amount_price = 0;
          $subtotal =  0;
        @endphp
        @foreach ($invoice->products as $key=>$product)
            <tr class="item">
              <td>{{ $product->name }}</td>
              @php
                 $amount_price = $product->pivot->amount *  $product->price;
                 $subtotal =  $subtotal + $amount_price;
              @endphp
              <td>{{ $amount_price }}</td>
            </tr>
        @endforeach

				<tr class="subtotal">
					<td></td>

					<td>Subtotal: {{ $subtotal }}</td>
				</tr>

        @php
            $tax = $subtotal *  $invoice->tax ;
        @endphp
        <tr class="tax">
					<td></td>

					<td>Tax: {{ $tax }}</td>
				</tr>
        
        @php
            $total = $subtotal + $tax;
        @endphp
        <tr class="total">
					<td></td>

					<td>Total Due: {{ $total }}</td>
				</tr>

        <tr class="heading">
          <td>Notes</td>
          <td></td>
        </tr>
        <tr class="details">
          <td>{{ $invoice->note }}</td>
          <td> </td>
        </tr>

        <tr class="heading">
          <td>Terms</td>
          <td></td>
        </tr>
        <tr class="details">
          <td>{{ $invoice->term }}</td>
          <td> </td>
        </tr>

        <tr class="heading">
					<td>Payment Method</td>

					<td> </td>
				</tr>

				<tr class="details">
					<td>{{ $invoice->paymethod->bank_name }} - {{ $invoice->paymethod->bank_no }}</td>

					<td> </td>
				</tr>
			</table>
		</div>
	</body>