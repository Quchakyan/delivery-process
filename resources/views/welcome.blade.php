<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Members </h1>
    <h3>Add Member! </h3>
    <form action="" method="POST">
        @csrf
        <label>
            <p>Name</p>
            <input type="text" name="name">
        </label>
        <label>
            <p>Role</p>
            <select name="role">
                <option>Director</option>
                <option>Member</option>
            </select>
        </label>
        <label>
            <p>Position</p>
            <select name="position">
                <option>Senior</option>
                <option>Middle</option>
                <option>Junior</option>
                <option>Practicioner</option>
            </select>
        </label>
        <button>Add</button>
    </form>

    <h2>Members List</h2>

</body>
</html>
