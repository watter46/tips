<?php declare(strict_types=1);

namespace App\Packages\Resolver\R1;


interface LabelFormatterInterface
{    
    /**
     * 出力用にフォーマットする
     *
     * @param  string $task
     * @return string
     */
    public function format(string $task): string;
    
    /**
     * ラベルがフォーマットと一致するか判定する
     *
     * @param  LabelType $label
     * @return bool
     */
    public function supports(LabelType $label): bool;
    
    /**
     * フォーマットのラベルを選択する
     *
     * @return LabelType
     */
    public function label(): LabelType;
}