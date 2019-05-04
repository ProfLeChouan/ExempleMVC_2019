'use strict';

class ahuntsic_modele{

  constructor(nomModele) {
    this.modele = document.getElementById(nomModele).innerHTML;
  }

  applyTemplate_toAll(txtJSON, balise){
    let objJSON = JSON.parse(txtJSON);
    let code_html ="";

    for (let i = 0; i < objJSON.length; i++){
      let modele_tmp = this.modele;
      for (let a in objJSON[i]){
        modele_tmp = modele_tmp.replace(new RegExp("\{" + a + "\}", "g"), objJSON[i][a]);
      }
      code_html += modele_tmp;
    }

    document.getElementById(balise).innerHTML = code_html;
  }
}
