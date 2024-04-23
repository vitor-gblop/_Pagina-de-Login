<?php
     // abre conexão com mysql no servidor local e seleciona o banco de dados
     $link = mysqli_connect('localhost', 'root', '', 'test');
     //--------------  --("host", "usuario", "senha", "banco de dados");


   // debug
   //   if (!$link) 
   //   {
   //      echo 'Erro';
   //   }
   //   else
   //   {
   //      echo 'OK';
   //   }
