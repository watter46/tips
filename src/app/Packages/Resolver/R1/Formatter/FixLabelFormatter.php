<?php declare(strict_types=1);

namespace App\Packages\Resolver\R1\Formatter;

use App\Packages\Resolver\R1\LabelFormatterInterface;
use App\Packages\Resolver\R1\LabelType;

final readonly class FixLabelFormatter implements LabelFormatterInterface
{
    public function __construct()
    {
        
    }
    
    public function format(string $task): string
    {
        $date    = now()->format('m-d H:i');
        $name    = LabelType::Fix->name;
        $comment = LabelType::Fix->comment();
        
        $decorationLine = '';
        foreach (range(1, 50) as $i) {
            $decorationLine .= '=';
        };
        
        $contents = <<<CONTENTS
            \n
        $decorationLine
            $date: $name $comment
            $task
        $decorationLine
        CONTENTS;
        
        return $contents;
    }

    public function label(): LabelType
    {
        return LabelType::Fix;
    }

    public function supports(LabelType $label): bool
    {
        return $label === $this->label();   
    }
}