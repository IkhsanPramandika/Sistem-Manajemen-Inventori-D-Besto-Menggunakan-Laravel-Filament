<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF d'Bestoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-9ndCyUaIbzaAi2FUVXJi0CjmCapsmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous">
</head>
<body>
    <h1>D Besto</h1>
    <p>{{ $date }}</p>

    <table class="table table-striped">
        <tr>
            <th>Invoice</th>
            <th>Nama_kasir</th>
            <th>Total_harga</th>
            <th>Tanggal_transaksi</th>
        </tr>

        @php 
        $no = 1;
        @endphp
        @foreach ($Transaksi as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->Invoice}}</td>
            <td>{{ $item->Nama_kasir}}</td>
            <td>{{ $item->Total_harga}}</td>
            <td>{{ $item->Tanggal_transaksi}}</td>
        </tr>
        @endforeach
        
        
    </table>
</body>
</html>
