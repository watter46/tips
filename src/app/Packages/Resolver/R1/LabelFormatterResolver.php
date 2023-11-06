<?php declare(strict_types=1);

namespace App\Packages\Resolver\R1;

use Exception;
use Illuminate\Support\Collection;


final readonly class LabelFormatterResolver
{
    /** @var Collection<int,LabelFormatterInterface> $formatters */
    private Collection $formatters;
    
    public function __construct()
    {
        $this->formatters = collect();
    }
    
    /**
     *　フォーマッターを追加する
     *
     * @param  LabelFormatterInterface $formatter
     * @return self
     */
    public function add(LabelFormatterInterface $formatter): self
    {
        $this->formatters->push($formatter);

        return $this;
    }
    
    /**
     * 指定のフォーマッターを取得する
     *
     * @param  LabelType $label
     * @return LabelFormatterInterface
     */
    public function resolve(LabelType $label): LabelFormatterInterface
    {
        foreach($this->formatters as $formatter) {
            if ($formatter->supports($label)) {
                return $formatter;
            }
        }

        throw new Exception('サポートされていないラベルです:' . $label->name);
    }
}
