<?php

/**
 * This is the model class for table "identificacion".
 *
 * The followings are the available columns in table 'identificacion':
 * @property string $nick
 * @property string $password
 * @property string $nombre
 * @property string $apellido_pat
 * @property string $apellido_mat
 * @property string $calle_numero
 * @property string $colonia
 * @property string $municipio
 * @property string $estado
 * @property string $pais
 * @property string $telefono
 * @property string $tarjeta_credito
 * @property integer $id
 */
class Identificacion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'identificacion';
    }
     private $_identity;

    public function insertarAes($m, $pass) {
        $q = "insert into identificacion"
                . "(nick,"
                . "password,"
                . "nombre,"
                . "apellido_pat,"
                . "apellido_mat,"
                . "calle_numero,"
                . "colonia,"
                . "municipio,"
                . "estado,"
                . "pais,"
                . "telefono,"
                . "tarjeta_credito,"
                . "id) VALUES"
                . "(AES_ENCRYPT('$m->nick', '$pass'),"
                . " AES_ENCRYPT('$m->password', '$pass'),"
                . " AES_ENCRYPT('$m->nombre', '$pass'),"
                . " AES_ENCRYPT('$m->apellido_pat', '$pass'),"
                . " AES_ENCRYPT('$m->apellido_mat', '$pass'),"
                . " AES_ENCRYPT('$m->calle_numero', '$pass'),"
                . " AES_ENCRYPT('$m->colonia', '$pass'),"
                . " AES_ENCRYPT('$m->municipio', '$pass'),"
                . " AES_ENCRYPT('$m->estado', '$pass'),"
                . " AES_ENCRYPT('$m->pais', '$pass'),"
                . " AES_ENCRYPT('$m->telefono' , '$pass'),"
                . " AES_ENCRYPT('$m->tarjeta_credito' , '$pass'),"
                . " '$m->id')";
        $cmd = Yii::app()->db->createCommand($q);
        return $cmd->execute();
    }
    
  

    //SELECT AES_DECRYPT (tarjeta, 'secretkey-wT125H')
    //  FROM cliente WHERE id = 1 ;
    public function descifrarAes($name, $pass) {
        $q = "select "
                . " AES_DECRYPT(nick, '$pass'),"
                . " AES_DECRYPT(password, '$pass'),"
                . " AES_DECRYPT(nombre, '$pass'),"
                . " AES_DECRYPT(apellido_pat, '$pass'),"
                . " AES_DECRYPT(apellido_mat, '$pass'),"
                . " AES_DECRYPT(calle_numero, '$pass'),"
                . " AES_DECRYPT(colonia, '$pass'),"
                . " AES_DECRYPT(municipio, '$pass'),"
                . " AES_DECRYPT(estado, '$pass'),"
                . " AES_DECRYPT(pais, '$pass'),"
                . " AES_DECRYPT(telefono, '$pass'),"
                . " AES_DECRYPT(tarjeta_credito, '$pass') "
                . " from identificacion where AES_DECRYPT(nick, '$pass')='$name';";
        $cmd = Yii::app()->db->createCommand($q);
        return $res = $cmd->query();
    }
    
    public function authenticate($attribute, $params) {
        #echo "<pre>";
         #   print_r($this->validatePassword($this->pass." No hay nada veda"));
           # echo '</pre>';
           # Yii::app()->end();
        if (!$this->hasErrors()) {
            
            $this->_identity = new UserIdentity($this->nick, $this->pass);
            if (!$this->_identity->authenticate())
                $this->addError('pass', 'Usuario o Password incorrecto.');
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nick, password, nombre, apellido_pat, calle_numero, colonia, municipio, estado, pais, telefono, tarjeta_credito, id', 'required'),
            array('id', 'numerical', 'integerOnly' => true),
            array('nick, password, nombre, apellido_pat, apellido_mat, calle_numero, colonia, municipio, estado, pais', 'length', 'max' => 35),
            array('telefono', 'length', 'max' => 16),
            array('tarjeta_credito', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('nick, password, nombre, apellido_pat, apellido_mat, calle_numero, colonia, municipio, estado, pais, telefono, tarjeta_credito, id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    public function login() {
        if ($this->_identity === null) {
           # echo '</pre>';
           # echo $this->validatePassword($this->password,$this->nick);
           # echo '</pre>';
           # Yii::app()->end();
            $this->_identity = new UserIdentity($this->nick, $this->validatePassword($this->password,$this->nick));
           // $this->_identity->authenticate();
            if($this->validatePassword($this->password,$this->nick)==1){
                Yii::app()->user->login($this->_identity);
                Yii::app()->user->login($this->_identity);
                return true;
                
            }
            else{
                return false;
            }
            
        }
        #if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            //$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
           # Yii::app()->user->login($this->_identity);
            #return true;
        #} else
         #   return false;
    }
    
    public function validatePassword($pass,$name) {
        
         
        $q = "select "
                . " AES_DECRYPT(nick, '$pass'),"
                . " AES_DECRYPT(password, '$pass') "
                . " from identificacion where AES_DECRYPT(nick, '$pass')='$name' && AES_DECRYPT(password, '$pass')='$pass' ;";

        //. " and incid_registro_id='$flag'";
        $cmd = Yii::app()->db->createCommand($q);
        $res = $cmd->execute();
        return $res;
        
        
        //return $this->hashPassword($password, $this->session) == $this->pass;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'nick' => 'Nick',
            'password' => 'Password',
            'nombre' => 'Nombre',
            'apellido_pat' => 'Apellido Pat',
            'apellido_mat' => 'Apellido Mat',
            'calle_numero' => 'Calle Numero',
            'colonia' => 'Colonia',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'telefono' => 'Telefono',
            'tarjeta_credito' => 'Tarjeta Credito',
            'id' => 'ID',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('nick', $this->nick, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido_pat', $this->apellido_pat, true);
        $criteria->compare('apellido_mat', $this->apellido_mat, true);
        $criteria->compare('calle_numero', $this->calle_numero, true);
        $criteria->compare('colonia', $this->colonia, true);
        $criteria->compare('municipio', $this->municipio, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('pais', $this->pais, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('tarjeta_credito', $this->tarjeta_credito, true);
        $criteria->compare('id', $this->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Identificacion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
