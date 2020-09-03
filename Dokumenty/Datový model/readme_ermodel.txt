Er model

Entita Položka/Zboží 
	- Název, Cena, skladem (bool)
	- id_kat - vazba 1:N, tedy že jedno zboží může být ve vícero kategoriích (Třeba fitness hodinky budou patřit do hodinek ale i do elektroniky, popř. něco v tom smyslu)
	- id_vyr - jedna položka muže mít pouze jednoho výrobce. Zboží také může mít víc výrobců, pak by byl vztah 1:N.
	- id_bar - jeden výrobek se může prodávat ve vícerobarvách, sem bych dal nepovinný vztah, neboť vždy firma nemusí určit barvy výrobku
	- id_stav - stav bych čísloval - 1,2,3,4,5 ... 1 - Nový, 2 - Rozbalený, 3 - Použitý
			  - teoreticky stav by šel nahradit kategorií s názvem Rozbalené výrobky, použité apod.
			  
			  
Entita Kategorie
	- ID, Název
	- Id_Podkategorie - myšleno tak, že jedna kategorie může patřit do jiné kategorie, vazba N:N
	
- Entita štítek
	- Id, Název
	- Cizí klíč Štítek - Hodnota_Štítku, tj. jeden štítek může obsahovat vícero hodnot, dám třeba štítek záruka a hodnoty budou: 12,24,48, ...., povinná vazba
	- pomocí štítku mužu oštítkovat kategorie celé a nebo položky
	
- Entita kategorie, výrobce, barva, Stav - atributy unique a not null
	
	

=> Hodinku až dvě jsem nad tím přemýšlel, nějak jsem si to představoval, jak by to mohlo fungovat a navrhl jsem za půl hodinky, celkově tak 2-3 h.
