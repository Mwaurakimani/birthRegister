<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <title>Print</title>
</head>
<body>
<style>
    .print-preview {
        width: 900px;
        margin: auto;
        height: 600px;
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-template-rows: 50px repeat(12, 1fr);
    }

    .print-preview h2 {
        grid-column: 4/8;
        align-self: center;
        text-align: center;
    }

    .print-preview h3 {
        grid-column: 4/8;
        text-align: center;
        grid-row: 2/3;
    }

    .print-preview .sub-one {
        grid-row: 3/4;
        grid-column: 2/11;
        align-self: end;
    }

    .print-preview .sub-one p {
        font-size: 22px;
    }

    .print-preview .sub-one p span {
        padding: 0 20px;
        text-decoration: underline;
    }

    .print-preview .main-entry {
        grid-column: 2/12;
        grid-row: 4/10;
        display: grid;
        grid-template-columns: repeat(auto-fill, 1fr);
        grid-template-rows: repeat(5, 1fr);
    }

    .print-preview .main-entry .section {
        display: flex;
    }

    .print-preview .main-entry .section:nth-of-type(n+1):nth-of-type(-n+6) h4 {
        color: red;
        width: 80px;
        font-size: 0.8em;
        background-color: white;
        padding-left: 10px;
        margin-right: 10px;
    }

    .print-preview .main-entry .section:nth-of-type(7) h4 {
        width: 200px;
        color: red;
        font-size: 0.8em;
        background-color: white;
        padding-left: 10px;
        margin-right: 10px;
    }

    .print-preview .main-entry .section:nth-of-type(n+8) h4 {
        width: 100px;
        color: red;
        font-size: 0.8em;
        background-color: white;
        padding-left: 10px;
        margin-right: 10px;
    }

    .print-preview .declaration {
        font-weight: bolder;
        grid-row: 9/12;
        grid-column: 2/12;
    }

</style>
<div id="main" class="print-preview">
    <h2>Republic of Kenya</h2>
    <h3>Certificate of Kenya</h3>
    <div class="sub-one">
        <p>Birth in the <span>Region</span>
            District in the <span>Region</span> Province</p>
    </div>
    <div class="main-entry">
        <div class="section" style="grid-column: 0/4;grid-row: 1/2">
            <h4>Entry No.</h4>
            <p>923409823098402</p>
        </div>
        <div class="section">
            <h4>Where Born</h4>
            <p>923409823098402</p>
        </div>
        <div class="section">
            <h4>Name</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 0/4;grid-row:2/3">
            <h4>Date of Birth</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 2/3;grid-row:2/3">
            <h4>Sex</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 0/4;grid-row:2/3">
            <h4>Name and Surname of Father No.</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 1/4;grid-row:3/4">
            <h4>Name and Maiden Name of Mother</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 1/2;grid-row:4/5">
            <h4>Name of Registering Officer</h4>
            <p>923409823098402</p>
        </div>
        <div class="section" style="grid-column: 3/4;grid-row:4/5">
            <h4>Date of Registration</h4>
            <p>923409823098402</p>
        </div>
    </div>
    <p class="declaration">Registrar for Kiambu ,hereby certify that this certificate is compiled from an entry/return
        in the Register of births in the region</p>

</div>
<button id="noprint" onclick="printPage()">
Print
</button>
<script>
    function printPage() {
        document.getElementById('noprint').style.visibility='hidden';
        window.print();
        document.getElementById('main').style.visibility='visible';
    }
</script>
</body>

</html>
