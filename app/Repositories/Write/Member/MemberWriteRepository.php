<?php

namespace App\Repositories\Write\Member;

use App\Exceptions\Member\MemberDeletingFailedException;
use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Models\Member;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\UpdateMemberDto;
use Illuminate\Database\Eloquent\Builder;

class MemberWriteRepository implements MemberWriteRepositoryInterface
{
    public function __construct(protected MemberReadRepository $memberReadRepository)
    { }

    private function query(): Builder
    {
        return Member::query();
    }

    private function newMember(): Member
    {
        return new Member();
    }

    /**
     * @throws MemberNotSavedException
     */
    public function create(MemberDto $dto): Member
    {
        $member = $this->newMember();

        return $this->operateMember($member, $dto);
    }

    /**
     * @throws MemberNotSavedException
     */
    public function update(UpdateMemberDto $dto): Member
    {
        $member = $this->memberReadRepository->getById($dto->getId());

        return $this->operateMember($member, $dto);
    }

    /**
     * @throws MemberNotSavedException
     */
    private function operateMember(Member $member, MemberDto $dto): Member
    {
        $member->setName($dto->getName())
            ->setLastname($dto->getLastname())
            ->setRoleId($dto->getRoleId())
            ->setPositionId($dto->getPositionId())
            ->setMentorId($dto->getMentorId())
            ->setManualBusyness($dto->getManualBusyness());

        $this->save($member);

        return $member;
    }

    /**
     * @throws MemberDeletingFailedException
     */
    public function delete(int $id): void
    {
        $query = $this->query()->find($id);

        $query->exists() && !$query->delete() && throw new MemberDeletingFailedException();
    }

    /**
     * @throws MemberNotSavedException
     */
    public function save(Member $member): bool
    {
        if (!$member->save())
        {
            throw new MemberNotSavedException();
        }

        return true;
    }
}
