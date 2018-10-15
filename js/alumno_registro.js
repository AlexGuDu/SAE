var mat = document.forms["rg_al_form"]["matricula"].value;
var con = document.forms["rg_al_form"]["contra"].value;
var cor = document.forms["rg_al_form"]["correo"].value;
var gru = document.forms["rg_al_form"]["grupo"].value;
var tel = document.forms["rg_al_form"]["telefono"].value;

function validateForm(){
  if(mat == ''){
    document.getElementByID("empty_warning").innerHTML = "you missed one";
    return false;
  }

  if(con == ''){
    document.getElementByID("empty_warning").innerHTML = "you missed one";
    return false;
  }

  if(cor == ''){
    document.getElementByID("empty_warning").innerHTML = "you missed one";
    return false;
  }

  if(gru == ''){
    document.getElementByID("empty_warning").innerHTML = "you missed one";
    return false;
  }

  if(tel == ''){
    document.getElementByID("empty_warning").innerHTML = "you missed one";
    return false;
  }

}
