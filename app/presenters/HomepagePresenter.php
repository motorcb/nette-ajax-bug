<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\UI\Multiplier;
use App;
use App\Components;

class HomepagePresenter extends BasePresenter
{

    protected function createComponentHoursForm()
    {
        return new Multiplier(function ($x) {
            return new App\Components\HoursFormControl($x);
        });
    }

}
