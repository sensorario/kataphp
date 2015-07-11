<?php
namespace Sensorario\DiamondKata;

final class DiamondKata
{
    const EOL    = "\n";
    const FILLER = " ";

    private $input;

    private function __construct($input)
    {
        $this->input = $input;
    }

    public static function createFrom($input)
    {
        return new self($input);
    }

    public function output()
    {
        for ($i = 0; $i <= $this->size(); $i++) {
            $base = str_pad(self::FILLER, ($i*2)+1);
            $base[0] = chr(65 + $i);
            $base[strlen($base)-1] = $base[0];

            $lines[$i] = str_pad(
                $base,
                $this->size(),
                self::FILLER,
                STR_PAD_BOTH
            ) . self::EOL;
        }

        return $this->buildOutput($lines);
    }

    private function buildOutput(array $lines)
    {
        $output = '';
        $size   = $this->size();
        $what   = ceil($size / 2);

        for ($i = 0; $i < $size; $i++) {
            $output .= $lines[
                ($i < $size/2)
                ? ($i % $what)
                : ($what-2) - ($i % $what)
            ];
        }

        return $output;
    }

    public function size()
    {
        return (ord($this->input) - 65) * 2 + 1;
    }
}
