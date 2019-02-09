<?php
class Paciente
{
	private $pdo;  
	public $idPaciente;
	public $folio;
	public $fecIngreso;
	public $nombre; 
	public $apePat;
	public $apeMat;
	public $calle;
	public $numero;
	public $colonia;
	public $codPos;
	public $localidad;
	public $estado;
	public $telCasa;
	public $telCel; 
	public $fecNacimiento; 
	public $lugNacimiento;  
	public $edad; 
	public $sexo;  
	public $ocupacion;
	public $estCivil;
	public $perResp;
	public $motConsulta;
	public $od11;
	public $od12;
	public $od13;
	public $od14;
	public $od15;
	public $od16;
	public $od17;
	public $od18;
	public $od21;
	public $od22;
	public $od23;
	public $od24;
	public $od25;
	public $od26;
	public $od27;
	public $od28;
	public $od31;
	public $od32;
	public $od33;
	public $od34;
	public $od35;
	public $od36;
	public $od37;
	public $od38;
	public $od41;
	public $od42;
	public $od43;
	public $od44;
	public $od45;
	public $od46;
	public $od47;
	public $od48;
	public $observaciones;
	public $nombre2;
	public $img1;

	public function __CONSTRUCT()
	{
		$this->pdo = Database::StartUp();
	}

	public function ListarTx($id)
	{
		$stm = $this->pdo->prepare("SELECT * from tx WHERE idPaciente = ?");
		$stm->execute(array($id));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerTx($id)
	{
		$stm = $this->pdo->prepare("SELECT * from tx WHERE idTx = ?");
		$stm->execute(array($id));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerPago($id)
	{
		$stm = $this->pdo->prepare("SELECT * from pagos WHERE idPago = ?");
		$stm->execute(array($id));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function TotalTx($id)
	{
		$stm = $this->pdo->prepare("SELECT  SUM(subtotal) as total from tx WHERE idPaciente = ?");
		$stm->execute(array($id));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function TotalPago()
	{
		$stm = $this->pdo->prepare("SELECT  SUM(saldo) as total from tx WHERE idPaciente = 33");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarPagos($id)
	{
		
		$stm = $this->pdo->prepare("SELECT * from pagos WHERE  idPaciente = ?");
		$stm->execute(array($id));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function EliminarTxx($id)
	{
		echo $id;
		$stm = $this->pdo
		->prepare("DELETE FROM tx WHERE idTx = ?");

		$stm->execute(array($id));
	}

	public function EliminarPago($id)
	{
		$stm = $this->pdo
		->prepare("DELETE FROM pagos WHERE idPago = ?");

		$stm->execute(array($id));
	}

	public function RegistrarTx(Paciente $data)
	{
		$sql = "INSERT INTO tx
		VALUES (?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPaciente,
				$data->fecha,
				$data->nombre,
				$data->costo,
				$data->cantidad,
				$data->subtotal
				)
			);
	}

	public function GuardarOdontograma(Paciente $data){
		$sql = "INSERT INTO odontograma
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPaciente,
				$data->od11,
				$data->od12,
				$data->od13,
				$data->od14,
				$data->od15,
				$data->od16,
				$data->od17,
				$data->od18,
				$data->od21,
				$data->od22,
				$data->od23,
				$data->od24,
				$data->od25,
				$data->od26,
				$data->od27,
				$data->od28,
				$data->od31,
				$data->od32,
				$data->od33,
				$data->od34,
				$data->od35,
				$data->od36,
				$data->od37,
				$data->od38,
				$data->od41,
				$data->od42,
				$data->od43,
				$data->od44,
				$data->od45,
				$data->od46,
				$data->od47,
				$data->od48
				)
			);
	}

	public function ActualizarOdontograma(Paciente $data){
      $sql = "UPDATE odontograma SET 
      	od11 = ?, 
		od12 = ?, 
		od13 = ?, 
		od14 = ?, 
		od15 = ?, 
		od16 = ?, 
		od17 = ?, 
		od18 = ?, 
		od21 = ?, 
		od22 = ?, 
		od23 = ?, 
		od24 = ?, 
		od25 = ?, 
		od26 = ?, 
		od27 = ?, 
		od28 = ?, 
		od31 = ?, 
		od32 = ?, 
		od33 = ?, 
		od34 = ?, 
		od35 = ?, 
		od36 = ?, 
		od37 = ?, 
		od38 = ?, 
		od41 = ?, 
		od42 = ?, 
		od43 = ?, 
		od44 = ?, 
		od45 = ?, 
		od46 = ?, 
		od47 = ?, 
		od48 = ?

      WHERE idPaciente = ?";
      $this->pdo->prepare($sql)
      ->execute(
         array(
				$data->od11,
				$data->od12,
				$data->od13,
				$data->od14,
				$data->od15,
				$data->od16,
				$data->od17,
				$data->od18,
				$data->od21,
				$data->od22,
				$data->od23,
				$data->od24,
				$data->od25,
				$data->od26,
				$data->od27,
				$data->od28,
				$data->od31,
				$data->od32,
				$data->od33,
				$data->od34,
				$data->od35,
				$data->od36,
				$data->od37,
				$data->od38,
				$data->od41,
				$data->od42,
				$data->od43,
				$data->od44,
				$data->od45,
				$data->od46,
				$data->od47,
				$data->od48,
				$data->idPaciente
            )
         );
   }


	public function RegistrarRadiografia(Paciente $data){
		$sql = "INSERT INTO radiografias
		VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idPaciente,
				$data->idPaciente,
				$data->observaciones,
				$data->nombre,
				$data->nombre2
				)
			);
	}

	public function getRadiografia($idPaciente){
		
		$stm = $this->pdo->prepare("SELECT * from radiografias WHERE idPaciente = ?");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ActualizarRadiografia(Paciente $data){
      $sql = "UPDATE radiografias SET observaciones = ?, img1 = ?, img2 = ? 

      WHERE idPaciente = ?";
      $this->pdo->prepare($sql)
      ->execute(
         array(
            $data->observaciones,
            $data->nombre,
            $data->nombre2,
            $data->idPaciente
            )
         );
   }


	public function RegistrarPago(Paciente $data)
	{
		$sql = "INSERT INTO pagos
		VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->idPaciente,
				$data->fecha,
				$data->abono
				)
			);
	}

	   public function ActualizarPago(Paciente $data)
	   {
	      $sql = "UPDATE pagos SET
	      fecha = ?, abono = ?

	      WHERE idPago = ?";
	      $this->pdo->prepare($sql)
	      ->execute(
	         array(
	            $data->fecha,
	            $data->abono,
	            $data->idPago,
	            )
	         );
	   }



		public function ActualizarTx(Paciente $data)
	   {
	      $sql = "UPDATE tx SET
	      fecha = ?, nombre = ?, costo = ? ,cantidad =? ,subtotal =?

	      WHERE idTx = ?";
	      $this->pdo->prepare($sql)
	      ->execute(
	         array(
	            $data->fecha,
	            $data->nombre,
	            $data->costo,
	            $data->cantidad,
	            $data->subtotal,
	            $data->idTx
	            )
	         );
	   }

	public function Listar($id)
	{
		$stm = $this->pdo->prepare("SELECT * FROM 

			pacientes AS b, 
			radiografias AS rad,
			odontograma AS odo

			WHERE b.idPaciente = ? 
			AND rad.idPaciente = ?
			AND odo.idPaciente = ?");

		$stm->execute(array($id, $id, $id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ListarDatosPersonales()
	{
		$stm = $this->pdo->prepare("
			SELECT
			b.idPaciente,
			b.curp,
			b.primerApellido,
			b.segundoApellido,
			b.nombres,
			idOf.idIdentificacion as nomTipoI
			FROM identificacionoficial idOf,
			tipovialidad tV, estadocivil eC,
			ocupacion o, vivienda v,
			nivelestudio nE,
			seguridadsocial sS,
			discapacidad d,
			grupovulnerable gV,
			asentamientos a,
			localidades l,
			ingresomensual iM,
			beneficiarios  b
			where  b.idIdentificacion = idOf.idIdentificacion AND
			b.idTipoVialidad = tV.idTipoVialidad AND
			b.idEstadoCivil = eC.idEstadoCivil AND
			b.idOcupacion = o.idOcupacion AND
			b.idIngresoMensual = iM.idIngresoMensual AND
			b.idVivienda =  v.idVivienda AND
			b.idNivelEstudios = nE.idNivelEstudios AND
			b.idSeguridadSocial = sS.idSeguridadSocial AND
			b.idDiscapacidad = d.idDiscapacidad AND
			b.idGrupoVulnerable =gV.idGrupoVulnerable AND
			b.idAsentamientos = a.idAsentamientos AND
			b.idLocalidad = l.idLocalidad
			WHERE idPaciente = ?");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}


	public function Registrar(Paciente $data)
	{
		$sql = "INSERT INTO pacientes
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->folio,
				$data->fecIngreso, 
				$data->nombre,
				$data->apePat,
				$data->apeMat, 
				$data->calle,
				$data->numero,
				$data->colonia,
				$data->codPos,
				$data->localidad,
				$data->estado, 
				$data->telCasa, 
				$data->telCel, 
				$data->fecNacimiento,
				$data->lugNacimiento,
				$data->edad,
				$data->sexo,
				$data->ocupacion,
				$data->estCivil,
				$data->perResp,
				$data->motConsulta
				)
			);
		$last = $this->pdo->lastInsertId();
		$sql2 = "INSERT INTO odontograma (idPaciente) values (?)";

		$this->pdo->prepare($sql2)->execute(array($last));
		$sql3 = "INSERT INTO radiografias (idPaciente) values (?)";
		$this->pdo->prepare($sql3)->execute(array($last));
		return $this->pdo->lastInsertId();
	}

	public function Obtener($idPaciente)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM pacientes WHERE idPaciente = ?");
		$stm->execute(array($idPaciente));
		return $stm->fetch(PDO::FETCH_OBJ);
	}



	public function ObtenerIdPaciente($curp)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM pacientes WHERE curp = ?");
		$stm->execute(array($curp));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function Eliminar($data)
	{
		$stm = $this->pdo
		->prepare("UPDATE registro r INNER JOIN beneficiarios b
			ON r.idRegistro = b.idRegistro
			SET estado = ?
			WHERE b.idPaciente = ?");

		$stm->execute(array(
			$data->estado,
			$data->idPaciente
			));
	}

	public function EliminarP(Paciente $id)
	{
		
		$stm = $this->pdo
		->prepare("DELETE FROM pacientes WHERE idPaciente = ?");
		$stm->execute(array($id->idPaciente));
	}

	//Metodo para actualizar
	public function Actualizar($data)
	{
			$sql = "UPDATE pacientes SET 
		idPaciente = ?,
		folio = ?,
		fecIngreso = ?,
		nombre = ?,
		apeMat = ?,
		apePat = ?,
		calle = ?, 
		numero = ?, 
		colonia = ?, 
		codPos = ?, 
		localidad = ?, 
		estado = ?, 
		telCasa = ?, 
		telCel = ?, 
		fecNacimiento = ?, 
		lugNacimiento = ?, 
		edad = ?, 
		sexo = ?, 
		ocupacion = ?, 
		estCivil = ?, 
		perResp = ?, 
		motConsulta = ?  
		WHERE idPaciente = ?";

		$this->pdo->prepare($sql)
		->execute(
			array(
				$data->idPaciente,
				$data->folio,
				$data->fecIngreso, 
				$data->nombre,
				$data->apeMat,
				$data->apePat, 
				$data->calle,
				$data->numero,
				$data->colonia,
				$data->codPos,
				$data->localidad,
				$data->estado, 
				$data->telCasa, 
				$data->telCel, 
				$data->fecNacimiento,
				$data->lugNacimiento,
				$data->edad,
				$data->sexo,
				$data->ocupacion,
				$data->estCivil,
				$data->perResp,
				$data->motConsulta,
				$data->idPaciente
				)
			);
	}


	//Metodo para actualizar
	public function Activar($idRegistro)
	{
		$sql = "UPDATE registro SET	estado = 'Activo' WHERE idRegistro = ?";

		$this->pdo->prepare($sql)
		->execute(
			array($idRegistro)
			);
	}

	public function verificaPaciente($nombre, $apePat, $apeMat)
	{
		$sql= $this->pdo->prepare("SELECT * FROM pacientes WHERE nombre = ? AND apePat = ? AND apeMat = ?");
		$resultado=$sql->execute(
			array($nombre, $apePat, $apeMat)
		);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function Listar1($periodo)
	{
		$fechaInicio=$periodo.'-01-01';
		$fechaFin=$periodo.'-12-31';
		$stm = $this->pdo->prepare("SELECT * FROM beneficiarios b, registro r, municipio m WHERE b.idRegistro= r.idRegistro AND b.idMunicipio=m.idMunicipio AND r.estado='Activo' AND DATE(r.fechaAlta) BETWEEN ? AND ?");
		$stm->execute(array($fechaInicio, $fechaFin));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Listar2($periodo)
	{
		$fechaInicio=$periodo.'-01-01';
		$fechaFin=$periodo.'-12-31';
		$stm = $this->pdo->prepare("SELECT * FROM beneficiarios b, registro r, municipio m, actualizacion a WHERE b.idRegistro= r.idRegistro AND b.idMunicipio=m.idMunicipio AND r.idRegistro=a.idRegistro AND r.estado='Activo' AND DATE(a.fechaActualizacion) BETWEEN ? AND ?");
		$stm->execute(array($fechaInicio, $fechaFin));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarTodos()
	{ 
		$stm = $this->pdo->prepare("SELECT 	* FROM pacientes");
		$stm->execute(array());

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
	
//Funciones para registrar los detalles de cada registro de beneficiarios.

	public function RegistraDatosRegistro(Paciente $data){
		$sql = "INSERT INTO registro VALUES (?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->usuario,
				$data->direccion,
				$data->fechaAlta,
				$data->estado
				)
			);
		return $this->pdo->lastInsertId();
	}

	public function ObtenerIdRegistro($idPaciente)
	{
		$sql= $this->pdo->prepare("SELECT registro.idRegistro from registro, beneficiarios where registro.idregistro=beneficiarios.idregistro and idPaciente=$idPaciente");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerIdMunicipio($claveMunicipio)
	{
		$sql= $this->pdo->prepare("SELECT idMunicipio FROM municipio WHERE claveMunicipio=$claveMunicipio");
		$resultado=$sql->execute();
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function RegistraActualizacion(Paciente $data){
		$sql = "INSERT INTO actualizacion VALUES (?,?,?,?,?)";
		$this->pdo->prepare($sql)
		->execute(
			array(
				null,
				$data->usuario,
				$data->direccion,
				$data->fechaAlta,
				$data->idRegistro
				)
			);
	}

	public function ObtenerInfoRegistro($idPaciente)
	{
		$sql= $this->pdo->prepare("SELECT * FROM pacientes WHERE idPaciente=?;");
		$resultado=$sql->execute(array($idPaciente));
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ListarActualizacion($idRegistro)
	{
		$stm = $this->pdo->prepare("SELECT * FROM actualizacion WHERE idRegistro=?");
		$stm->execute(array($idRegistro));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerInfoActualizacion2()
	{
		$sql= $this->pdo->prepare("SELECT * FROM actualizacion;");
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ObtenerInfoApoyo($idPaciente)
	{
		$stm = $this->pdo->prepare("SELECT * FROM apoyos,beneficiarios,origen,registroapoyo,subprograma,programa,periodicidad,tipoapoyo,caracteristicasapoyo WHERE apoyos.idPacienteRFC=beneficiarios.idPaciente AND apoyos.idRegistroApoyo=registroapoyo.idRegistroApoyo AND apoyos.idSubprograma=subprograma.idSubprograma AND subprograma.idPrograma=programa.idPrograma AND apoyos.idPeriodicidad=periodicidad.idPeriodicidad AND apoyos.idOrigen=origen.idOrigen AND caracteristicasapoyo.idTipoApoyo=tipoapoyo.idTipoApoyo AND apoyos.idCaracteristica=caracteristicasapoyo.idCaracteristicasApoyo AND beneficiarios.idPaciente=? ORDER BY apoyos.idApoyo;");

		$stm->execute(array($idPaciente));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarLocalidades($municipio)
	{
		$stm = $this->pdo->prepare("SELECT * FROM localidades WHERE municipio=? AND estado='Activo';");
		$stm->execute(array($municipio));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarAsentamientos($localidad)
	{
		$stm = $this->pdo->prepare("SELECT * FROM asentamientos WHERE localidad=?");
		$stm->execute(array($localidad));

		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function ObtenerMunicipio($idMunicipio)
	{
		$sql= $this->pdo->prepare("SELECT * FROM municipio WHERE idMunicipio=?");
		$resultado=$sql->execute(
			array($idMunicipio)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}

	public function ObtenerLocalidad($idLocalidad)
	{
		$sql= $this->pdo->prepare("SELECT localidad FROM localidades WHERE idLocalidad=?");
		$resultado=$sql->execute(
			array($idLocalidad)
			);
		return $sql->fetch(PDO::FETCH_OBJ,PDO::FETCH_ASSOC);
	}
}


