<?php

namespace App\Services\MentorStudents\Action;

use App\Http\Requests\GetIdForDeletingRequest;
use App\Repositories\Write\Member\MemberWriteRepository;

class DeleteMentorStudentsAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    public function run(GetIdForDeletingRequest $request): void
    {
        $this->memberWriteRepository->deleteStudents($request->getId());
    }
}
