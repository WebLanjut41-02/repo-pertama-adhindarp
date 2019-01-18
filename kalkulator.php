<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator</title>
</head>
<body>
	<center>
		<br><br>
		<table border="2">
			<form method="POST">
				<tr>
					<td>Input berat badan</td>
					<td>:</td>
					<td><input type="text" name="berat"></td>
				</tr>
				<tr>
					<td>Input tinggi badan</td>
					<td>:</td>
					<td><input type="text" name="tinggi"></td>
				</tr>
				<tr>
					<td>Input jenis kelamin</td>
					<td>:</td>
					<td>
						<input type="radio" name="jk" value="Pria">Pria
						<input type="radio" name="jk" value="Wanita">Wanita
					</td>		
				</tr>
			 	<tr>
					<td colspan="3"><center><input type="submit" name="submit"></center></td>
				</tr>
		</form>
		</table>
	</center>
</body>
</html>

<?php 
	
	if (isset($_POST['submit'])) {
		$kelamin = $_POST['jk'];
		$berat = $_POST['berat'];
		$tinggi = $_POST['tinggi'];
		$BMI = new BMI();
		$BMI -> setBMI($tinggi,$berat, $kelamin);
		$BMI -> hasil();	
		if ($kelamin=='Pria') {
			$BMI -> Pria();
		}else{
			$BMI -> Wanita();
		}
	}

	class kalkulator{
		protected $tinggi, $berat, $BMI, $gender;
		public function hasil(){
			echo "Tinggi = ".$this->tinggi." M<br>";
			echo "Berat = ".$this->berat." Kg<br>";
			echo "Jenis Kelamin = ".$this->gender."<br>";
			echo "Hasil perhitungan BMI ".$this->BMI."<br>";
		}
	}

	class BMI extends kalkulator{
			public function setBMI($tinggi, $berat, $gender){
			$this->berat = $berat;
			$this->tinggi = $tinggi/100;
			$this->gender = $gender;	
			$this->BMI = $this->berat / ($this->tinggi*$this->tinggi);
		}
		public function Pria(){
			$BMI = $this->BMI;
			if ($BMI < 17) {
				echo "UnderWeight/Kurus";
			}elseif ($BMI <23) {
				echo "Normal";
			}elseif ($BMI < 27) {
				echo "Overweight";
			}else{
				echo "Obesitas";
			}
		}
		public function Wanita(){
			$BMI = $this->BMI;
			if ($BMI < 18) {
				echo "UnderWeight/Kurus";
			}elseif ($BMI <25) {
				echo "Normal";
			}elseif ($BMI < 27) {
				echo "Overweight";
			}else{
				echo "Obesitas";
			}
		}
	}
?>