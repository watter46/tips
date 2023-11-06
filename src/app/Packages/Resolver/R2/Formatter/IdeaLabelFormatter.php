<?php declare(strict_types=1);

namespace App\Packages\Resolver\R2\Formatter;

use App\Packages\Resolver\R1\LabelFormatterInterface;
use App\Packages\Resolver\R1\LabelType;


final readonly class IdeaLabelFormatter implements LabelFormatterInterface
{
    public function __construct()
    {
        
    }
    
    public function format(string $task): string
    {
        $date    = now()->format('m-d H:i');
        $name    = $this->label()->name;
        $comment = $this->label()->comment();
        
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
        return LabelType::Idea;
    }

    public function supports(LabelType $label): bool
    {
        return $label === $this->label();   
    }
}