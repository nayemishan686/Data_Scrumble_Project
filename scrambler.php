<?php 
    include_once "function.php";
    $task = 'encode';
    if(isset($_GET['task']) && $_GET['task'] != ''){
        $task = $_GET['task'];
    }

    //code for key generate
    $key = "abcdefghijklmnopqrstuvwxyz1234567890";
    if('key' == $task){
        $key_original = str_split($key);
        shuffle($key_original);
        $key = join('', $key_original);
    }else if(isset($_POST['key']) && $_POST['key']!= ''){
        $key = $_POST['key'];
    }

    //code for encoding data
    $scramblerdata = '';
    if('encode' == $task){
        $data = $_POST['data'] ?? '';
        if($data != ''){
            $scramblerdata = encodeData($data, $key);
        }
    }

    //code for decoding data
    if('decode' == $task){
        $data = $_POST['data'] ?? '';
        if($data != ''){
            $scramblerdata = decodeData($data, $key);
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrambling Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            font-family: "Helvetica Neue",Helvetica;
            font-weight: normal;
        }
        h1,h2,h3,h4,h5,h6 {
            font-weight: bold;
        }
        a{
            text-decoration: none;
            padding: 10px 15px;
            background-color: #9b4dca; 
            color: #fff;
            border-radius: 10px;
        }
        a:active,a:hover{
            background-color: #4dadca;
            color: #fff;
        }
        .container{
            width: 60%;
        }
        @media screen and (max-width: 768px){
            .container{
                width: 80%;
            }
        }
    </style>
</head>
<body>
   <header class= "text-center">
       <div class="container">
           <div class="row">
             <h2>Scrambling Form</h2>
             <p>Form this form you can encode and decode your password by key. So lets start</p>
             <p>
                 <a href="scrambler.php?task=encode" class=""> Encode</a>
                 <a href="scrambler.php?task=decode" class="">Decode</a>
                 <a href="scrambler.php?task=key" class="">Generate key</a>
             </p>
           </div>
       </div>
   </header>

   <div class="main-content mt-5">
       <div class="container">
           <div class="row">
            <form action="scrambler.php<?php if('decode' == $task) {echo "?task=decode";} ?>" method="POST">
                <label for="key">Key:</label>
                <input type="text" name="key" id="key" class="form-control mt-2 mb-3" placeholder="Enter key to custom encrypt" <?php displayKey($key); ?>>
                <label for="data">Data:</label>
                <textarea name="data" id="data" cols="30" rows="5" class="form-control mb-2" placeholder="Enter your data to encrypt"><?php if(isset($_POST['data'])) { echo $_POST['data']; } ?></textarea>
                <label for="result">Result</label>
                <textarea name="result" id="" cols="30" rows="5" class="form-control mb-3" placeholder="Here you will show your result"><?php echo $scramblerdata;?></textarea>
                <button class="btn btn-primary">Do it for me</button>
            </form>
        </div>
    </div>
   </div>










    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>