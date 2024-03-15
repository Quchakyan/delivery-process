<?php

namespace App\View\Components\windows;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UpdateMember extends Component
{
    public array $member;

    public function __construct(array $member)
    {
//        $this->member = $member;
    }

    public function render(): View|Closure|string
    {
        return view('components.windows.update-member');
    }
}
