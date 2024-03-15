<?php

namespace App\Services\MentorStudents\Action;

use App\Repositories\Write\Member\MemberWriteRepository;
use App\Services\MentorStudents\Dto\MentorStudentsDto;

class UpdateMentorStudentsAction
{
    public function __construct(protected MemberWriteRepository $memberWriteRepository)
    {}

    public function run(MentorStudentsDto $dto): bool
    {
        return $this->memberWriteRepository->operateMentorAndStudents($dto->getMentorId(), $dto->getStudentIds());
    }
}
