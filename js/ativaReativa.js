function ativaReativa(cod, nome, ativo){
    if (ativo==1) {
      var a=confirm("Deseja DESATIVAR o usuário "+nome+"?");
      //console.log(a);
      if (a) 
        window.location="exclui_usuario.php?c="+cod+"&l=usuarios";
      
    }else{
      var a=confirm("Deseja REATIVAR o usuário "+nome+"?");
      if (a) 
        window.location="ativa_usuario.php?c="+cod+"&l=usuarios";
    }


}