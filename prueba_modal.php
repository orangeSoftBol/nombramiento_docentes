 <html lang="en">

<head>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/ajax.js"></script>

<script>
function openmodal(id){
var id=id;
var other="<a onclick='openmodal(1)' style='cursor:pointer'>product 1</a><a onclick='openmodal(2)' style='cursor:pointer'>product 2</a><a onclick='openmodal(3)' style='cursor:pointer' >product 3</a>";
$('#item_modal').modal('show');
$("#target_title").text(id);
$("#target_other").append(other);
}

</script>

</head>
<body>
<a onclick="openmodal(1)" style="cursor:pointer">product 1</a>
<a onclick="openmodal(2)" style="cursor:pointer">product 2</a>
<a onclick="openmodal(3)" style="cursor:pointer">product 3</a>

<div id="item_modal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-body">
<h1 id="target_title"></h1>
<div id="target_other">

</div>
</div>

</div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
</body>
</html>