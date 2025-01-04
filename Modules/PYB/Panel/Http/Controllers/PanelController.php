<?php

namespace PYB\Panel\Http\Controllers;

use PYB\Panel\Models\Panel;
use PYB\Panel\Repositories\PanelRepo;
use PYB\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index(PanelRepo $panelRepo)
    {
        $this->authorize('index', Panel::class);
        return view('Panel::index', compact('panelRepo'));
    }
}
