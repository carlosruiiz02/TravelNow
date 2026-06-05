<!DOCTYPE html>
<html>
<head>
    <title>Registrar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5" style="background-color: #1A1A26; min-height: 100vh;">

<div class="card shadow p-4" style="background-color: #12121A; border: 1px solid #333; border-radius: 16px; max-width: 480px; margin: auto;">

<h1 style="color: white; font-weight: bold;">Registrar Reserva</h1>
<p style="color: #D8C3AE; font-size: 0.9rem;">Configure los detalles de tu estancia.</p>

<form action="/reserva" method="POST">

    @csrf

    <label style="color: #A18D7A; font-size: 0.85rem;">Seleccionar Hotel</label>
    <select name="hotel_id" class="form-select mb-3" required
        style="background-color: #1e1e3a; color: white; border: 1px solid #444; border-radius: 8px;">
        <option value="">Elije un destino...</option>

    @foreach($hotels as $hotel)
        <option value="{{ $hotel['id'] }}" 
            {{ request('hotel_id') == $hotel['id'] ? 'selected' : '' }}>
            {{ $hotel['nombre'] }}
        </option>
    @endforeach
    </select>

    <div class="row mb-3">
    <div class="col-6">
        <label style="color: #A18D7A; font-size: 0.85rem;">Noches deseadas</label>
        <input type="number" name="noches" class="form-control"
            style="background-color: #1e1e3a; color: white; border: 1px solid #444; border-radius: 8px;"
              min="1" required>
    </div>
    <div class="col-6">
        <label style="color: #A18D7A; font-size: 0.85rem;">Personas que se alojarán</label>
        <input type="number" name="personas" class="form-control"
            style="background-color: #1e1e3a; color: white; border: 1px solid #444; border-radius: 8px;"
             min="1" required>
    </div>
    </div>

    <label style="color: #A18D7A; font-size: 0.85rem;">Fecha de Entrada</label>
    <input type="date" name="fecha_entrada" class="form-control mb-4"
    style="background-color: #1e1e3a; color: white; border: 1px solid #444; border-radius: 8px;"
    required>

    <button type="submit" class="btn w-100 mb-2"
    style="background-color: #FFBA67; color: #111; font-weight: bold; border-radius: 8px; padding: 12px; letter-spacing: 1px;">
    RESERVAR
    </button>

    <a href="/" class="btn w-100"
    style="background-color: #FFBA67; color: #111; font-weight: bold; border-radius: 8px; padding: 12px; letter-spacing: 1px;">
    Volver
    </a>

</form>
</div>

</body>
</html>