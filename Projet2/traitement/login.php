 <?php
// session_start();
// $host='localhost';
// $username='root';
// $password='';
// $database= 'quizz';
// $message="" ;
// try{
//     $connect= new PDO("mysql:host=$host; dbname=$database",$username,$password);
//     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     if(isset($_POST['connexion'])){
//         if(empty($_POST['login']) || empty($_POST['password'])){
//             $message="<label> tous les champs sont obligatoires </label>";
//         }else{
//             $query= "SELECT * FROM users WHERE login= :login AND password= :password";
//             $statement= $connect->prepare($query);
//             $statement->execute(
//                             array(
//                                 'login' => $_POST['login'],
//                                 'password' => $_POST['password']
//                             )
//             );

//             $count= $statement->rowCount();
//             if($count>0){
//                 $_SESSION['login'] = $_POST['login'];
//                  header('location:index.php');
//             }else{
//                 $message='login ou mot de pass incorect';
//             }
//         }
//     }
// }catch(PDOException $error){
//     $message= $error->getMessage();
