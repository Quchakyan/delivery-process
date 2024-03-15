<?php

namespace App\ConstsLibrary;

trait LibraryConsts
{
    /**
     * MEMBER Relation constants
     */
    const MEMBER_OWN_PROJECTS = 'ownProjects';
    const MEMBER_PROJECTS = 'projects';
    const MEMBER_PROJECT_STATS = 'projectStats';
    const MEMBER_POSITION = 'position';
    const MEMBER_ROLE = 'role';
    const MEMBER_STUDENTS = 'students';
    const MEMBER_RELATIONS = [
        self::MEMBER_OWN_PROJECTS,
        self::MEMBER_PROJECTS,
        self::MEMBER_PROJECT_STATS,
        self::MEMBER_POSITION,
        self::MEMBER_ROLE,
        self::MEMBER_STUDENTS
    ];

    /**
     * PROJECT Relation constants
     */

    const PROJECT_OWNER = 'owner';
    const PROJECT_CURRENCY = 'currency';

    const PROJECT_RELATIONS = [
        self::PROJECT_OWNER,
        self::PROJECT_CURRENCY
    ];

    /**
     * TEAM Relation constants
     */

    const TEAM_TEAMMATES = 'teammates';

    /**
     * ROLES constants
     */

    const ROLE_PRACTICIAN_ID = 1;
    const ROLE_JUNIOR_ID = 2;
    const ROLE_MIDDLE_ID = 3;
    const ROLE_SENIOR_ID = 4;

    const ROLES = [
        self::ROLE_PRACTICIAN_ID,
        self::ROLE_JUNIOR_ID,
        self::ROLE_MIDDLE_ID,
        self::ROLE_SENIOR_ID,
    ];
}
