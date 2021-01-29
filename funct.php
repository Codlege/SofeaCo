<? php

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = '$user_id' limit 1";

        $result = mysqli_query($con, $sql);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
}

