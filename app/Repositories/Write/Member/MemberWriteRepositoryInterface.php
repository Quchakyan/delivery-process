<?php

namespace App\Repositories\Write\Member;

use App\Models\Member;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\UpdateMemberDto;

interface MemberWriteRepositoryInterface
{
    public function create(MemberDto $dto): Member;
    public function update(UpdateMemberDto $dto): Member;
    public function addMentorAndStudents(int $mentorId, array $studentIds): bool;
    public function operateMentorAndStudents(int $mentorId, ?array $studentIds = []): bool;
    public function delete(int $id): void;
    public function save(Member $member): bool;

}
