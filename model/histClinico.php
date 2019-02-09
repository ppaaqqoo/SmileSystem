<?php
class HistorialClinico
{
    //HIST CLINICO
	public $idClinico;
	public $idPaciente;
	public $esmalte;
	public $dentina;
	public $raiz;
	public $huesos;
	public $encia;
	public $inEpil; 
	public $lengua;
	public $pulpo;

	public $velPal;
	public $carrillo;
	public $soMordidaH;
	public $soMordidaV;
	public $morAbierta;
	public $desBruxismo;
	public $anoclusion;
	public $simetrica;
	public $asimetrica;	
	public $braquicefalo;

	public $mesocefalo;
	public $dolicefalo;
	public $recto;
	public $concavo;
	public $convexo;
	public $sarampion;
	public $viruela;
	public $parotidis;	
	public $diabetes;
	public $hipertension;

	public $tiroides;
	public $hipotiroidismo;
	public $proCoagulacion;
	public $alergias;
	public $descAlergias;
	public $emergencia;
	public $revision;
	public $limpieza;
	public $canes;
	public $puente;
	public $extraccion;

	public $prostodoncia;
	public $buena;
	public $mala;
	public $tomAlcohol;
	public $fuma;
	public $apRespiratorio;
	public $apCardiovascular;
	public $apDigestivo;
	public $sisNervioso;
	public $apUrinario;

	public $cicMestrual;
	public $infCicMes;
	public $embarazo;
	public $meses;
	public $prg1;
	public $prg2;
	public $prg3;
	public $infPrg3;
	public $prg4;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function ObtenerHisCliPaciente($id)
	{
		$stm = $this->pdo->prepare("SELECT * FROM histclinico where idPaciente = ?");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function EliminarHisCli($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM histClinico WHERE idPaciente = ?");			          

		$stm->execute(array($id));
	}
	
	public function ActualizarHisCli(HistorialClinico $data)
	{
		$sql = "UPDATE histClinico SET 
		idClinico = ?,
		idPaciente = ?,
		esmalte = ?, 
		dentina = ?,
		raiz = ?,

		huesos = ?, 
		encia = ?,
		inEpil = ?,
		lengua = ?,
		pulpo = ?,
		
		velPal = ?,
		carrillo = ?, 
		soMordidaH = ?, 
		soMordidaV = ?, 
		morAbierta = ?,
		
		desBruxismo = ?,
		anoclusion = ?,
		simetrica = ?,
		asimetrica = ?,
		braquicefalo = ?,
		
		mesocefalo = ?,
		dolicefalo = ?,
		recto = ?,
		concavo = ?,
		convexo = ?, 
		
		sarampion = ?,
		viruela = ?,
		parotidis = ?, 
		diabetes = ?,
		hipertension = ?,
		
		tiroides = ?,
		hipotiroidismo = ?,
		proCoagulacion = ?,
		alergias = ?, 
		descAlergias = ?, 
		
		emergencia = ?, 
		revision = ?,
		limpieza = ?,
		canes = ?,
		puente = ?,

		extraccion = ?,
		prostodoncia = ?,
		buena = ?,
		mala = ?, 
		tomAlcohol = ?,
		
		fuma = ?,
		apRespiratorio = ?, 
		apCardiovascular = ?,
		apDigestivo = ?,
		sisNervioso = ?,

		apUrinario = ?,
		cicMestrual = ?,
		infCicMes = ?, 
		embarazo = ?, 
		meses = ?, 
		
		prg1 = ?,
		prg2 = ?,
		prg3 = ?,
		infPrg3 = ?,
		prg4 = ?
		WHERE idPaciente = ?";


		$this->pdo->prepare($sql)
		->execute(
			array(
				$data ->idClinico,
				$data->idPaciente,
				$data->esmalte, 
				$data->dentina,
				$data->raiz,
				$data->huesos, 
				$data->encia,
				$data->inEpil,
				$data->lengua,
				$data->pulpo,
				$data->velPal,
				$data->carrillo, 
				$data->soMordidaH, 
				$data->soMordidaV, 
				$data->morAbierta,
				$data->desBruxismo,
				$data->anoclusion,
				$data->simetrica,
				$data->asimetrica,
				$data->braquicefalo,
				$data->mesocefalo,
				$data->dolicefalo,
				$data->recto,
				$data->concavo,
				$data->convexo, 
				$data->sarampion,
				$data->viruela,
				$data->parotidis, 
				$data->diabetes,
				$data->hipertension,
				$data->tiroides,
				$data->hipotiroidismo,
				$data->proCoagulacion,
				$data->alergias, 
				$data->descAlergias, 
				$data->emergencia, 
				$data->revision,
				$data->limpieza,
				$data->canes,
				$data->puente,
				$data->extraccion,
				$data->prostodoncia,
				$data->buena,
				$data->mala, 
				$data->tomAlcohol,
				$data->fuma,
				$data->apRespiratorio, 
				$data->apCardiovascular,
				$data->apDigestivo,
				$data->sisNervioso,
				$data->apUrinario,
				$data->cicMestrual,
				$data->infCicMes, 
				$data->embarazo, 
				$data->meses, 
				$data->prg1,
				$data->prg2,
				$data->prg3,
				$data->infPrg3,
				$data->prg4,
				$data->idPaciente
				)
			);
	}

	public function RegistrarHisCli(HistorialClinico $data)
	{
		$sql = "INSERT INTO histClinico
		VALUES (?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?,
				?,?,?,?,?)";
				
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPaciente,
				$data->esmalte, 
				$data->dentina,
				$data->raiz,
				$data->huesos, 
				$data->encia,
				$data->inEpil,
				$data->lengua,
				$data->pulpo,
				$data->velPal,
				$data->carrillo, 
				$data->soMordidaH, 
				$data->soMordidaV, 
				$data->morAbierta,
				$data->desBruxismo,
				$data->anoclusion,
				$data->simetrica,
				$data->asimetrica,
				$data->braquicefalo,
				$data->mesocefalo,
				$data->dolicefalo,
				$data->recto,
				$data->concavo,
				$data->convexo, 
				$data->sarampion,
				$data->viruela,
				$data->parotidis, 
				$data->diabetes,
				$data->hipertension,
				$data->tiroides,
				$data->hipotiroidismo,
				$data->proCoagulacion,
				$data->alergias, 
				$data->descAlergias, 
				$data->emergencia, 
				$data->revision,
				$data->limpieza,
				$data->canes,
				$data->puente,
				$data->extraccion,
				$data->prostodoncia,
				$data->buena,
				$data->mala, 
				$data->tomAlcohol,
				$data->fuma,
				$data->apRespiratorio, 
				$data->apCardiovascular,
				$data->apDigestivo,
				$data->sisNervioso,
				$data->apUrinario,
				$data->cicMestrual,
				$data->infCicMes, 
				$data->embarazo, 
				$data->meses, 
				$data->prg1,
				$data->prg2,
				$data->prg3,
				$data->infPrg3,
				$data->prg4
				)
			);
	}
}
?>
