<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">

<style>

body{
    font-family: DejaVu Sans;
}

table{
    width:100%;
    border-collapse: collapse;
}

table,th,td{
    border:1px solid black;
}

th,td{
    padding:8px;
}

h2{
    text-align:center;
}

</style>

</head>

<body>

<h2>INVOICE GROCERIA</h2>

<hr>

<p>
Tanggal :
{{ date('d-m-Y') }}
</p>

<table>

<tr>

<th>Produk</th>
<th>Qty</th>
<th>Harga</th>
<th>Subtotal</th>

</tr>

@foreach($orderItems as $item)

<tr>

<td>{{ $item->product->name }}</td>

<td>{{ $item->qty }}</td>

<td>
Rp {{ number_format($item->product->price,0,',','.') }}
</td>

<td>
Rp {{ number_format($item->subtotal,0,',','.') }}
</td>

</tr>

@endforeach

</table>

<br>

<table>

<tr>

<td>Subtotal</td>

<td>
Rp {{ number_format($subtotal,0,',','.') }}
</td>

</tr>

<tr>

<td>Ongkir</td>

<td>
Rp {{ number_format($ongkir,0,',','.') }}
</td>

</tr>

<tr>

<td><b>Total</b></td>

<td>
<b>
Rp {{ number_format($grandTotal,0,',','.') }}
</b>
</td>

</tr>

</table>

</body>
</html>