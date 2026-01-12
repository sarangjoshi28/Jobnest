<?php 
    session_start();
    include 'config.php';

    if(!isset($_SESSION['prn']))
    {
        header("Location:login.html");
        exit();
    }

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $PRN=$_SESSION['prn'];
        if(strpos($_POST['email'],'@')!=false && strpos($_POST['email'],'.')!=false)
        {
            $email=$_POST['email'];
        }else
        {
            echo "invalid email"; 
            exit();
        }


        if(strlen($_POST['mobno'])==10)
        {
            $mobno=$_POST['mobno'];
        }else
        {
            echo "invalid mobile no"; 
            exit();
        }

        $address=$_POST['address'];
        if($_POST['tenth']>100 || $_POST['tenth']<0)
        {
            echo "invalid marks";
            exit();
        }else
        $tenth=$_POST['tenth'];
        if(isset($_POST['twelth'])&& $_POST['twelth']!="")
        {
        if($_POST['twelth']>100 || $_POST['twelth']<0)
        {
            echo "invalid marks";
            exit();
        }else
        $twelth=$_POST['twelth'];
    }else
    {
        $twelth=0;
    }

    if(isset($_POST['diploma']) && $_POST['diploma']!="")
    {
        if($_POST['diploma']>100 || $_POST['diploma']<0)
        {
            echo "invalid marks";
            exit();
        }else
        $diploma=$_POST['diploma'];

    }else
    {
        $diploma=0;
    }

        $collegeName=$_POST['collegeName'];

        $passoutYear=$_POST['passoutYear'];

        $branch=$_POST['branch'];

        if($_POST['cgpa']>10 || $_POST['cgpa']<0)
        {
            echo "invalid cgpa";
            exit();
        }else
        $cgpa=$_POST['cgpa'];

    }
    $check="select * from studentInfo where PRN=?";
    $stm=$con->prepare($check);
    $stm->bind_param("s",$PRN);
    $stm->execute();
    $res=$stm->get_result();
    if($res->num_rows==1)
    {
        $sql1 = "UPDATE studentInfo 
         SET email=?, mobNo=?, address=?, tenth=?, twelth=?, diploma=?, collegeName=?, passoutYear=?, branch=?, cgpa=? 
         WHERE PRN=?";

        $st=$con->prepare($sql1);
        $st->bind_param("sssdddsssds",$email,$mobno,$address,$tenth,$twelth,$diploma,$collegeName,$passoutYear,$branch,$cgpa,$PRN);
        if($st->execute())
    {
        echo "<script>
        alert('information  updated sucessfuly.');
        window.location.href = 'profile.php';
        </script>";
    }else
    echo "<script>
    alert('not updated sucessfuly.');
    window.location.href = 'profile.php';
    </script>";

    }
    else
    {
    $sql="insert into studentInfo (email, PRN, mobNo, address, tenth, twelth, diploma, collegeName, passoutYear, branch, cgpa) values (?,?,?,?,?,?,?,?,?,?,?)";
    $statement=$con->prepare($sql);
    $statement->bind_param("ssssdddsssd",$email,$PRN,$mobno,$address,$tenth,$twelth,$diploma,$collegeName,$passoutYear,$branch,$cgpa);
    if($statement->execute())
    {
        echo "<script>
        alert('submited sucessfuly.');
        window.location.href = 'profile.php';
        </script>";
    }else
    echo "<script>
    alert('Application failed. Please try again later.');
    window.location.href = 'profile.php';
    </script>";

}

?>