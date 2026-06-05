<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelNow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        font-family: Arial;
        background: #111118;
        padding: 0;
    }

    /* Codigo de la Barra de navegacion*/
    .navbar-custom {
        background: #1a1a24;
        padding: 16px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #333;
    }
    .navbar-custom .brand {
        color: #FFBA67;
        font-size: 1.4rem;
        font-weight: bold;
    }
    .navbar-custom .nav-links a {
        color: #ccc;
        text-decoration: none;
        margin-left: 20px;
    }
    .navbar-custom .nav-links a.active {
        color: #FFBA67;
        border-bottom: 2px solid #FFBA67;
        padding-bottom: 2px;
    }

    /* Codigo para la tabla */
    .table-wrapper {
        padding: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #1a1a24;
        border-radius: 12px;
        overflow: hidden;
    }

    th {
        background: #222230;
        color: #FFBA67;
        padding: 14px 12px;
        text-align: left;
        font-size: 0.8rem;
        letter-spacing: 1px;
        border-bottom: 1px solid #333;
    }

    td {
        padding: 16px 12px;
        color: #ccc;
        border-bottom: 1px solid #2a2a38;
        vertical-align: middle;
    }

    tr:hover td {
        background: #22222e;
    }

    img {
        width: 70px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }

    .badge-hab {
        background: #2a2a3a;
        color: #aaa;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
    }
</style>
    
</head>
<body>

<div class="navbar-custom">
    <span class="brand">Mis Reservas</span>
    <div class="nav-links">
        <a href="/hotel">Hoteles</a>
        <a href="/reserva">Reservar</a>
        <a href="/misreservas" class="active">Mis Reservas</a>
        <a href="/">Inicio</a>
    </div>
</div>

<div class="table-wrapper">
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>HOTEL</th>
            <th>CIUDAD</th>
            <th>PRECIO/NOCHE</th>
            <th>NOCHES</th>
            <th>PERSONAS</th>
            <th>FECHA ENTRADA</th>
            <th>TOTAL</th>
        </tr>
    </thead>

    <tbody>
        @forelse($reservas as $i => $reserva)
            @php
                $hotel = collect($hotels)->firstWhere('id', (int) $reserva['hotel_id']);
                $total = $hotel ? $hotel['precio_por_noche'] * $reserva['noches'] : 0;
            @endphp
            
            <tr>
                <td style="color:#888; font-size:0.8rem;">{{ $i + 1 }}</td>
                <td style="color:white; font-weight:bold;">{{ $hotel['nombre'] }}</td>
                <td>{{ $hotel['ciudad'] }}</td>
                <td style="color:white; font-weight:bold;">${{ number_format($hotel['precio_por_noche'], 0, ',', '.') }}</td>
                <td><span class="badge-hab">{{ $reserva['noches'] }} noches</span></td>
                <td><span class="badge-hab">{{ $reserva['personas'] }} personas</span></td>
                <td>{{ $reserva['fecha_entrada'] }}</td>
                <td style="color:#FFBA67; font-weight:bold;">${{ number_format($total, 0, ',', '.') }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center; color:#666; padding:30px;">
                    No tienes reservas aún. <a href="/hotel" style="color:#FFBA67;">Ver hoteles</a>
                    </td>
                </tr>
        @endforelse
    </tbody>
</table>
</div>
</body>
</html>