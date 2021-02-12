<?php

class Archer extends Character
{

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 15;
        $this->carquois = 20;
        $this->doubleDmg = 30;
    }



    public function turn($target) {
        $rand = rand(1, 10);
        if($this->carquois == 0){
            $status = $this->attack($target);
        }
        else if ($rand >=3) {
            $status = $this->fleche($target);
        } else if ($rand <= 3) {
            $status = $this->valor($target);        
        }
        return $status;
    }


    public function fleche($target) {
        $arrowUsed = 1;
        if ($arrowUsed > $this->carquois) {
            $this->carquois = 0;
        } 
        else {
            $this->carquois -= $arrowUsed;
        }

        $target->setHealthPoints($this->damage);
        $status = "$this->name lances une fleche à $target->name ! Il reste $target->healthPoints points de vie à $target->name ! Il reste $this->carquois fleches a Quinn";
        return $status;
    }

    public function valor($target) {
        $target->setHealthPoints($this->doubleDmg);
        $status = "$this->name se concentres pour envoyer valor sur un point faible de $target->name ! Il reste $target->healthPoints points de vie à $target->name !  ";
        return $status;
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name n'as plus de fleches et décide de donner un coup de dague à $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        return $status;
    }

}