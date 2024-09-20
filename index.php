<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Technology | DataTables</title>
    <link rel="shortcut icon" type="image/x-icon" href="icon/worldwide.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            background-color: #fcfcfc;
            padding: 5px;
            font-size: 16px;
            line-height: 1.5;
            background-image: url('icon/bg.jpg'); /* เปลี่ยน path ให้เป็น path ของรูปภาพที่ต้องการ */
            background-size: cover; /* ทำให้ภาพครอบคลุมทั้งหน้าจอ */
            background-position: center; /* จัดภาพให้อยู่ตรงกลาง */
            background-repeat: no-repeat; /* ไม่ให้รูปซ้ำ */
            background-attachment: fixed; /* ทำให้พื้นหลังคงที่เมื่อเลื่อน */
        }
        h1 {
            font-family: 'Helvetica', sans-serif;
            text-align: center;
            margin-bottom: 30px;
            color: #000000;
            font-size: 2em;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9); /* เพิ่มพื้นหลังโปร่งแสงเพื่อให้มองเห็นเนื้อหาได้ชัดเจน */
            border-radius: 8px;
            padding: 20px;
        }
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0.4, 0.4, 0.4, 0.4);
            font-size: 14px;
        }
        table thead th {
            background-color: #757575;
            color: #ffffff;
            padding: 10px;
            text-align: left;
            font-size: 16px;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        table tbody td {
            padding: 10px;
            font-size: 14px;
        }
        .btn-details { 
            display: inline-block;
            padding: 6px 12px;
            margin: 0 2px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            color: #fffffffff;
            background-color: #eceff1;
            transition: background-color 0.3s;
            font-family: 'Prompt', sans-serif;
        }
        .btn-details:hover {
            background-color: #212121;
			color: #ffffff;
        }
        .dataTables_wrapper {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0.4, 0.4, 0.4, 0.4);
        }
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin-bottom: 20px;
        }
        .dataTables_wrapper .dataTables_filter {
            float: left;
        }
        .dataTables_wrapper .dataTables_length {
            float: right;
        }
        .dataTables_wrapper .dataTables_paginate {
            clear: both;
            text-align: center;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 8px 12px;
            margin: 0 2px;
            border-radius: 4px;
            border: 1px solid #007bff;
            background-color: #fff;
            color: #007bff;
            font-size: 14px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #007bff;
            color: #fff;
        }
        .dataTables_filter label,
        .dataTables_length label,
        .dataTables_info {
            font-size: 14px;
        }
        #dialog {
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            font-family: 'Prompt', sans-serif;
            margin-top: 8px;
        }
        #dialog p {
            margin: 0 0 10px;
        }
        #dialog strong {
            color: #000000;
        }
        .ui-dialog-titlebar {
            background-color: #000000;
            color: #ffffff;
            font-family: 'Prompt', sans-serif;
        }
        .ui-dialog-titlebar-close {
            color: #000000;
        }
        .ui-dialog .ui-dialog-buttonpane button {
            background-color: #007bff;
            color: #000000;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-family: 'Prompt', sans-serif;
        }
        .ui-dialog .ui-dialog-buttonpane button:hover {
            background-color: #0056b3;
        }
        .testing-message {
            font-size: 16px;
            font-weight: bold;
            color: #2baf2b;
            margin-top: 10px;
            display: flex;
            align-items: center;
        }
        .testing-message::before {
            content: '';
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ff9800;
            margin-right: 8px;
            animation: pulse 1s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.5);
                opacity: 0.5;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        .ping-ip {
            color: #2baf2b !important;
            text-decoration: none;
        }
        .ping-ip:hover {
            color: #007bff !important;
        }
        .anydesk-link {
            color: #e51c23 !important;
            text-decoration: none;
        }
        .anydesk-link:hover {
            color: #007bff !important;
        }
        .icon-image {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            margin-left: 5px;
        }
        .icon-image1 {
            width: 50px;
            height: 50px;
            vertical-align: middle;
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Information Technology | DataTables <img src="icon/worldwide.png" class="icon-image1" alt="Icon"></h1>
        <table id="customers" class="display">
            <thead>
                <tr>
                    <th>อาคาร</th>
                    <th>ชั้นที่</th>
                    <th>แผนก</th>
                    <th>เบอร์โทร</th>
                    <th>IP/Anydesk</th>
                </tr>
            </thead>
            <tbody>
            <?php
			include 'connect.php';
				$sql = "SELECT * FROM depart";
				$query = mysqli_query($connect, $sql);

			while ($rs = mysqli_fetch_assoc($query)) {
				$a = $rs['depart_id'];
				$b = $rs['depart_edifice'];
				$c = $rs['depart_sec'];
				$d = $rs['depart_dep'];
				$e = $rs['depart_phone'];
				$f = $rs['depart_detail'];
				$g = $rs['depart_numdep'];

			$sql_ip = "SELECT * FROM ipanydesk WHERE ipa_numdep = '$g'";
				$query_ip = mysqli_query($connect, $sql_ip);
				$ip_data = mysqli_fetch_assoc($query_ip);

				$h = $ip_data['ipa_i1'];
				$i = $ip_data['ipa_a1'];
				$j = $ip_data['ipa_i2'];
				$k = $ip_data['ipa_a2'];
				$l = $ip_data['ipa_i3'];
				$m = $ip_data['ipa_a3'];
				$n = $ip_data['ipa_i4'];
				$o = $ip_data['ipa_a4'];
				$p = $ip_data['ipa_i5'];
				$q = $ip_data['ipa_a5'];
			?>
    <tr>
        <td><?php echo $b; ?></td>
        <td><?php echo $c; ?></td>
        <td><?php echo $d; ?></td>
        <td><?php echo $e; ?></td>
        <td>
            <button class="btn-details" 
                    data-edifice="<?php echo $b; ?>"
                    data-sec="<?php echo $c; ?>"
                    data-dep="<?php echo $d; ?>"
                    data-phone="<?php echo $e; ?>"
                    data-detail="<?php echo $f; ?>"
					data-numdep="<?php echo $g; ?>"
                    data-ip1="<?php echo $h; ?>"
                    data-anydesk1="<?php echo $i; ?>"
                    data-ip2="<?php echo $j; ?>"
                    data-anydesk2="<?php echo $k; ?>"
                    data-ip3="<?php echo $l; ?>"
                    data-anydesk3="<?php echo $m; ?>"
                    data-ip4="<?php echo $n; ?>"
                    data-anydesk4="<?php echo $o; ?>"
                    data-ip5="<?php echo $p; ?>"
                    data-anydesk5="<?php echo $q; ?>">
                Detail
            </button>
        </td>
    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>

    <div id="dialog" title="IP/Anydesk" style="display:none;">
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
    var table = $("#customers").DataTable({
        autoWidth: true,
        language: {
            "decimal": "",
            "emptyTable": "ไม่มีข้อมูลในตาราง",
            "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการทั้งหมด",
            "infoEmpty": "แสดง 0 - 0 จาก 0 รายการทั้งหมด",
            "infoFiltered": "(คัดกรองจาก _MAX_ ยอดรวม รายการทั้งหมด)",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ รายการ",
            "loadingRecords": "กำลังโหลด...",
            "processing": "กำลังประมวลผล...",
            "search": "ค้นหา : ",
            "zeroRecords": "ไม่พบข้อมูลที่ถูกบันทึก",
            "paginate": {
                "first": "หน้าแรก",
                "last": "หน้าสุดท้าย",
                "next": "ถัดไป",
                "previous": "ย้อนกลับ"
            },
            "aria": {
                "sortAscending": ": เรียงลำดับจากน้อยไปมาก",
                "sortDescending": ": เรียงลำดับจากมากไปน้อย"
            }
        }
    });

    $('#customers').on('click', '.btn-details', function() {
        var button = $(this);
        var content = '<center><p><h3><strong>อาคาร : ' + button.data('edifice') + ' ชั้นที่ : </strong>' + button.data('sec') + '</h3></p></center>';
        content += '<center><p><h2><strong>หมายเลขแผนก : ' + button.data('numdep') + '</h3></p></center>';
        content += '<center><p><h3><strong>แผนก : </strong>' + button.data('dep') + '</h3></p></center>';
        content += '<center><p><h3><strong>( เบอร์โทร :</strong> ' + button.data('phone') + ' )</h3></p></center>';
        content += '<p><h3><strong>รายละเอียด : ' + button.data('detail') + '</h3></p>';
        content += '<p><strong>เครื่องที่ 1 IP/VNC</strong> : <a href="ping.php" class="ping-ip" data-ip="' + button.data('ip1') + '">' + button.data('ip1') + '</a><img src="icon/vnc.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 1 Anydesk</strong> : <a href="anydesk:' + button.data('anydesk1') + '" class="anydesk-link">' + button.data('anydesk1') + '</a><img src="icon/anydesk.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 2 IP/VNC</strong> : <a href="ping.php" class="ping-ip" data-ip="' + button.data('ip2') + '">' + button.data('ip2') + '</a><img src="icon/vnc.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 2 Anydesk</strong> : <a href="anydesk:' + button.data('anydesk2') + '" class="anydesk-link">' + button.data('anydesk2') + '</a><img src="icon/anydesk.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 3 IP/VNC</strong> : <a href="ping.php" class="ping-ip" data-ip="' + button.data('ip3') + '">' + button.data('ip3') + '</a><img src="icon/vnc.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 3 Anydesk</strong> : <a href="anydesk:' + button.data('anydesk3') + '" class="anydesk-link">' + button.data('anydesk3') + '</a><img src="icon/anydesk.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 4 IP/VNC</strong> : <a href="ping.php" class="ping-ip" data-ip="' + button.data('ip4') + '">' + button.data('ip4') + '</a><img src="icon/vnc.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 4 Anydesk</strong> : <a href="anydesk:' + button.data('anydesk4') + '" class="anydesk-link">' + button.data('anydesk4') + '</a><img src="icon/anydesk.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 5 IP/VNC</strong> : <a href="ping.php" class="ping-ip" data-ip="' + button.data('ip5') + '">' + button.data('ip5') + '</a><img src="icon/vnc.png" class="icon-image" alt="Icon"></p>';
        content += '<p><strong>เครื่องที่ 5 Anydesk</strong> : <a href="anydesk:' + button.data('anydesk5') + '" class="anydesk-link">' + button.data('anydesk5') + '</a><img src="icon/anydesk.png" class="icon-image" alt="Icon"></p>';
        $('#dialog').html(content);
        $('#dialog').dialog({
            modal: true,
            width: 380,
            buttons: {
                OK: function() {
                    $(this).dialog('close');
                }
            }
        });
    });

    $(document).on('click', '.ping-ip', function(e) {
        e.preventDefault();
        var ip = $(this).data('ip');
        $('#dialog').append('<p class="testing-message">กำลังทดสอบ . . .</p>');
        
        $.ajax({
            url: 'ping.php',
            type: 'POST',
            data: { ip: ip },
            success: function(response) {
                $('.testing-message').remove();
                $('#dialog').append('<p>ผลการทดสอบการเชื่อมต่อ IP: ' + ip + ' - ' + response + '</p>');
            },
            error: function() {
                $('.testing-message').remove();
                $('#dialog').append('<p>เกิดข้อผิดพลาดในการทดสอบการเชื่อมต่อ IP: ' + ip + '</p>');
            }
        });
    });
});
    </script>

</body>
</html>
