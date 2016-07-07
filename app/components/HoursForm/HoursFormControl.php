<?php

namespace App\Components;

use App;
use Nette;
use Nette\Application\UI\Form;

class HoursFormControl extends Nette\Application\UI\Control
{

    private $x;

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function render()
    {
        $this->template->setFile( __DIR__ . '/HoursFormControl.latte' );
        $this->template->x = $this->x;
        $this->template->render();
    }

    protected function createComponentHoursForm()
    {
        $form = new Form();

        $form->getElementPrototype()->class( 'ajax' );

        $form->addInteger('hours', '')
            ->setRequired(TRUE)
            ->addRule(Form::RANGE, 'Zadejte počet hodin (%d až %d)', array(0, 99))
            ->setAttribute('class', 'form-control')
            ->setAttribute('placeholder', 'Počet hodin');

        $form->addSubmit( 'create', 'Ulož' );

        $form->onSuccess[] = [$this, 'hoursFormSubmitted'];
        return $form;
    }

    public function hoursFormSubmitted( Form $form )
    {

        $aValues = $form->getValues( TRUE );

        dump($aValues);
        dump($this->presenter->isAjax());
        exit;
    }

}

