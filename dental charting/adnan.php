

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pdf print test</title>
<style>
html { height:100%; }
</style>
<script>
function printIt(id){
var pdf = document.getElementById("samplePDF");
pdf.click();
pdf.setActive();
pdf.focus();
pdf.print();
}
</script>
</head>

<body style="margin:0; height:100%;">

<embed id="samplePDF" type="application/pdf" src="/pdf/38.pdf" width="100%" height="100%" onLoad="printIt('samplePDF');" />
<button onClick="printIt('')">Print</button>

</body>
</html>

 else {

<HTML>
<script Language="javascript">

function printfile() {
    window.frames['objAdobePrint'].focus();
    window.frames['objAdobePrint'].print();
}

</script>
<BODY marginheight="0" marginwidth="0">

<iframe src="/pdfs/2010/dash_fdm350.pdf" id="objAdobePrint" name="objAdobePrint" height="95%" width="100%" frameborder=0></iframe>

<input type="button" value="Print" onclick="javascript: printfile();">

</BODY>
</HTML>
<?php
}
?>