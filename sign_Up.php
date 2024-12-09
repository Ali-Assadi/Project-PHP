<?php
session_start();

// Initialize users array in session with two default users in a fixed array of size 10
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array_fill(0, 10, null);
    $_SESSION['users'][0] = [
        'username' => 'test1',
        'firstname' => 'aban',
        'lastname' => 'abi',
        'email' => 'test1@example.com',
        'phone' => '1234567890',
    ];
    $_SESSION['users'][1] = [
        'username' => 'test2',
        'firstname' => 'aabah',
        'lastname' => 'bahbhan',
        'email' => 'test2@example.com',
        'phone' => '0987654321',
    ];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $newUser = [
        'username' => htmlspecialchars($_POST['username']),
        'firstname' => htmlspecialchars($_POST['firstname']),
        'lastname' => htmlspecialchars($_POST['lastname']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
    ];

    // Find the first empty spot in the array to insert the new user
    for ($i = 0; $i < 10; $i++) {
        if ($_SESSION['users'][$i] === null) {
            $_SESSION['users'][$i] = $newUser;
            break;
        }
    }

    // Redirect to prevent form resubmission
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit();
}

// Remove null entries and sort users by first name
$sortedUsers = array_filter($_SESSION['users']); // Remove null values
usort($sortedUsers, function ($a, $b) {
    return strcmp($a['firstname'], $b['firstname']);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css_files/sign_in.css" />
    <title>Sign Up and View Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(-135deg, wheat, gray);
            height: 100vh;
            margin: 0;
            overflow: scroll;
        }

        .container {
            width: 510px;
            margin: 0 auto;
            margin-top: 100px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
            padding-bottom: 30px;
        }

        h2 {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            color: black;
            user-select: none;
            border-radius: 15px 15px 0 0;
            background: linear-gradient(-135deg, wheat, gray);
            padding: 10px 0;
        }

        input[type="text"],
        input[type="email"] {
            width: 80%;
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }

        input[type="submit"] {
            color: black;
            border: none;
            width: 80%;
            border-radius: 20px;
            padding: 15px;
            margin-top: 20px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            background: linear-gradient(-135deg, wheat, gray);
            transition: all 0.3s ease;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="submit"]:hover {
            box-shadow: rgba(49, 49, 49, 0.35) 0 -25px 18px -14px inset,
                rgba(49, 49, 49, 0.35) 0 1px 2px, rgba(49, 49, 49, 0.35) 0 2px 4px,
                rgba(49, 49, 49, 0.35) 0 4px 8px, rgba(81, 81, 81, 0.25) 0 8px 16px,
                rgba(97, 97, 97, 0.25) 0 16px 32px;
            transform: scale(0.95);
            transition: 0.8s ease;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: linear-gradient(-135deg, wheat, gray);
            color: white;
        }

        button {
            position: relative;
            left: 37%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="text" name="username" required placeholder="Username" />
            <input type="text" name="firstname" required placeholder="First Name" />
            <input type="text" name="lastname" required placeholder="Last Name" />
            <input type="email" name="email" required placeholder="Email" />
            <input type="text" name="phone" required placeholder="Phone Number" />
            <input type="submit" value="Sign Up" />
        </form>

        <!-- Button to show users (always visible) -->
        <form method="post">
            <button type="submit" name="show_users">Show All Users</button>
        </form>

        <!-- Display sorted users -->
        <?php if (isset($_POST['show_users'])): ?>
            <h3>Signed-Up Users (Sorted by First Name)</h3>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sortedUsers as $username => $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
