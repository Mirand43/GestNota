<?php

/* Evitar acesso a uma pagina*/
$pagina="pagina.php"; //aqui colocariamos o nome da pagina.
if(basename($_SERVER["PHP_SELF"])=='$pagina'){
die("<script>alert('Sem permição de acesso !')</script>\n<script>window.location=('index.php')</script>");
}

class crud
{
 private $db;


 function __construct($DB_con)
 {
  $this->db = $DB_con;
  
 }


public function fecharlogin(){
  session_start();
      //
    session_unset();
    session_destroy();
return true;
}

 
 public function loginuser($username, $senha){

    //$stmt = $this->db->prepare("INSERT INTO funcionario( idfuncionario ,nome, nacionalidade, naturalidade, documentacao, endereco, telefone, datanascimento, sexo, senha, idperfil) VALUES(default,:nome,:nacionalidade,:naturalidade,:documentacao, :endereco,:tel, :datanascimento, :sexo, :senha, :perfil)");
  
    $stmt = $this->db->prepare("SELECT * FROM funcionario WHERE nome=:username and senha=:senha");
    $stmt->bindparam(":username",$username);
    $senhae=md5($senha) ;
    $stmt->bindparam(":senha",$senhae);
    $stmt->execute();
    //print($username );
  //print($senhae ); 
   print ($stmt->rowCount());
    if($stmt->rowCount()>0)
  {
     

   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    //print(" encontrou  o user ");
   
//Iniciando a sessão:
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
else{

//Destruindo a sessão:
session_start();
$_SESSION['username'] = $username;
$_SESSION['id_utilizador'] = $row['idfuncionario'];
$_SESSION['id_tipo_utilizador'] = $row['idperfil'];
$_SESSION['carrinho'] = array();
//Gravando valores dentro da sessão aberta:

//print(" criou sessao ");
if ($row['idperfil']==1){
header('Location: view/caixa');
break;
}

return true;
  }              
              
   }
  }
  else
  { 
      session_start();
      //
    session_unset();
    session_destroy();
    //unset ($_SESSION['login']);
      return false;
     
    
  }
 
}

//Apresentar perfil
public function ComboPerfil()
 {
  $stmt = $this->db->prepare("SELECT * from perfil");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

      <option value="<?php print($row['descricao']); ?>"><?php print($row['descricao']); ?></option>
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }

  //Pegar o total de disciplina
   public function TotalDisciplina(){
    $stmt = $this->db->prepare("select count(*) as total  from disciplina");
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

//Criar turma
public function createTurma($classeTurma,$turnoTurma,$coordenadorTurma,$disciplinasTurma,$descricaoTurma)
{
 try
 {
  $stmt = $this->db->prepare("INSERT INTO turma(id, classeTurma, turnoTurma, coordenadorTurma, disciplinasTurma, descricaoTurma)  VALUES(default, :classeTurma, :turnoTurma, :coordenadorTurma, :disciplinasTurma, :descricaoTurma)");
  $stmt->bindparam(":classeTurma",$classeTurma);
  $stmt->bindparam(":turnoTurma",$turnoTurma);
  $stmt->bindparam(":coordenadorTurma",$coordenadorTurma);
  $stmt->bindparam(":disciplinasTurma",$disciplinasTurma);
  $stmt->bindparam(":descricaoTurma",$descricaoTurma);
 
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}

//Apresentar turma
public function ComboTurma()
 {
  $stmt = $this->db->prepare("SELECT * from turma");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

    <tr>
      <td><?php print($row['id']); ?></td>
      <td><?php print($row['classeTurma']); ?>ª Classe</td>
      <td><?php print($row['turnoTurma']); ?></td>
      <td><?php print($row['coordenadorTurma']); ?></td>
      <td><?php print($row['disciplinasTurma']); ?></td>
      <td><?php print($row['descricaoTurma']); ?></td>
      
    </tr>
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }

//Criar disciplina
public function createDisciplina($descricaodisciplina,$coordenadordisciplina)
{
 try
 {
  $stmt = $this->db->prepare("INSERT INTO disciplina(id, descricaodisciplina, coordenadordisciplina) VALUES(default, :descricaodisciplina, :coordenadordisciplina)");
  $stmt->bindparam(":descricaodisciplina",$descricaodisciplina);
  $stmt->bindparam(":coordenadordisciplina",$coordenadordisciplina);
 
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}

//Apresentar disciplina
public function ComboDisciplina()
 {
  $stmt = $this->db->prepare("SELECT * from disciplina");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>

    <tr>
      <td><?php print($row['descricaodisciplina']); ?></td>
      <td><?php print($row['coordenadordisciplina']); ?></td>      
    </tr>
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }

//criar Funcionarios
public function CreateFuncionarios($numerofuncionario, $nomefuncionario, $datanascimento, $documento, $sexofuncionaro, $naturalidadefuncionario, $nacionalidadefuncionario, $telefonefuncionario, $emailfuncionario, $enderecofuncionario, $estadocivilfuncionario, $perfil, $senhafuncionario)
 {
  try
  {
    
   $stmt = $this->db->prepare("INSERT INTO funcionario( idfuncionario, numerofuncionario, nomefuncionario, datanascimento, documento, sexofuncionaro, naturalidadefuncionario, nacionalidadefuncionario, telefonefuncionario, emailfuncionario, enderecofuncionario, estadocivilfuncionario, perfil, senhafuncionario) VALUES(default, :numerofuncionario, :nomefuncionario, :datanascimento, :documento, :sexofuncionaro, :naturalidadefuncionario, :nacionalidadefuncionario, :telefonefuncionario, :emailfuncionario, :enderecofuncionario, :estadocivilfuncionario, :perfil,:senhafuncionario )");
   $stmt->bindparam(":numerofuncionario",$numerofuncionario);
   $stmt->bindparam(":nomefuncionario",$nomefuncionario);
   $stmt->bindparam(":datanascimento",$datanascimento);
   $stmt->bindparam(":documento",$documento);
   $stmt->bindparam(":sexofuncionaro",$sexofuncionaro);
   $stmt->bindparam(":naturalidadefuncionario",$naturalidadefuncionario);
   $stmt->bindparam(":nacionalidadefuncionario",$nacionalidadefuncionario);
   $stmt->bindparam(":telefonefuncionario",$telefonefuncionario);
   $stmt->bindparam(":emailfuncionario",$emailfuncionario);
   $stmt->bindparam(":enderecofuncionario",$enderecofuncionario);
   $stmt->bindparam(":estadocivilfuncionario",$estadocivilfuncionario);
   $stmt->bindparam(":perfil",$perfil);
  //  $senhafuncionario=md5($senhafuncionario);
   $stmt->bindparam($senhafuncionario=md5($senhafuncionario));
   
   $stmt->execute();
   return true;
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
  
 }

   //Pegar o total de funcionários
   public function TotalFuncionarios(){
    $stmt = $this->db->prepare("select count(*) as total  from funcionario");
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


 //Apresentar Cliente
public function ComboCliente()
 {
  $stmt = $this->db->prepare("select * from cliente");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
          
         
    <tr>         
     <td><?php print($row['nome']); ?></td>
     <td><?php print($row['morada']); ?></td>
     <td><?php print($row['telefone']); ?></td>
     <td><?php print($row['email']); ?></td> 

                <td align="center">
                <a href="Edit_Cliente.php?edit_id=<?php print($row['idcliente']);?>"><i class="glyphicon glyphicon-pencil"></i> </a></td>
        
                
    </tr> 
   
                
        <?php
   }
  }
  else
  {
  
  }
  
 }


//Função criar
public function create($fname
,$lname,$email,$contact)
{
 try
 {
  $stmt = $this->db->prepare("INSERT INTO tbl_users(first_name,last_name,email_id,contact_no) VALUES(:fname, :lname, :email, :contact)");
  $stmt->bindparam(":fname",$fname);
  $stmt->bindparam(":lname",$lname);
  $stmt->bindparam(":email",$email);
  $stmt->bindparam(":contact",$contact);
  $stmt->execute();
  return true;
 }
 catch(PDOException $e)
 {
  echo $e->getMessage(); 
  return false;
 }
 
}

 public function createcontacto($fname,$email,$zona,$dep,$voip,$tel1,$tel2,$empresa)
 {
  try
  {
   $stmt = $this->db->prepare("INSERT INTO pessoa(nome,email,id_area,id_zona,id_empresa) VALUES(:fname, :email, :id_area, :id_zona, :id_empresa)");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":id_area",$dep);
   $stmt->bindparam(":id_zona",$zona);
   $stmt->bindparam(":id_empresa",$empresa);
   $stmt->execute();
   /* voip*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 1)");
   $stmt->bindparam(":fname",$voip); 
   $stmt->execute();
   
   /* boss*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 2)");
   $stmt->bindparam(":fname",$tel1);
   
   $stmt->execute();
   
    /* pessoal*/
   $stmt = $this->db->prepare("INSERT INTO contacto(numero,id_pessoa,id_tipo) VALUES(:fname, (select max(id_pessoa) from pessoa), 3)");
   $stmt->bindparam(":fname",$tel2);
   
   $stmt->execute();
   
   return true;
  }
  catch(PDOException $e)
  {
	  ?>
	  
    <div class="container">
	</br> </br>
	<div class="alert alert-warning">
    <strong> 
	
	<?php
	
  /* echo $e->getMessage();*/
  echo ('Erro! O Contacto '.$fname.' Já está Registrado no Sistema');
   
   
   ?>
   
   </strong> 
	</div>
	</div>
    <?php
   return false;
   
  }
  
 }
 
 
 public function getID($id)
 {
  $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE id=:id");
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }
 
 public function getIDpessoa($id)
 {
	  $query = "SELECT p.id_pessoa, p.nome, p.email, a.descricao as Area, z.descricao as Zona, z.id_zona, a.id_area,  z.indicativo , c.numero as Voip  FROM pessoa p inner join area a on p.id_area=a.id_area inner join zona z on p.id_zona = z.id_zona inner join contacto c on c.id_pessoa = p.id_pessoa where p.id_pessoa = ".$id." order by p.nome, p.id_pessoa "; 

  $stmt = $this->db->prepare($query);
  $stmt->execute(array(":id"=>$id));
  $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
  return $editRow;
 }
 
 public function update($id,$fname,$lname,$email,$contact)
 {
  try
  {
   $stmt=$this->db->prepare("UPDATE tbl_users SET first_name=:fname,last_name=:lname, email_id=:email, contact_no=:contact   WHERE id=:id ");
   $stmt->bindparam(":fname",$fname);
   $stmt->bindparam(":lname",$lname);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":contact",$contact);
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
 
public function logar($nome ,$senha)
 {
  /*try
  {*/
   
   //verfificar se tem primeiro
   
   
   $stmt1=$this->db->prepare("select nome, senha from users WHERE nome =:nome and senha =:senha");
   $stmt1->bindparam(":nome",$nome);
   $stmt1->bindparam(":senha",$senha);
   $stmt1->execute();
   $contacto = $stmt1 -> fetch(PDO::FETCH_ASSOC);
   //se o metodo fetch não retornar um array, significa que o ID não corresponde a um contacto
   
   if($stmt1->rowCount()>0)
   {
		 // session_start inicia a sessão
    session_start();
     
    $_SESSION['login'] = $nome;
    $_SESSION['senha'] = $senha;
	//header('location:pesquisar.php');
	echo "<script >	document.location='pesquisar.php'	</script>";
	
   }
  //Caso contrário redireciona para a página de autenticação
  
else {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
 
    //Redireciona para a página de autenticação
	
	echo "<script >		document.location='login.php?falha=1'	</script>";
	
  //  header('location:login.php?falha="erro"');
     
}
    
 /* }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }*/
 }




 public function delete($id)
 {
  $stmt = $this->db->prepare("DELETE FROM tbl_users WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
 }

  public function deletep($id)
 {
  $stmt = $this->db->prepare("DELETE FROM pessoa WHERE id_pessoa=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  
  $stmt = $this->db->prepare("DELETE FROM contacto WHERE id_pessoa=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  
  return true;
 }
 
 /*colocar os dados na combobox*/
 
 
 
 
 /*colocar os dados na combobox*/
 
 
 public function combozonaedtit($idzona)
 {
  $stmt = $this->db->prepare("select descricao, id_zona from zona");
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                
                
                <option <?php if($row['id_zona'] == $idzona)   print("SELECTED ");?> value=<?php print($row['id_zona']); ?> ><?php print($row['descricao']); ?></option>
				
               
                <?php
   }
  }
  else
  {
   ?>
             <option value="1">Erro ao Apresentar</option>
            <?php
  }
  
 }
 
  
 
 
 /* paging */
 
 public function dataview($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
	 
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
                
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['Area']); ?></td>
                <td><?php print($row['Zona']); ?></td>
				
				<td><?php print($row['boss']); ?></td>
                <td><?php print($row['Voip']); ?></td>
				
				 
				<td align="center">
                <a href="ver.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-search"></i></a>
                </td>
                <td align="center">
                <a href="editar.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                </td>
                <td align="center">
                <a href="deletar.php?edit_id=<?php print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?>&nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
				
                </tr>
                <?php
   }
   
  }
  else
  {
   ?>
            <tr>
            <td colspan="10" align="center" >Nenhum Registo Encontrado...</td>
            </tr>
            <?php
  }
  
 }
 
 public function dataview1($query)
 {
  $stmt = $this->db->prepare($query);
  $stmt->execute();
 
  if($stmt->rowCount()>0)
  {
	 
   while($row=$stmt->fetch(PDO::FETCH_ASSOC))
   {
    ?>
                <tr>
              
                <td><?php print($row['nome']); ?></td>
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['Area']); ?></td>
                <td><?php print($row['Zona']); ?></td>
				
				<td><?php print($row['boss']); ?></td>
                <td><?php print($row['Voip']); ?></td>
				
				 
				<td align="center">
                <a href="verb.php?edit_id=<?php  print($row['id_pessoa']); ?>&empresa=<?php print($row['id_empresa']); ?> &nome=<?php print($row['nome']); ?>&email=<?php print($row['email']); ?>&Area=<?php print($row['Area']); ?>&Zona=<?php print($row['Zona']); ?>&indicativo=<?php print($row['indicativo']); ?>&Voip=<?php print($row['Voip']); ?>"><i class="glyphicon glyphicon-search"></i></a>
                </td>
                
				
                </tr>
                <?php
   }
   
  }
  else
  {
   ?>
            <tr>
            <td colspan="10" align="center" >Nenhum Registo Encontrado...</td>
            </tr>
            <?php
  }
  
 }
 
 public function paging($query,$records_per_page)
 {
  $starting_position=0;
  if(isset($_GET["page_no"]))
  {
   $starting_position=($_GET["page_no"]-1)*$records_per_page;
  }
  $query2=$query." limit $starting_position,$records_per_page";
  return $query2;
 }
 
 public function paginglink($query,$records_per_page)
 {/*
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1&pesquisa=".$_GET["pesquisa"]."'>Primeira</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."&pesquisa=".$_GET["pesquisa"]."'>Anterior</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$_GET["pesquisa"]."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$_GET["pesquisa"]."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."&pesquisa=".$_GET["pesquisa"]."'>Proxima</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."&pesquisa=".$_GET["pesquisa"]."'>Ultima</a></li>";
   }*/




	
  
  $self = $_SERVER['PHP_SELF'];
  
  $stmt = $this->db->prepare($query);
  $stmt->execute();
  
  $total_no_of_records = $stmt->rowCount();
  
  if($total_no_of_records > 0)
  {
   ?><ul class="pagination"><?php
   $total_no_of_pages=ceil($total_no_of_records/$records_per_page);
   $current_page=1;
   if(isset($_GET["page_no"]))
   {
    $current_page=$_GET["page_no"];
   }
   if(isset($_GET["pesquisa"]))
   {
    $parametro=$_GET["pesquisa"];
   }else{$parametro="";}
   
   if($current_page!=1)
   {
    $previous =$current_page-1;
    echo "<li><a href='".$self."?page_no=1&pesquisa=".$parametro."'>Primeira</a></li>";
    echo "<li><a href='".$self."?page_no=".$previous."&pesquisa=".$parametro."'>Anterior</a></li>";
   }
   for($i=1;$i<=$total_no_of_pages;$i++)
   {
    if($i==$current_page)
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$parametro."' style='color:red;'>".$i."</a></li>";
    }
    else
    {
     echo "<li><a href='".$self."?page_no=".$i."&pesquisa=".$parametro."'>".$i."</a></li>";
    }
   }
   if($current_page!=$total_no_of_pages)
   {
    $next=$current_page+1;
    echo "<li><a href='".$self."?page_no=".$next."&pesquisa=".$parametro."'>Proxima</a></li>";
    echo "<li><a href='".$self."?page_no=".$total_no_of_pages."&pesquisa=".$parametro."'>Ultima</a></li>";
   }
		


   ?></ul><?php
  }
 }
 
 /* paging */
 
}