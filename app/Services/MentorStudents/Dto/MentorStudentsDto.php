<?php

namespace App\Services\MentorStudents\Dto;

use App\Http\Requests\MentorStudents\MentorStudentsRequest;

class MentorStudentsDto
{
    protected int $mentorId;
    protected array|null $studentIds;

    public function __construct(MentorStudentsRequest $request)
    {
        $this->mentorId = $request->getMentorId();
        $this->studentIds = $request->getStudentIds();
    }

    public function getMentorId(): int
    {
        return $this->mentorId;
    }

    public function getStudentIds(): array|null
    {
        return $this->studentIds;
    }
}
