<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function hotel()
    {
        //API
        //$response=Http::get('https://jsonplaceholder.typicode.com/posts');
        $path=storage_path('app/public/hoteles.json');

        //convertir Json a arreglo
        //$hotels=$response->json();
        $hotels=json_decode(File::get($path), true);

        //retorno
        return view('hotel',compact('hotels'));
    }
    public function reserva()
    {
        $path = storage_path('app/public/hoteles.json');

        $hotels = json_decode(File::get($path), true);

        return view('reserva', compact('hotels'));
    }
    // Guarda la reserva en session
    public function storeReserva(Request $request)
    {
        $reservas = session()->get('reservas', []);

        $reservas[] = [
            'hotel_id'      => $request->hotel_id,
            'noches'        => $request->noches,
            'personas'      => $request->personas,
            'fecha_entrada' => $request->fecha_entrada,
        ];

        session()->put('reservas', $reservas);

        return redirect('/misreservas')->with('success', '¡Reserva registrada!');
    }

    // Muestra todas las reservas guardadas
    public function misReservas()
    {
        $reservas = session()->get('reservas', []);

    // Cargar hoteles para mostrar el nombre
        $path   = storage_path('app/public/hoteles.json');
        $hotels = json_decode(File::get($path), true);

        return view('misreservas', compact('reservas', 'hotels'));
    }

}


