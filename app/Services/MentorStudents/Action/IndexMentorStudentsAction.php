<?php

namespace App\Services\MentorStudents\Action;

use App\Repositories\Read\Member\MemberReadRepository;
use Illuminate\Support\Collection;
class IndexMentorStudentsAction
{
    public function __construct(protected MemberReadRepository $memberReadRepository)
    {}

    public function run(): Collection
    {
        $data = collect();

        $data['mentorStudents'] = $this->memberReadRepository->getWithStudents();
        $data['mentors'] = $this->memberReadRepository->getUsersWhichWasNotPractician();
        $data['members'] = $this->memberReadRepository->index();

        return $data;
    }
}
