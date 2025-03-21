<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Senal;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    // Obtener todas las noticias
    public function getNoticias()
    {
        return response()->json(Noticia::all(), 200);
    }

    // Obtener todas las señales
    public function getSenales()
    {
        return response()->json(Senal::all(), 200);
    }

    // Cargar noticias desde JSON
    public function cargarNoticias()
{
    $filePath = 'C:/Users/Usuario/Documents/My Web Sites/ModelosPredictivos/Binance/noticias.json';

    if (!file_exists($filePath)) {
        return response()->json(['error' => 'Archivo de noticias no encontrado'], 404);
    }

    $jsonContent = file_get_contents($filePath);
    $data = json_decode($jsonContent, true);

    if (!$data) {
        return response()->json(['error' => 'Error al decodificar JSON'], 400);
    }

    foreach ($data as $noticia) {
        // Convertir la fecha al formato adecuado
        $fechaFormato = Carbon::parse($noticia['fecha'])->toDateTimeString();

        Noticia::create([
            'titulo' => $noticia['titulo'],
            'link' => $noticia['link'],
            'fecha' => $fechaFormato,
            'clasificacion' => $noticia['clasificacion']
        ]);
    }

    return response()->json(['message' => 'Noticias guardadas'], 201);
}

    // Cargar señales desde CSV
    public function cargarSenales()
    {
        $filePath = 'C:/Users/Usuario/Documents/My Web Sites/ModelosPredictivos/Binance/estrategiaTrading.csv';

        if (!file_exists($filePath)) {
            return response()->json(['error' => 'Archivo CSV de señales no encontrado'], 404);
        }

        $csvData = array_map('str_getcsv', file($filePath));
        
        // Eliminar encabezados
        array_shift($csvData);

        foreach ($csvData as $row) {
            Senal::create([
                'timestamp' => $row[0],  // Columna de tiempo
                'close' => $row[1],      // Precio de cierre
                'signal' => $row[4]      // Columna de señal (HOLD, BUY, SELL)
            ]);
        }

        return response()->json(['message' => 'Señales guardadas'], 201);
    }
}
