<?php
$mt=0;
if(isset($_POST["action"])){
    $action=$_POST["action"];
if($action=="OK"){
    $mt=$_POST['montant'];
    $clientSOAP=new SoapClient("http://localhost:9191/banqueWS?wsdl");
    $param=new stdClass();
    $param->montant=$mt;
    $res=$clientSOAP->__soapCall("convert",array($param));
}elseif ($action=="Comptes"){
    $clientSOAP=new SoapClient("http://localhost:9191/banqueWS?wsdl");
    $comptes=$clientSOAP->__soapCall("listComptes",array());
}
}
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <style>
        #comptes {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #comptes td, #comptes th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #comptes tr:nth-child(even){background-color: #f2f2f2;}

        #comptes tr:hover {background-color: #ddd;}

        #comptes th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        div {
            width: 50%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h1{
            width: 60%;
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            margin-left: 100px;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        }
        </style>
</head>
<body>
<div>
<form action="banque.php" method="post">
<label ><strong>Montant </strong></label>
<input type="text" name="montant" value="<?php echo ($mt) ?>">
<input name="action" type="submit" value="OK">
    <input name="action" type="submit" value="Comptes"></form>

<?php if(isset($res)) {?>
<h1><?php echo ($mt) ?>  Euro = <?php echo ($res->return) ?>  DH</h1>
<?php } ?>
    <?php if(isset($comptes)) {?>
        <table id="comptes" border="1">
<tr>
    <th> Code </th>
    <th> Montant </th>
</tr>
            <?php foreach ($comptes->return as $cmt) {?>
            <tr>
                <td><?php echo ($cmt->code)?></td>
                <td><?php echo ($cmt->solde)?></td>
            </tr>
            <?php } ?>
        </table>
    <?php } ?>
</div>
</body>
</html>
