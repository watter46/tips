<?php declare(strict_types=1);

namespace App\Packages\Resolver\R1;


enum LabelType
{
    case Todo;
    case Fix;
    case Idea;

    public function comment(): string
    {
        return match($this) {
            self::Todo => 'タスクを開始しましょう!!',
            self::Fix  => 'タスクを修正しましょう!!',
            self::Idea => 'アイデアを記録します!!'
        };
    }
}
