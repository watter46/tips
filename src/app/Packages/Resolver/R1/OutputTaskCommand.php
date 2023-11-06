<?php declare(strict_types=1);

namespace App\Packages\Resolver\R1;

use App\Packages\Resolver\R1\Formatter\FixLabelFormatter;
use App\Packages\Resolver\R1\Formatter\TodoLabelFormatter;
use App\Packages\Resolver\R1\LabelFormatterResolver;
use App\Packages\Resolver\R2\Formatter\IdeaLabelFormatter;


final readonly class OutputTaskCommand
{
    public function __construct(private readonly LabelFormatterResolver $resolver)
    {
        $resolver
            ->add(new TodoLabelFormatter)
            ->add(new FixLabelFormatter)
            ->add(new IdeaLabelFormatter);
    }

    public function execute($task, LabelType $label): string
    {
        $formatter = $this->resolver->resolve($label);

        return $formatter->format($task);
    }
}
