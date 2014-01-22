<?php
namespace PaperRockScissors;

interface IChoice
{
    public function winVersus(IChoice $choice);
}
