<?php
public function imprimir($id)
{
    $registro = Registro::findOrFail($id);
    return view('controlVehicular.imprimir', compact('registro'));
}