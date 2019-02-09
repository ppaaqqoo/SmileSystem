<?php
class Atm
{
	public $idAtm;
	public $idPaciente;
	public $linMedia;
	public $habitos;
	public $bruxismo;
	public $chaArriba;
	public $chaAbajo;
	public $infChasquido;
	public $crepitacion;
	public $dolDerecha;
	public $dolIzquierda;
	public $infDolor;
	public $maxAbertura;
	public $derecho;
	public $izquierdo;
	public $potrusion;
	public $regresion;
	public $peso;
	public $talla;
	public $temp;
	public $pa;
	public $pulso;
	public $fr;


	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function ObtenerATMPaciente($id)
	{
		$stm = $this->pdo->prepare("SELECT * FROM atm where idPaciente = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function RegistrarATM(Atm $data)
	{
		$sql = "INSERT INTO atm
		VALUES (?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPaciente,
				$data->linMedia, 
				$data->habitos,
				$data->bruxismo,
				$data->chaArriba, 
				$data->chaAbajo,
				$data->infChasquido,
				$data->crepitacion,
				$data->dolDerecha,
				$data->dolIzquierda,
				$data->infDolor, 
				$data->maxAbertura, 
				$data->derecho, 
				$data->izquierdo,
				$data->potrusion,
				$data->regresion,
				$data->peso,
				$data->talla,
				$data->temp,
				$data->pa,
				$data->pulso,
				$data->fr
				)
			);
	}

	public function ActualizarATM(Atm $data)
	{
		$sql = "UPDATE atm SET 
		linMedia = ?,
		habitos = ?,
		bruxismo = ?,
		chaArriba = ?,
		chaAbajo = ?,
		infChasquido = ?, 
		crepitacion = ?, 
		dolDerecha = ?, 
		dolIzquierda = ?, 
		infDolor = ?, 
		maxAbertura = ?, 
		derecho = ?, 
		izquierdo = ?, 
		potrusion = ?, 
		regresion = ?, 
		peso = ?, 
		talla = ?, 
		temp = ?, 
		pa = ?, 
		pulso = ?, 
		fr = ?  
		WHERE idPaciente = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->linMedia, 
				$data->habitos,
				$data->bruxismo,
				$data->chaArriba, 
				$data->chaAbajo,
				$data->infChasquido,
				$data->crepitacion,
				$data->dolDerecha,
				$data->dolIzquierda,
				$data->infDolor, 
				$data->maxAbertura, 
				$data->derecho, 
				$data->izquierdo,
				$data->potrusion,
				$data->regresion,
				$data->peso,
				$data->talla,
				$data->temp,
				$data->pa,
				$data->pulso,
				$data->fr,
				$data->idPaciente
				)
			);
	}
}
?>