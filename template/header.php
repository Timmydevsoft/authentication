<?php
  $userName =  $_SESSION['name'] ?? 'Unverified';
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project One</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            flex-direction: column;
            width: 100vw;
            background: #3a4764;
            height: 100vh;
        }
        .content{
            flex: 1;
        }

        .user_prof{
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .image{
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .header{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 5%;
        }

        .user_name{
            color: #bc15f4;
            font-size: 2rem;
        }

        .btn{
            padding: 1rem 20px;
            border-radius: 8px;
            background: #bc15f4;
            color: #FFFFFF;
            text-decoration: none;
        }

        .sign-up-form,
        .sign-in-form{
            background: #ffffff ;
            margin: 3rem auto;
            padding: 20px;
            width: fit-content;
            border-radius: 1rem
        }

        .input_field{
            width: 500px;
            height: 40px;
            padding: 0 20px;
            border-radius: 10px;
            border: solid 1px #a69d91;
            margin: 20px auto;
        }

        .input_field:focus{
            outline: none;
        }

        /* .input_field:active{
            border-bottom: solid 1.5px green;
        } */

        .label_error{
            display:flex;
            justify-content: space-between;
            align-items: center;
        }

        .error_message{
            color: #fa2702;
            font-size: 12px;
        }

        label{
            color: #000000;
        }

        .submit{
            background: #bc15f4bb;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            color: #FFFFFF;
        }

        .submit:hover{
            background: #bc15f4;
            cursor: pointer;
        }

        #noentry{
            margin: 1rem auto;
        }

        .down-sighn-in{
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items:center;
        }

        .no-acct{
            color: #182034;
        }

        #noacct{
            display: block;
            background: #182034;
            margin-top: 0.5rem;
            text-decoration: none;
            padding: 10px 2.5rem;
        }

        .footer{
            background: #182034;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 2rem 0;
        }

        .footer-text{
            color: #FFFFFF;
            width: 100%;
            padding: 3rem;
            height: 7rem;
            background: #182034; 
        }

        .dashboard{
            width: 100%;
            height: 80%;
            position: relative;
        }

        .dashboard_u{
            color: #FFFFFF;
            font-size: 1.5rem;
            text-align: center;
        }

        #edit_id{
            position: absolute;
            right: 5%;
            top: -5rem;
        }

    </style>
</head>
<body >
    <div class="content">
        <div class="header">
            <div class="user_prof">
                <img class="image" src="./image/avatar.jpg" alt="avatar image">
                <span  class="user_name"><?php echo $userName ?></span>
            </div>
            <nav>
                <!-- <a href="#" class="btn">Authentication</a> -->
            </nav>
        </div>
    
    
    



