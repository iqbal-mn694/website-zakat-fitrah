<?php

namespace App\Http\Controllers;

use App\Filament\Pages\LaporanDistribusi;
use Illuminate\Http\Request;

class ExportLaporanController extends Controller
{
    public function __invoke()
    {
        {
            $page = app(LaporanDistribusi::class);
            $page->mount();

            return $page->exportPdf();
        }
    }
}
