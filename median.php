<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mencari Median Data Tunggal</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
   function tmbh() {
     var idf = document.getElementById("idf").value;
     var stre;
     stre="<p id='srow" + idf + "'><input type='text' size='40' name='angka[]'  /> <a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p>";
     $("#divHobi").append(stre);
     idf = (idf-1) + 2;
     document.getElementById("idf").value = idf;
   }
   function hapusElemen(idf) {
     $(idf).remove();
   }
</script>
</head>
<body>
<div id="container">
<h2>Menghitung Median Data Tunggal</h2><br>
<form method="post" action="index.php">
   <input id="idf" value="1" hidden />
   <p> masukan angka</p>
   <button type="button" onclick="tmbh(); return false;">tambah angka</button>
   <div id="divHobi"></div>
   <button type="submit">Simpan</button>
  </form>
<?php
    if(isset($_POST['angka']))
        {
            $data=$_POST['angka'];
            reset($data);
            $n=count($data);
            echo "Banyaknya data (N) = $n <br />";
            echo "Data sebelum diurut : ";
            while (list($key, $value)= each($data))
                {
                    $angk=$_POST['angka'][$key];
                    echo $angk."&nbsp;&nbsp;&nbsp;";
                }   
 
            asort($data);
            echo "<br />Data setelah diurut : ";
            $i=1;
            while (list($key, $value)= each($data))
                {
                    $databaru[$i]=$_POST['angka'][$key];
                    echo $databaru[$i]."&nbsp;&nbsp;&nbsp;";
                    $i++;
                }
            if($n%2==0) //Jika banyak-nya data  genap
                {
                    $d1=$n/2;
                    $d2=$d1+1;
                    $nilai_median=$databaru[$d1]+($databaru[$d2]-$databaru[$d1])/2;
                }
            else   //Jika banyak-nya data  ganjil
                {
                    $dt=($n+1)/2;
                    $nilai_median=$databaru[$dt];
                }
            echo "<br />======================= <br />";
            echo "Mediannya adalah : $nilai_median";
        }
?>
 
</div>
</body>
</html>