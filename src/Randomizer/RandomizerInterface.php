<?php


namespace ESoft\Randomizer;


interface RandomizerInterface
{
    public function generate(int $length):string;

}
