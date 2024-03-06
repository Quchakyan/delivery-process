<?php

namespace App\Http\Controllers;

use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Http\Requests\Member\MemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Services\Member\Action\CreateNewMemberAction;
use App\Services\Member\Action\UpdateMemberAction;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\UpdateMemberDto;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function __construct(
        protected CreateNewMemberAction $createNewMemberAction,
        protected UpdateMemberAction $updateMemberAction,
        protected MemberReadRepository $memberReadRepository
    )
    { }

    public function index()
    {
        //test
        return $this->memberReadRepository->index();
    }

    /**
     * @throws MemberNotSavedException
     */
    public function create(MemberRequest $request): RedirectResponse
    {
        $dto = new MemberDto($request);

        $this->createNewMemberAction->run($dto);

        //change return
        return redirect()->route('members');
    }

    /**
     * @throws MemberNotSavedException
     */
    public function update(UpdateMemberRequest $request): RedirectResponse
    {
        $dto = new UpdateMemberDto($request);

        $this->updateMemberAction->run($dto);

        //change return
        return redirect()->route('members');
    }

    public function getWithStudents()
    {
        //test
        $data = $this->memberReadRepository->getWithStudents(1);
        return response()->json($data);
    }
}
