<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cintas;
use App\Models\Prestamo;
use App\Models\Entrega;
use App\Models\CintasLimpieza;

class ExportController extends Controller
{
    private function exportCsv($filename, $headers, $data)
    {
        return response()->streamDownload(function () use ($headers, $data) {

            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Encabezados
            fputcsv($file, $headers);

            // Datos
            foreach ($data as $row) {
                fputcsv($file, $row);
            }

            fclose($file);

        }, $filename);
    }

    public function usuarios()
    {
        $usuarios = User::all();

        $data = [];

        foreach ($usuarios as $usuario) {

            $data[] = [
                $usuario->id,
                $usuario->id_usuario,
                $usuario->nombre_apellido
            ];
        }

        return $this->exportCsv(
            'usuarios.csv',
            ['ID', 'id_usuario', 'nombre'],
            $data
        );
    }

    public function cintas()
    {
        $cintas = Cintas::all();

        $data = [];

        foreach ($cintas as $cinta) {

            $data[] = [
                $cinta->codigo,
                $cinta->caja_resguardo,
                $cinta->anaquel,
                $cinta->nivel,
                $cinta->sede
            ];
        }

        return $this->exportCsv(
            'cintas.csv',
            ['Código', 'Caja', 'Anaquel', 'Nivel', 'Sede'],
            $data
        );
    }

    public function prestamos()
    {
        $prestamos = Prestamo::all();

        $data = [];

        foreach ($prestamos as $prestamo) {

            $data[] = [
                $prestamo->id,
                $prestamo->codigo_cinta,
                $prestamo->usuario_solicitud,
                $prestamo->fecha_prestamo
            ];
        }

        return $this->exportCsv(
            'prestamos.csv',
            ['ID', 'Codigo_cinta', 'Usuario_solicitud', 'Fecha'],
            $data
        );
    }

    public function entregas()
    {
        $entregas = Entrega::all();

        $data = [];

        foreach ($entregas as $entrega) {

            $data[] = [
                $entrega->id,
                $entrega->id_prestamo,
                $entrega->codigo_cinta,
                $entrega->usuario_solicitud,
                $entrega->fecha_prestamo,
                $entrega->usuario_entrega,
                $entrega->fecha_entrega,
                $entrega->estatus
            ];
        }

        return $this->exportCsv(
            'entregas.csv',
            ['ID', 'id_prestamo', 'codigo_cinta', 'usuario_solicitud', 'fecha_prestamo', 'usuario_entrega', 'fecha_entrega', 'estatus'],
            $data
        );
    }

}