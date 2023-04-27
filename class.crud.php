<?php

/* Evitar acesso a uma pagina*/
$pagina="pagina.php"; //aqui colocariamos o nome da pagina.
if(basename($_SERVER["PHP_SELF"])=='$pagina'){
die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('index.php')</script>");
}

class crud {
 private $db;
 


 function __construct($DB_con)
 {
  $this->db = $DB_con;
  
 }

// Cadatrar funcionário
public function CreateFuncionario($nome,$nacionalidade,$naturalidade,$documento, $endereco,$tel,  $sexo, $datanascimento, $senha, $perfil )
{
 try
 {
  
  $stmt = $this->db->prepare("INSERT INTO funcionario( idfuncionario ,nome, nacionalidade, naturalidade, documento, endereco, telefone, datanascimento, sexo, senha, idperfil) VALUES(default,:nome,:nacionalidade,:naturalidade,:documentacao, :endereco,:tel, :datanascimento, :sexo, :senha, :perfil)");
  $stmt->bindparam(":nome",$nome);
  $stmt->bindparam(":nacionalidade",$nacionalidade);
  $stmt->bindparam(":naturalidade",$naturalidade);
  $stmt->bindparam(":documento",$documento);
  $stmt->bindparam(":endereco",$endereco);
  $stmt->bindparam(":tel",$tel); 
  $stmt->bindparam(":datanascimento",$datanascimento);
  $stmt->bindparam(":sexo",$sexo);
  $senhae=md5($senha);
  $stmt->bindparam(":senha",$senhae);
  $stmt->bindparam(":perfil",$perfil);
  
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}

 //Actualizar Funcionario
 public function UpdateFuncionario($id,$nome,$nacionalidade,$naturalidade,$documento, $endereco,$tel,  $sexo, $datanascimento, $senha, $perfil )
 {
  try
  {
    $stmt ="";
    if($senha!=""){
      $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documento=:documento, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo, senha=:senha, idperfil=:perfil WHERE idfuncionario=:id");
   
     }else{
      $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documento=:documento, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo,  idperfil=:perfil WHERE idfuncionario=:id");
   
     }
   
   $stmt = $this->db->prepare("UPDATE funcionario set nome=:nome, nacionalidade=:nacionalidade, naturalidade=:naturalidade, documento=:documento, endereco=:endereco, telefone=:tel, datanascimento=:datanascimento, sexo=:sexo, senha=:senha, idperfil=:perfil WHERE idfuncionario=:id");
   $stmt->bindparam(":id",$id);
   $stmt->bindparam(":nome",$nome);
   $stmt->bindparam(":nacionalidade",$nacionalidade);
   $stmt->bindparam(":naturalidade",$naturalidade);
   $stmt->bindparam(":documento",$documento);
   $stmt->bindparam(":endereco",$endereco);
   $stmt->bindparam(":tel",$tel); 
   $stmt->bindparam(":datanascimento",$datanascimento);
   $stmt->bindparam(":sexo",$sexo);
   if($senha!=""){
   $senhae=md5($senha);
   $stmt->bindparam(":senha",$senhae);
  }
   $stmt->bindparam(":perfil",$perfil);
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

//  Deletar funcionário
public function DeleteFuncionario($id){
  try
  {
     
   $stmt = $this->db->prepare("DELETE from funcionario WHERE idfuncionario=:id");
   $stmt->bindparam(":id",$id);
    
     
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
    echo $e->getMessage(); 
    return false;
  }
}

// Quantidade alunos
public function totalAlunos(){
  $stmt = $this->db->prepare("select count(*) as total  from alunos");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    return ($row['total']);                   
        
   }
  }
  else
  {
    return 0;
  }
  
 }
 
}