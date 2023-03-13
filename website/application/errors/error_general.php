<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <title>Error</title>
    <style type="text/css">
        body {
            background-color:	#fff;
            margin:				40px;
            font-family:		Lucida Grande, Verdana, Sans-serif;
            font-size:			12px;
            color:				#000;
        }
        #content  {
            border:				#999 1px solid;
            background-color:	#fff;
            padding:			20px 20px 12px 20px;
        }
        a {
            text-decoration:none;
        }
        .menu:link {
            color: #06F;
            text-decoration: none;
        }
        .menu:visited {
            text-decoration: none;
            color: #06F;
        }
        .menu:hover {
            text-decoration: none;
            color: #F00;
        }
        .menu:active {
            text-decoration: none;
            color: #06F;
        }
        #message {
            font-size:12px;
            padding:  5px;;
        }
    </style>
</head>
<body>
<fieldset id="content">
    <legend id="menu"><a class="menu" href="">Warrning</a></legend>
    <table>
        <tr>
            <td></td>
            <td id="message"><?php echo $message; ?></td>
        </tr>
    </table>
</fieldset>
</body>
</html>