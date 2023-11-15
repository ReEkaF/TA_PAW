<?php
    $title = 'Regis';
    $page = 'regis';
    $selectedRole = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['role'])) {
            $selectedRole = $_POST['role'];
            switch ($selectedRole) {
                case 'admin':
                    header('Location: admin-regis.php');
                    exit;
                    break;
                case 'manager':
                    header('Location: manager-regis.php');
                    exit;
                    break;
                case 'customer':
                    header('Location: customer-regis.php');
                    exit;
                    break;
                default:
                    break;
            }
        }
    }
?>

<?php require_once("layouts/header.php"); ?>

<section>
    <div>
        <fieldset>
            <legend>Pilih role anda</legend>
            <form method="post" action="">
            <select name="role" id="roleSelect">
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="customer">Customer</option>
            </select>
            <div class="fieldsub">
                <input type="submit" value="Submit">
            </div>
        </form>
        </fieldset>
    </div>
</section>

<?php require_once("layouts/footer.php"); ?>
