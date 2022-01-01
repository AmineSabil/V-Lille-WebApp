<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>projet</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" crossorigin=""></script>
        <link rel="stylesheet" href="style/index.css" />
        <script src="scripts/VliveImage.js"></script>
        <script src="scripts/js1.js"></script>
    </head>
    <body>
<div id="introduction">
      <h1 id="titre"> V'Lille </h1>

</div>
      <h2 id="carte"> Localisations des stations </h2>
      <div id="carte_campus"></div>
      <h2 id="formulaire"> formulaire des stations </h2>
      <form action="index.php" method = "get">
          <fieldset>
          <legend>Critères de sélection de station</legend>
          <label for="nom[]">Nom de la station : </label><input type="text" id="nom" name="nom[]" size="25" maxlength="100" /><br/>
          <label for="commune[]">Commune : </label><input type="text" id="commune" name="commune[]" size="25" maxlength="100" /><br/>
          <label for="adresse">Adresse : </label><input type="text" id="adresse" name="adresse" size="25" maxlength="100"/><br/>
          <label for ="nbvelosdispo">Nombre de vélos disponibles : </label><input type="number" name="nbvelosdispo" min="0" id="nbvelosdispo" value="1"/><br/>
          <label for ="nbplacesdispo">Nombre de places libres disponibles : </label><input type="number" name="nbplacesdispo" min="0" id="nbplacesdispo" value="1"/><br/>
          <label for="libelle">Libelle : </label><input type="number" id="libelle" name="libelle" value="0"/><br/>
          <label for ="etat">Etat des stations :</label>
          <select name="etat">
            <option value="EN SERVICE"> En service </option>
            <option value="HORS SERVICE"> Hors service </option>
            <option value="TOUTES" selected="selected"> Toutes </option>
          </select><br/>
          <label for="etatconnexion">Etat de connexion :</label>
            <select name="etatconnexion">
             <option value="CONNECTED">CONNECTED</option>
             <option value="DISCONNECTED">DISCONNECTED</option>
             <option value="TOUTES" selected="selected"> Toutes </option>
           </select><br/>
           <label for="type">TPE :</label>
             <select name="type">
               <option value="AVEC TPE">AVEC TPE</option>
               <option value="SANS TPE">SANS TPE</option>
               <option value="TOUTES" selected="selected"> Toutes </option>
             </select><br/>
          </fieldset>
          <fieldset id ="boutons">
          <button type="reset">Effacer</button>
          <button type="submit" name="valid" value="envoyer">Envoyer</button>
          </fieldset>
      </form>
      <h2 id="liste">Stations disponibles</h2>
      <?php
      echo $liste;

      ?>
      <div>
      <a href="views/credits.html" id="cdts">Credits</a>
      <a href="https://creativecommons.org/licenses/by-sa/4.0?ref=ccsearch&atype=html" target="_blank" rel="noopener noreferrer" style="display: inline-block;white-space: none;margin-top: 2px;margin-left: 3px;height: 22px !important;">
        <img style="height: inherit;margin-right: 3px;display: inline-block;" src="https://search.creativecommons.org/static/img/cc_icon.svg" />
        <img style="height: inherit;margin-right: 3px;display: inline-block;" src="https://search.creativecommons.org/static/img/cc-by_icon.svg" />
        <img style="height: inherit;margin-right: 3px;display: inline-block;" src="https://search.creativecommons.org/static/img/cc-sa_icon.svg" />
      </a>
      </div>

    </body>

</html>
