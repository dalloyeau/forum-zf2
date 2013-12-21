<?php

namespace Application\Model;


class Discussion  
{
    public $id;
    public $idTheme;
    public $titre;

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id']))     ? $data['id']     : null;
        $this->idTheme = (isset($data['idTheme'])) ? $data['idTheme'] : null;
        $this->titre  = (isset($data['titre']))  ? $data['titre']  : null;
    }

}