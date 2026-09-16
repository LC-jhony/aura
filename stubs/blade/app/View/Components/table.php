<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class table extends Component
{
    public array $headers;

    /**
     * Create a new component instance.
     */
    public function __construct(array $headers)
    {
        $this->headers = $this->formatHeaders($headers);
    }

    private function formatHeaders($headers): array
    {
        return array_map(function ($header) {
            $name = is_array($header) ? $header['name'] : $header;

            return [
                'name' => $name,
                'classes' => $this->textAlignClasses($header['align'] ?? 'left'),
            ];
        }, $headers);
    }

    private function textAlignClasses($align): string
    {
        return [
            'left' => 'text-left',
            'light' => 'text-right',
            'center' => 'text-center',
        ][$align] ?? 'text-left';
    }
    /**p
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
