<?php

namespace App\Http\Requests\MentorStudents;

use Illuminate\Foundation\Http\FormRequest;

class MentorStudentsRequest extends FormRequest
{
    const MENTOR_ID = 'mentor_id';
    const STUDENT_IDS = 'student_ids';
    const STUDENT_ID = 'student_ids.*';
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::MENTOR_ID => [
                'required',
                'integer'
            ],
            self::STUDENT_IDS => 'sometimes | array',
            self::STUDENT_ID => 'required_with:student_ids | integer'
        ];
    }

    public function getMentorId(): int
    {
        return $this->get(self::MENTOR_ID);
    }

    public function getStudentIds(): array | null
    {
        return $this->get(self::STUDENT_IDS);
    }
}
