<?php

namespace App\Http\Controllers;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Http\Requests\Member\CreateNewMemberRequest;
use App\Services\Member\Action\CreateNewMemberAction;
use App\Services\Member\Dto\CreateNewMemberDto;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function __construct(
        protected CreateNewMemberAction $createNewMemberAction
    )
    { }
    public function index()
    {

        return view('welcome');
    }

    /**
     * @throws MemberNotSavedException
     */
    public function create(CreateNewMemberRequest $request): RedirectResponse
    {
        $dto = new CreateNewMemberDto($request);

        $this->createNewMemberAction->run($dto);

        return redirect()->route('members');
    }

    public function update(): RedirectResponse
    {

    }
}
