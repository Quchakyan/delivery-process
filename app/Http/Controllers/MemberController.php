<?php

namespace App\Http\Controllers;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Http\Requests\Member\MemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Services\Member\Action\CreateNewMemberAction;
use App\Services\Member\Action\UpdateMemberAction;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\UpdateMemberDto;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function __construct(
        protected CreateNewMemberAction $createNewMemberAction,
        protected UpdateMemberAction $updateMemberAction
    )
    { }
    public function index()
    {
        return view('welcome');
    }

    /**
     * @throws MemberNotSavedException
     */
    public function create(MemberRequest $request): RedirectResponse
    {
        $dto = new MemberDto($request);

        $this->createNewMemberAction->run($dto);

        return redirect()->route('members');
    }

    /**
     * @throws MemberNotSavedException
     */
    public function update(UpdateMemberRequest $request): RedirectResponse
    {
        $dto = new UpdateMemberDto($request);

        $this->updateMemberAction->run($dto);

        return redirect()->route('members');
    }
}
