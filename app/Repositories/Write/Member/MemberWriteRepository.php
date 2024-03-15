<?php

namespace App\Repositories\Write\Member;

use App\Exceptions\Member\MemberDeletingFailedException;
use App\Exceptions\MemberExceptions\MemberNotSavedException;
use App\Exceptions\MemberExceptions\MemberUpdateFailedException;
use App\Models\Member;
use App\Models\MemberProject;
use App\Repositories\Read\Member\MemberReadRepository;
use App\Services\Member\Dto\MemberDto;
use App\Services\Member\Dto\MemberProjectsDto;
use App\Services\Member\Dto\UpdateMemberDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class MemberWriteRepository implements MemberWriteRepositoryInterface
{
    public function __construct(protected MemberReadRepository $memberReadRepository)
    {}

    private function query(): Builder
    {
        return Member::query();
    }

    private function memberProjectsQuery(): Builder
    {
        return MemberProject::query();
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

    public function addMentorAndStudents(int $mentorId, array $studentIds): bool
    {
        $this->query()->whereIn('id', $studentIds)->update(['mentor_id' => $mentorId]);

        return true;
    }

    public function deleteStudents($id): void
    {
        $this->query()->where('mentor_id', $id)->update(['mentor_id' => null]);
    }

    public function operateMentorAndStudents(int $mentorId, ?array $studentIds = []): bool
    {
        try {
            DB::beginTransaction();

            $this->deleteStudents($mentorId);

            $studentIds && $this->query()
                ->whereIn('id', $studentIds)
                ->update(['mentor_id' => $mentorId]);

            DB::commit();
        } catch (MemberUpdateFailedException) {
            DB::rollBack();
        }

        return true;
    }

    /**
     * @throws MemberDeletingFailedException
     */
    public function delete(int $id): void
    {
        $query = $this->query()->where('id', $id);

        (!$query->exists() || !$query->delete()) && throw new MemberDeletingFailedException();
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

    private function syncMemberProjects(array $data, int $userId): void
    {
        try {
            DB::beginTransaction();

            $this->memberProjectsQuery()->where('member_id', $userId)->delete();
            $this->memberProjectsQuery()->insert($data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return;
        }
    }

    public function editMemberProjects(MemberProjectsDto $dto): bool
    {
        $userId = $dto->getUserId();
        $data = [];

        foreach ($dto->getParams() as $params)
        {
            if(!$params['delete'])
            {
                $data[] = [
                    "member_id" => $userId,
                    "role_in_project" => $params['role_in_project'],
                    "is_official" => $params['is_official'],
                    "project_id" => $params['project_id'],
                    "bid" => 80
                ];
            }
        }

        $this->syncMemberProjects($data, $userId);

        return true;
    }
}
