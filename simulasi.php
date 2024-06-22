<?php
$beban = $_POST['beban'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        body {
            background-image: url("image/langit_rumah.png");
            background-size: cover;
            background-repeat: no-repeat;
        }

        #sun {
            width: 200px;
            height: 200px;
            background-color: yellow;
            border-radius: 50%;
            position: absolute;
            top: 20%;
            left: 60%;
            transform: translate(-50%, -50%);
            transition: background-color 0.5s;
        }

        .result{
            font-size: 20px;
            color: black;
            

        }
    </style>
</head>
<body>
    <h1>Simulasi PLTS</h1>
    
    <div id="sun"></div>
    <input type="range" min="0" max="100" id="tingkat_cahaya_matahari"><br>
    <p id="demo"></p>
    
    <script>
        var tingkat_cahaya_matahari = document.getElementById('tingkat_cahaya_matahari');
        var sun = document.getElementById('sun');
    
        tingkat_cahaya_matahari.addEventListener('input', function() {
            var brightnessValue = tingkat_cahaya_matahari.value;
            var brightnessPercentage = brightnessValue + "%";
            sun.style.backgroundColor = 'rgba(255, 255, 0, ' + brightnessValue / 100 + ')';
    
            document.getElementById("demo").innerHTML = " Kecerahan matahari adalah : " + brightnessValue + "%";
            
        });   
    </script>
    <br><br>
    <div class="form"></div>
    <label for="">Masukkan jumlah panel:</label><br>
    <input type="number" min="1" id="jumlah_panel"><br><br>
    
    <label for="">Masukkan daya yang dihasilkan oleh setiap panel (Watt):</label><br>
    <input type="number" min="1" id="daya_panel"><br><br>
    
    <label for="">Masukkan lama panel terkena sinar matahari (jam):</label><br>
    <input type="number" min="1" id="lama_matahari"><br><br>
    
    <label for="">Masukkan kapasitas baterai (Wh):</label><br>
    <input type="number" min="1" id="kapasitas_batrai"><br><br>

    <input type="hidden" id="beban" value="<?php echo $beban; ?>">
    </div>
    <div id="result" class="result"></div>
    
    <script>
        document.getElementById("jumlah_panel").addEventListener("input", calculate);
        document.getElementById("daya_panel").addEventListener("input", calculate);
        document.getElementById("lama_matahari").addEventListener("input", calculate);
        document.getElementById("kapasitas_batrai").addEventListener("input", calculate);
        document.getElementById("tingkat_cahaya_matahari").addEventListener("input", calculate);
        document.getElementById("beban").addEventListener("input", calculate);

        function calculate() {
            var jumlah_panel = parseFloat(document.getElementById("jumlah_panel").value);
            var daya_panel = parseFloat(document.getElementById("daya_panel").value);
            var lama_matahari = parseFloat(document.getElementById("lama_matahari").value);
            var kapasitas_batrai = parseFloat(document.getElementById("kapasitas_batrai").value);
            var beban = parseFloat(document.getElementById("beban").value);
            var tingkat_cahaya_matahari = (parseFloat(document.getElementById("tingkat_cahaya_matahari").value))/100;
           
            var kondisi = "Baterai mampu menampung beban";

            if (kapasitas_batrai<=beban ){
                kondisi = "Baterai tidak mampu menampung beban";
            }
            
            var luas = 1.05;
            var panelArea = jumlah_panel * luas ; 
            var daya_hasil = jumlah_panel * daya_panel;
            var total_energi_hasil = ((daya_hasil * lama_matahari) * tingkat_cahaya_matahari)*0.15;
            var lama_pengisian_batrai = (kapasitas_batrai/total_energi_hasil).toFixed(2); 
            var persentase_batrai = (total_energi_hasil/kapasitas_batrai)*100;
            
                
            var resultText = "Luas keseluruhan panel: " + panelArea.toFixed(2) + " m^2<br>";
            resultText += "Daya yang dihasilkan panel: " + daya_hasil + " Watt<br>";
            resultText += "Energi yang dihasilkan panel: " + total_energi_hasil + " Watt<br>";
            resultText += "Lama pengisian baterai: " + lama_pengisian_batrai + " kali proses<br>";
            resultText += "beban yang harus di tanggung " + beban + "Wh<br>";
            resultText += "<br><br>"+persentase_batrai.toFixed(2)+"%";
            resultText += "<br><br>"+kondisi;
           

    
            document.getElementById("result").innerHTML = resultText;
        }
    </script>
</body>
</html>
