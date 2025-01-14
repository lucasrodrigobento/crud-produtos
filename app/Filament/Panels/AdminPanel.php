<?php

namespace App\Filament\Panels;

use Filament\Panel;

class AdminPanel extends Panel
{
    public function configure(): static
    {
        $this->id('admin');
        $this->path('admin');
        $this->login();

        return $this;
    }
}
