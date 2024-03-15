<?php

namespace App\Services\Member\Action;

use App\Exceptions\Member\MemberDeletingFailedException;
use App\Http\Requests\GetIdForDeletingRequest;
use App\Repositories\Write\Member\MemberWriteRepository;

class DeleteMemberAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    /**
     * @throws MemberDeletingFailedException
     */
    public function run(GetIdForDeletingRequest $request): void
    {
        $this->memberWriteRepository->delete($request->getId());
    }
}
