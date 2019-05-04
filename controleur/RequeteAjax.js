'use strict';

class RequeteAjax {

  constructor(url, callback) {
	this.url = url;
    this.xhttp = new XMLHttpRequest();
    this.xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        callback(this.responseText);
      }
    };

  }
  
  openAndSend() {
    this.xhttp.open("GET", this.url, true);
	this.xhttp.send();
  }

}

class RequeteAjaxAhuntsicModele extends RequeteAjax {

  constructor(url, modele) {
	super(url, data => modele.applyTemplate_toAll(data));
  }
 
}
