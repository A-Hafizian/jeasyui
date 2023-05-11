<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
    <script type="text/javascript" src="easyui/jquery.min.js"></script>
    <script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2@11.js"></script>

</head>

<body>
    <form id="ff" action="/InsertUser.php" method="post">
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input id="name" class="easyui-validatebox" type="text" name="name" /></td>
            </tr>
            <td><label for="email">Family:</label></td>
            <td><input id="family" class="easyui-validatebox" type="text" name="family" data-options="validType:'text'" /></td>
            <tr>
                <td><label for="PhoneNumber">PhoneNumber:</label></td>
                <td><input aria-checked="" id="phoneNumber" class="easyui-validatebox" type="phoneNumber" name="PhoneNumber" data-options="validType:'number'" /></td>
            </tr>
            <tr>
                <td><button type="submit">submit</button></td>
                <td></td>
            </tr>
        </table>
    </form>

    <hr>


    <button id="refresh">refresh</button>
    <table class="easyui-datagrid" style="width:400px;height:250px" data-options="url:'datagrid_data.json',fitColumns:true,singleSelect:true">
        <thead>
            <tr>
                <th data-options="field:'Name'">Name</th>
                <th data-options="field:'Family'">Family</th>
                <th data-options="field:'PhoneNumber'">PhoneNumber</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <script type="text/javascript" src="assets/js/myscript.js"></script>

</body>

</html>