<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/createUser.css') }}">
    <title>User Management System</title>
</head>

<body>
    <div class=create_user>
        <h3>Create User</h3>
        <form action="{{ route('users.storeData') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="box">
                <label for="name" class="sub_title">Name</label>
                <input type="text" class="textBox" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="box">
                <label for="email" class="sub_title">Email address</label>
                <input type="email" class="textBox" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="box">
                <label for="password" class="sub_title">Password</label>
                <input type="password" class="textBox" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="box">
                <label for="profile_picture" class="sub_title">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" accept=".jpg,.jpeg,.png">
            </div>
            <div class="box">
                <label for="salary_ctc" class="sub_title">Salary CTC</label>
                <input type="number" class="textBox" id="salary_ctc" name="salary_ctc" min="0"
                    placeholder="Enter salary">
            </div>
            <div class="box">
                <label for="department" class="sub_title">Department</label>
                <select class="textBox" id="department" name="department">
                    <option value="">Select Department</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Sales">Sales</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Finance">Finance</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Product Development">Product Development</option>
                    <option value="Operations">Operations</option>
                    <option value="Legal">Legal</option>
                </select>
            </div>
            <div class="buttons">
                <input type="submit" class="btn" value="Create">
            </div>
        </form>
    </div>
</body>

</html>
