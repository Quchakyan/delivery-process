<?php

namespace App\Http\Controllers;

use App\Exceptions\Member\MemberDeletingFailedException;
use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Http\Requests\Member\EditMemberProjectsRequest;
use App\Http\Requests\Member\MemberRequest;
use App\Http\Requests\Member\UpdateMemberRequest;
use App\Http\Requests\MentorStudents\MentorStudentsRequest;
use App\Services\Member\Action\CreateNewMemberAction;
use App\Services\Member\Action\DeleteMemberAction;
use App\Services\Member\Action\EditMemberProjectsAction;
use App\Services\Member\Action\IndexMembersAction;
use App\Services\Member\Action\IndexMemberWithProjectsAction;
use App\Services\Member\Action\UpdateMemberAction;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\MemberProjectsDto;
use App\Services\Member\Dto\UpdateMemberDto;
use App\Services\MentorStudents\Action\CreateMentorStudentsAction;
use App\Services\MentorStudents\Action\DeleteMentorStudentsAction;
use App\Services\MentorStudents\Action\IndexMentorStudentsAction;
use App\Services\MentorStudents\Action\UpdateMentorStudentsAction;
use App\Services\MentorStudents\Dto\MentorStudentsDto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function __construct(
        protected CreateNewMemberAction         $createNewMemberAction,
        protected UpdateMemberAction            $updateMemberAction,
        protected IndexMembersAction            $indexMembersAction,
        protected IndexMentorStudentsAction     $indexMemberStudentsAction,
        protected IndexMemberWithProjectsAction $indexMemberWithProjectsAction,
        protected CreateMentorStudentsAction    $createMentorStudentsAction,
        protected UpdateMentorStudentsAction    $updateMentorStudentsAction,
        protected EditMemberProjectsAction      $editMemberProjectsAction,
        protected DeleteMemberAction            $deleteMemberAction,
        protected DeleteMentorStudentsAction    $deleteMentorStudentsAction,
    ) {}

    public function index(): View
    {
        $data = $this->indexMembersAction->run();

        return view('pages.members', [...$data]);
    }

    /**
     * @throws MemberNotSavedException
     */
    public function create(MemberRequest $request): RedirectResponse
    {
        $dto = new MemberDto($request);

        $this->createNewMemberAction->run($dto);

        return redirect()->route('members')->with('success', true);
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

    /**
     * @throws MemberDeletingFailedException
     */
    public function delete(GetIdForDeletingRequest $request): RedirectResponse
    {
        $this->deleteMemberAction->run($request);

        return redirect()->route('members');
    }

    public function resetMentor(GetIdForDeletingRequest $request): RedirectResponse
    {
        $this->deleteMentorStudentsAction->run($request);

        return redirect()->route('mentors');
    }

    public function mentors(): View
    {
        $data = $this->indexMemberStudentsAction->run();

        return view('pages.mentor-learners', [...$data]);
    }

    public function memberProjects(): View
    {
        $data = $this->indexMemberWithProjectsAction->run();

        return view('pages.member-projects', [...$data]);
    }

    public function createMentorStudents(MentorStudentsRequest $request): RedirectResponse
    {
        $dto = new MentorStudentsDto($request);

        $this->createMentorStudentsAction->run($dto);

        return redirect()->route('mentors');
    }

    public function operateMentorStudents(MentorStudentsRequest $request): RedirectResponse
    {
        $dto = new MentorStudentsDto($request);

        $this->updateMentorStudentsAction->run($dto);

        return redirect()->route('mentors');
    }

    public function handleMemberProjects(EditMemberProjectsRequest $request): bool
    {
        $dto = new MemberProjectsDto($request);

        $this->editMemberProjectsAction->run($dto);

        return true;
    }
}
