<?php declare(strict_types=1);

namespace App\Http\Controllers\Resolver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

use App\Packages\Resolver\R1\LabelType;
use App\Packages\Resolver\R1\OutputTaskCommand;


final class ResolverController extends Controller
{
    public function __construct(private readonly OutputTaskCommand $command)
    {
        //   
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {         
        $random = Arr::random(LabelType::cases());
        $task   = 'Chelsea Chelsea Chelsea!!!!!';

        $formatted = $this->command->execute($task, $random);

        Log::info($formatted);
    }
}
