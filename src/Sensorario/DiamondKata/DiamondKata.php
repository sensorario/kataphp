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

    public static function withChar($input)
    {
        return new self($input);
    }

    public function output()
    {
        $asciiValueForA = 65;

        for ($charPosition = 0; $charPosition <= $this->countLines(); $charPosition++) {
            $lineSize    = ($charPosition * 2) + 1;
            $currentLine = str_pad(self::FILLER, $lineSize);

            $currentChar = chr($asciiValueForA + $charPosition);
            $currentLine[0]                      = $currentChar;
            $currentLine[strlen($currentLine)-1] = $currentChar;

            $lines[$charPosition] = str_pad(
                $currentLine,
                $this->countLines(),
                self::FILLER,
                STR_PAD_BOTH
            ) . self::EOL;
        }

        return $this->buildOutput($lines);
    }

    private function buildOutput(array $lines)
    {
        $output = '';
        $countLines   = $this->countLines();
        $what   = ceil($countLines / 2);

        for ($charPosition = 0; $charPosition < $countLines; $charPosition++) {
            $centerOfTheLine = $countLines/2;

            $output .= $lines[
                ($charPosition < $centerOfTheLine)
                ? ($charPosition % $what)
                : ($what-2) - ($charPosition % $what)
            ];
        }

        return $output;
    }

    public function countLines()
    {
        return (ord($this->input) - 65) * 2 + 1;
    }
}
