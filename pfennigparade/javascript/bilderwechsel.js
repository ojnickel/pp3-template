window.addEvent('domready', function () {
	//normal bild und over
	var altb = new Array (7);
	var neub = new Array (7);

	var img =$$('#navirose img');
	//Startseite, wenn es Bildern gibt
	if (img[0].getProperty('src')) {	
		//Men� holen
		var j = $$('li.parent a');
		//f�r Submen� Eintr�ge -> 6 Eintr�ge
		var  ar = new Array (j.length);
		//Indexf�r Submen�-Arrray
		var s = 0;
		//es wird mit Schrifft-Gr��e erkannt, ob Men� bzw. Submen�-Eintrag ist.
		//Menu 15px, Submen� 13px
		//erst Submen�, dann leer
		var style = j[1].getStyle ('font-size');//13 px
		j.each (function (el, i) {
			//wenn klene Schrift -> von 0 an speichern
			((el.getStyle ('font-size')) == style) ? ar[s++] = el : ar[s++] = " ";
		});

		
		//die Elemente werden angeordnet. Die erste 7 kommen oben im Array. Rest ist belanglos
		var flag = j;
		//Anfang
		s = 0;
		j.each (function (el, i) {
			//wenn Schrifftgr��er -> Men�-eintrag
			//so werden Men�-Eintrage oben im array angeordnet
			if ((el.getStyle ('font-size')) > style)
				flag[s++] = el;
				
		});
		//neue Array f�r Bildern bereitstellen
		var menu = flag;
		
		img.each (function (el, index) {
			//f�r jedes Element (img) datei Quelle speichern
			var src = el.getProperty('src');
			//Ende ab normal holen -> normal.png
			var zusatz = src.substring(src.lastIndexOf('normal'),src.length);
			//Quelle (joomla-pp/blabla/bla-normal.png) ab normal mit over.png ersetzen
			var newsrc = src.replace (zusatz, 'over.png');
			
			
			//falls man ein langsames Webbrowser hat -> Die Bilder werden in cache gespeichert, um schneller laden zu k�nnen
			//erste Reihe -> bild-normal
			//2te Reihe -> bild-over0
			var bild;
			bild = Asset.image(src, { alt: el.getProperty('alt') });
			bild = Asset.image(newsrc, { alt: el.getProperty('alt') });
			

			//entsprechende Link in menu soll Fett sein
			el.addEvent('mouseover', function () {
				menu[index].setStyle('font-weight', 'bold');
			});
			//beim Verlassen, wieder normal
			el.addEvent('mouseout', function () {
				menu[index].setStyle('font-weight', 'normal');
			});
			//1 Dimension -> normale Bilder
			altb[index] = src;
			//2 Dimension -> neue Bilder
			neub[index] = newsrc;
			
		});

		//jeder element im Men�
		//el-> object
		//ind -> Index vom el im Array
		menu.each (function (el, ind) {
			//Neues Bild laden
			el.addEvent('mouseover', function () {
				img[ind].setProperty('src', neub[ind]);
				//CSS funktioniert danach nicht mehr richtig
				el.setStyle ('font-weight', 'bold');
			});
			//altes Bild laden
			el.addEvent('mouseout', function () {
				img[ind].setProperty('src', altb[ind]);
				el.setStyle ('font-weight', 'normal');
			});
		});
		
	}
});